<template>
    <!--begin::Portlet-->

    <div class="kt-portlet ">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Ulasan dari peserta
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a style="margin-top: 15px" href="#" v-if="contentdata.created_by !== user.id" class="btn btn-success btn-sm btn-bold" data-toggle="modal" data-target="#kt_modal_1">
                        Berikan ulasan
                    </a>
                </div>
            </div>
        </div>
        <!-- kt-portlet--bordered -->
        <div class="kt-portlet__body">

            <!-- My Rating section -->

            <div class="kt-portlet__body" v-if="my_rating">
                <div class="kt-widget kt-widget--user-profile-3">
                    <div class="kt-widget__top">
                        <div class="kt-widget__media kt-hidden-">
                            <img style="width:70px" v-bind:src='user.cover_img' alt="image">
                        </div>
                        <div
                            class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                            JM
                        </div>
                        <div class="kt-widget__content">
                            <div class="kt-widget__head">
                                <a href="#" class="kt-widget__username">
                                    {{ user.name }}

                                </a>

                                <div class="kt-widget__action" style="display:none">
                                    <button type="button"
                                            class="btn btn-label-success btn-sm btn-upper">ask</button>&nbsp;
                                    <button type="button" class="btn btn-brand btn-sm btn-upper">hire</button>
                                </div>
                            </div>

                            <div class="kt-widget__info" style="padding-top: 10px">
                                <ul class="cus-ul">
                                    <li class="cus-li" v-for="index in 5" :key="index">
                                        <i
                                            v-bind:class="[index <= my_rating.rating_val ? 'fas fa-star':'far fa-star']"
                                            class=" "></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="kt-widget__info">
                                <div class="kt-widget__desc" v-html="fin_my_rating.rating_content">

                                </div>

                            </div>
                            <div class="kt-widget__info">
                                <span style="display: block">{{ formatDate(my_rating.updated_at) }}</span>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <hr>
            <!-- other Rating section -->
            <div class="kt-portlet__body" v-for="(item, index) in ratings.data" :key="index">
                <div class="kt-widget kt-widget--user-profile-3">
                    <div class="kt-widget__top">
                        <div class="kt-widget__media kt-hidden-">
                            <img style="width:70px" v-bind:src='item.creator.cover_img' alt="image">
                        </div>
                        <div
                            class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                            JM
                        </div>
                        <div class="kt-widget__content">
                            <div class="kt-widget__head">
                                <a href="#" class="kt-widget__username">
                                    {{ item.creator.name }}
                                </a>

                                <div class="kt-widget__action" style="display:none">
                                    <button type="button"
                                            class="btn btn-label-success btn-sm btn-upper">ask</button>&nbsp;
                                    <button type="button" class="btn btn-brand btn-sm btn-upper">hire</button>
                                </div>
                            </div>

                            <div class="kt-widget__info" style="padding-top: 10px">
                                <ul class="cus-ul">
                                    <li class="cus-li" v-for="index in 5" :key="index">
                                        <i
                                            v-bind:class="[index <= item.rating_val ? 'fas fa-star':'far fa-star']"
                                            class=" "></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="kt-widget__info">
                                <div class="kt-widget__desc" v-html="item.rating_content">

                                </div>

                            </div>
                            <div class="kt-widget__info">
                                <span style="display: block">{{ formatDate(item.updated_at) }}</span>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--begin::Modal-->
        <div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Berikan ulasan anda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group text-center">
                            <!--
                            Source
                            https://bbbootstrap.com/snippets/bootstrap-modal-comment-section-rating-12857455#-->
                            <div class="rating">
                                <input type="radio" @click="setRetingVal(5)" name="rating" value="5" id="5"><label for="5">☆</label>
                                <input type="radio" @click="setRetingVal(4)" name="rating" value="4" id="4"><label for="4">☆</label>
                                <input type="radio" @click="setRetingVal(3)" name="rating" value="3" id="3"><label for="3">☆</label>
                                <input type="radio" @click="setRetingVal(2)" name="rating" value="2" id="2"><label for="2">☆</label>
                                <input type="radio" @click="setRetingVal(1)" name="rating" value="1" id="1"><label for="1">☆</label>
                            </div>
                            <textarea v-model="rating_content" style="height: 150px" name=""
                                      placeholder="(Opsional) berikan ulasan anda" class="form-control" id="" cols="30"
                                      rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal
                        </button>
                        <button type="button" id="btn_post"  @click="postRating" class="btn btn-success">Kirim ulasan</button>
                    </div>
                </div>
            </div>
        </div>

        <!--end::Modal-->
    </div>

    <!--end::Portlet-->
