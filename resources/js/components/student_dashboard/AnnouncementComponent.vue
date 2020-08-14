<template>
    <div class="kt-portlet kt-portlet--height-fluid">

        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Pengumuman
                </h3>
            </div>

        </div>
        <div class="kt-portlet__body">
            <div class="kt-scroll" data-scroll="true" data-height="400" style="height: 400px;">
                <div class="kt-list-timeline">
                    <div class="kt-list-timeline__items">
                        <div v-for="(val,index) in fin_announ" :key="index" class="kt-list-timeline__item">
                            <span
                                v-bind:class="[val.read_at == null ? 'kt-list-timeline__badge--warning':'','kt-list-timeline__badge--success' ]" class="kt-list-timeline__badge ">

                            </span>
                            <span class="kt-list-timeline__text"><a v-bind:href="val.url">{{ val.subject }}</a></span>
                            <span class="kt-list-timeline__time">{{ val.time }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        props: ['current_user'],
        data() {
            return {
                announcement: [],

            }
        },

        created() {
            Echo.private('App.User.' + this.current_user.id)
                .notification((notification) => {
                    this.getAnnouncements();
                }).listen('.update-notifications', (e) => {
                this.getAnnouncements();
            });
        },

        mounted() {
            this.getAnnouncements();
        },

        methods: {

            getAnnouncements() {
                axios.get('/notifications').then(response => {
                    this.announcement = response.data.notif;
                });
            },

            formatDate(date) {
                moment.locale('id');
                return moment(date, 'YYYY-MM-DD hh:mm:ss').calendar();
            },
        },

        computed: {
            fin_announ() {
                let ann = [];
                for (const key in this.announcement) {
                    if (this.announcement.hasOwnProperty(key)) {
                        if (this.announcement[key].type === 'announcement') {
                            let element = this.announcement[key];
                            let ref = this;
                            Vue.set(element, 'time', ref.formatDate(element.updated_notif));
                            // this.announcement[key] = element;
                            ann.push(element);
                        }
                    }
                }
                console.log(ann);
                return ann;
            }
        }
    }

</script>
