<template>
    <!--begin::Portlet-->

    <div class="kt-portlet ">
        <!-- kt-portlet--bordered -->
        <div class="kt-portlet__body">

            <a v-if="comments.next_page_url" @click.prevent="getComments(comments.next_page_url)" href=""
                style="color: #5d78ff;">Tampilkan komentar sebelumnya <li class="fas fa-chevron-down"></li> </a>
            <br>

            <!--begin:: Portlet-->
            <div v-for="(comment, index) in comments.data" v-bind:key="index" class="kt-portlet"
                style="border: 1px solid #eaeaea; box-shadow: none !important">
                <div class="kt-portlet__body">
                    <div class="kt-widget kt-widget--user-profile-3">
                        <div class="kt-widget__top">
                            <div class="kt-widget__media kt-hidden-">
                                <img style="width:70px" v-bind:src='comment.creator.cover_img' alt="image">
                            </div>
                            <div
                                class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                                JM
                            </div>
                            <div class="kt-widget__content">
                                <div class="kt-widget__head">
                                    <a href="#" class="kt-widget__username">
                                        {{ comment.creator.name }}
                                        <i v-if="comment.creator.id == contentdata.created_by"
                                            class="flaticon2-correct kt-font-success"></i>
                                    </a>
                                    <div class="kt-widget__action" style="display:none">
                                        <button type="button"
                                            class="btn btn-label-success btn-sm btn-upper">ask</button>&nbsp;
                                        <button type="button" class="btn btn-brand btn-sm btn-upper">hire</button>
                                    </div>
                                </div>
                                <div class="kt-widget__subhead">
                                    <span>{{ formatDate(comment.created_at) }}</span>
                                    <!-- <a href="#"><i class="flaticon2-new-email"></i>{{ comment.creator.email }}</a> -->
                                    <!-- <a href="#"><i class="flaticon2-calendar-3"></i>PR Manager </a>
                                    <a href="#"><i class="flaticon2-placeholder"></i>Melbourne</a> -->
                                </div>
                                <div class="kt-widget__info">
                                    <div class="kt-widget__desc" v-html="comment.content">

                                    </div>

                                </div>
                                <div v-if="user.id === comment.creator.id">
                                    <a href="#commentsection" @click="editComment(index)">Edit</a> &nbsp; <a
                                        href="#" @click="deleteComment(index)">Hapus</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!--end:: Portlet-->

            <div id="commentsection" class="kt-portlet kt-portlet--bordered kt-portlet--head--noborder">

                <div class="kt-portlet__body">

                    <span v-if="typingUser" class="text-muted" > {{ typingUser }} sedang mengetik...</span>
                    <p v-if="isUpdate === false" style="font-size: 1.3rem; font-weight: 500">Tambah Komentar</p>
                    <p v-if="isUpdate" style="font-size: 1.3rem; font-weight: 500">Edit Komentar</p>
                    <ckeditor :editor="editor" v-model="editorData" @ready="onEditorReady" :config="editorConfig"></ckeditor>
                    <div class="form-group">
                        <button @click="buttonAction" id="btn_send" class="float-right btn btn-brand"
                            style="margin-top:10px; margin-left:10px">Kirim</button>

                        <button @click="resetEditor" id="btn_send" class="float-right btn btn-secondary"
                            style="margin-top:10px">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end::Portlet-->
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import CaptureKeys from '@ckeditor/ckeditor5-build-classic';
    import moment from 'moment';

    export default {
        props: ['user', 'contentdata', 'type_post'],

        data() {
            return {
                editor: ClassicEditor,
                editorData: '',
                editorConfig: {

                },

                comments: [],
                isUpdate: false,
                editedId: '',

                typingUser: false,
                typingTimer: false,
            }
        },

        mounted() {
            moment.locale(this.user.lang);

            // this.$refs.editor.document.on('keyup',function(){alert('kek')});
        },

        created() {
            this.getComments();


            Echo.join('channel-' + this.contentdata.uuid)
                .listen('.commenting', (event) => {
                    // console.log(event);
                    if (event.isUpdate == 0) {
                        this.comments.data.push(event.comment);
                    } else if (event.isUpdate == 1) {
                        this.comments.data.find(
                            c => c.id_comment === event.comment.id_comment
                        ).content = event.comment.content;
                        console.log(this.comments.data);
                    }else if (event.isUpdate == 2){
                        this.comments.data = this.comments.data.filter(
                            c => c.id_comment !== event.comment.id_comment
                        );
                    }

                })
                .joining(user => {
                    console.log(`Joinning ${user}`);
                })
                .listenForWhisper('typing', (user) => {
                    this.typingUser = user;
                    // console.log(user);

                    if (this.typingTimer) {
                        clearTimeout(this.typingTimer);
                    }
                    // console.log(this.typingUser);
                    this.typingTimer = setTimeout(() => {
                        this.typingUser = false;
                    }, 3000);
                });
        },

        methods: {
            getComments(url = '') {
                axios.get(url ? url : '/post/comment', {
                    params: {
                        uuid: this.contentdata.uuid,
                        type: this.type_post
                    }
                }).then(response => {

                    if (!this.comments.data) {
                        this.comments = response.data.comments;
                        this.comments.data = _.orderBy(this.comments.data, 'created_at', 'asc');
                    } else {
                        this.comments.data.unshift(..._.orderBy(response.data.comments.data, 'created_at', 'asc'));
                        console.log(response.data);
                        this.comments.next_page_url = response.data.comments.next_page_url;
                    }

                })
            },

            buttonAction() {
                if (this.isUpdate === false) {
                    this.postComment();
                } else {
                    this.updateComment();
                }
            },

            postComment() {
                KTApp.progress($('#btn_send'));

                var postUrl = '/post/comment/store';

                axios.post(postUrl, {
                    uuid: this.contentdata.uuid,
                    comment: this.editorData,
                    type_post: this.type_post,

                }).then(response => {

                    if (!response.data.error) {
                        this.comments.data.push(response.data.comment);
                        this.showNotify('success', 'Berhasil', 'Komentar berhasil dikirim');
                        KTApp.unprogress($('#btn_send'));
                        this.editorData = '';

                    } else {
                        this.showNotify('warning', 'Gagal', 'Periksa kembali komentar anda');
                        KTApp.unprogress($('#btn_send'));
                    }

                });
            },

            updateComment() {
                KTApp.progress($('#btn_send'));

                var postUrl = '/post/comment/update';

                axios.post(postUrl, {
                    uuid: this.contentdata.uuid,
                    comment: this.editorData,
                    type_post: this.type_post,
                    id_comment: this.editedId,
                }).then(response => {

                    if (!response.data.error) {
                        this.comments.data[this.isUpdate].content = response.data.comment.content;
                        this.showNotify('success', 'Berhasil', 'Komentar berhasil diperbaharui');
                        KTApp.unprogress($('#btn_send'));
                        this.editorData = '';
                        this.isUpdate = false;

                    } else {
                        this.showNotify('warning', 'Gagal', 'Periksa kembali komentar anda');
                        KTApp.unprogress($('#btn_send'));
                    }

                });
            },

            deleteComment(index) {
                // this.isUpdate = index;

                var deletedId = this.comments.data[index].id_comment;

                var delUrl = '/post/comment/delete';

                swal.fire({
                    "title": "Hapus komentar anda ?",
                    "html": "",
                    "type": "warning",
                    "confirmButtonClass": "btn btn-primary",
                    "cancelButtonClass": "btn btn-secondary",
                    confirmButtonText: "Ya, Hapus",
                    cancelButtonText: "Tidak",
                    showCancelButton: true,
                }).then((result) => {
                    if (result.value) {
                        axios.post(delUrl, {
                            uuid: this.contentdata.uuid,
                            id_comment: deletedId,
                        }).then(response => {
                            this.comments.data = this.comments.data.filter(
                                c => c.id_comment !== response.data.id_comment
                            );
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {

                    }
                });


            },

            editComment(index) {
                this.isUpdate = index;

                var editorDt = this.comments.data[index].content;
                this.editedId = this.comments.data[index].id_comment;
                // console.log(this.comments.data[index]);
                this.editorData = editorDt;

            },


            resetEditor() {
                this.isUpdate = false;
                this.editorData = '';
            },

            showNotify(type, title, message = '', icon = 'icon flaticon-exclamation-2') {
                var content = {};

                content.title = title;
                content.message = message;
                content.icon = icon;

                $.notify(content, {
                    type: type,
                    allow_dismiss: false,
                    newest_on_top: true,
                    mouse_over: false,
                    showProgressbar: false,
                    spacing: 10,
                    timer: 2000,
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    delay: 1000,
                    z_index: 10000,
                    animate: {
                        enter: 'animated slideInRight',
                        exit: 'animated slideOutRight'
                    }
                });
            },

            formatDate(date) {
                return moment(date, 'YYYY-MM-DD hh:mm:ss').format('dddd, Do MMMM YY, hh:mm:ss');
            },

            onEditorReady (editor) {

            },
        },

        watch: {
            editorData: function(val){
                Echo.join('channel-' + this.contentdata.uuid)
                    .whisper('typing', this.user.name);
            }
        }
    };
</script>