</template>

<script>
    import moment from "moment";

    export default {
        props: ['user', 'contentdata', 'type_post', 'post_url'],
        data() {
            return {
                ratings : [],
                my_rating: [],
                rating_val: 0,
                rating_content: '',
            }
        },
        created() {
            Echo.join('channel-' + this.contentdata.uuid)
                .listen('.giverating',event=>{
                    if (event.isUpdate == 0) {
                        this.ratings.data.push(event.rating);
                    } else if (event.isUpdate == 1) {
                        this.ratings.data.find(
                            c => c.id_ratings === event.rating.id_ratings
                        ).rating_val = event.rating.rating_val;

                        this.ratings.data.find(
                            c => c.id_ratings === event.rating.id_ratings
                        ).rating_content = event.rating.rating_content;
                        console.log(this.ratings.data);
                    }else if (event.isUpdate == 2){
                        this.ratings.data = this.ratings.data.filter(
                            c => c.id_rating !== event.rating.id_rating
                        );
                    }
                })
        },
        mounted() {
            this.getRating();
            this.getMyRating();
        },
        methods: {
            getRating(url = ''){
                axios.get(url ? url : '/post/rating', {
                    params: {
                        uuid: this.contentdata.uuid,
                        type_post: this.type_post
                    }
                }).then(response => {

                    if (!this.ratings.data) {
                        this.ratings = response.data.ratings;
                        this.ratings.data = _.orderBy(this.ratings.data, 'created_at', 'asc');
                    } else {
                        this.ratings.data.unshift(..._.orderBy(response.data.ratings.data, 'created_at', 'asc'));
                        console.log(response.data);
                        this.ratings.next_page_url = response.data.ratings.next_page_url;
                    }

                    console.log(this.ratings);

                })
            },

            getMyRating(){
                axios.get('/post/rating/my-rating', {
                    params: {
                        uuid: this.contentdata.uuid,
                        type_post: this.type_post
                    }
                }).then(response => {

                    this.my_rating = response.data.my_rating;
                    if (this.my_rating){
                        this.rating_content = this.my_rating.rating_content;
                    }
                    console.log(this.my_rating);

                })
            },

            postRating() {
                // console.log(this.rating_ops);
                KTApp.progress($('#btn_post'));

                let ax_post = axios.post(this.post_url, {
                    uuid: this.contentdata.uuid,
                    type_post: this.type_post,
                    rating_val: this.rating_val,
                    rating_content: this.rating_content,
                });

                ax_post.then(response => {
                    KTApp.unprogress($('#btn_post'));
                   if (response.data.error){

                   } else {
                        let ref = this;
                        ref.getMyRating();
                   }

                    $('#kt_modal_1').modal('hide')
                    this.$emit('save')
                });
            },

            setRetingVal(val){
                console.log(val);
                this.rating_val = val;
            },

            formatDate(date) {
                moment.locale('id');
                return moment(date, 'YYYY-MM-DD hh:mm:ss').format('dddd, Do MMMM YY, hh:mm:ss');
            },
        },

        computed: {
            fin_my_rating: function () {
                return this.my_rating;
            }
        }

    }
</script>

<style>
    .rating, .rating2 {
        display: inline-flex;
        margin-top: -10px;
        flex-direction: row-reverse
    }

    .rating > input {
        display: none
    }

    .rating > label {
        position: relative;
        width: 28px;
        font-size: 52px;
        margin: 10px;
        color: #ffc800;
        cursor: pointer
    }

    .rating2 > label {
        position: relative;
        width: 28px;
        font-size: 20px;
        margin: 2px;
        color: #ffc800;
        cursor: pointer
    }

    .rating > label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating > label:hover:before,
    .rating > label:hover ~ label:before {
        opacity: 1 !important
    }

    .rating > input:checked ~ label:before {
        opacity: 1
    }

    .rating:hover > input:checked ~ label:before {
        opacity: 0.4
    }

    .cus-ul{
        list-style: none;
        clear: both;
        padding: 0;
        margin: 0;
    }

    .cus-li {
        float: left;
        font-size: 20px;
        color: #ffc800;
    }

</style>
