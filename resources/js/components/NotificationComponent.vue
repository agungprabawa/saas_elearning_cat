<template>
    <div class="kt-header__topbar-item dropdown">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">

            <span class="kt-header__topbar-icon">
                <i style="color: #646c9a;" class="flaticon2-bell-alarm-symbol"></i>

            </span>
            <span v-if="this.unread > 0" style="position: absolute;top: 30%; right: -2px"
                class="kt-badge kt-badge--danger">{{ this.unread }}</span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
            <!--begin::Portlet-->
            <div style="margin-bottom:0px" class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Notifikasi
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body" style="padding:0">
                    <div class="kt-scroll kt-notification kt-notification--fit" data-scroll="true" data-height="300" data-scrollbar-shown="true">
                        <a v-for="(notif, index) in notifications" :key="index" v-bind:href="notif.url" class="kt-notification__item"
                            style="padding: 0.55rem 2rem;" v-bind:class="{'new-notif-bg': notif.read_at == null}">

                            <div v-if="notif.type == 'comment'" class="kt-notification__item-icon">
                                <i class="fa fa-comments kt-font-success"></i>
                            </div>
                            <div v-if="notif.type == 'announcement'" class="kt-notification__item-icon">
                                <i class="fa fa-info-circle kt-font-info"></i>
                            </div>
                            <div v-if="notif.type == 'task'" class="kt-notification__item-icon">
                                <i class="fas fa-backpack kt-font-brand"></i>
                            </div>

                            <div v-if="notif.type == 'rating'" class="kt-notification__item-icon">
                                <i class="fal fa-stars kt-font-warning"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div v-html="notif.data" class="kt-notification__item-title">
                                    <!-- {{ notif.data }} -->
                                </div>
                                <div class="kt-notification__item-time">
                                    {{ notif.time }}
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- <div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div> -->

                </div>
                <div style="padding:10px; text-align:center" class="kt-portlet__foot ">
                    <div class="align-items-center">
                        <a href="#" class="kt-hidden">Lihat semua notifikasi</a>
                    </div>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        props: ['current_user'],
        data() {
            return {
                unread: 0,
                notifications: [],

                notifTime: [],
            }
        },

        created() {
            Echo.private('App.User.' + this.current_user.id)
                .notification((notification) => {
                    this.getNotifications();
                    // console.log(notification);
                    this.showNotify('info','Notifikasi',notification.title);
                }).listen('.update-notifications', (e)=>{
                    console.log(e);
                    this.getNotifications();
                });
        },

        mounted(){
            this.getNotifications();
            this.realNotifTime();
        },

        methods: {

            getNotifications(){

                var newcust = [];

                axios.get('/notifications').then(response => {
                    this.notifications = response.data.notif;
                    this.unread = _.filter(this.notifications,{'read_at':null}).length;

                    for (const key in this.notifications) {
                        if (this.notifications.hasOwnProperty(key)) {
                            let element = this.notifications[key];
                            var ref = this;
                            Vue.set(element, 'time',ref.formatDate(element.updated_notif));
                            this.notifications[key] = element;
                        }
                    }
                });

            },

            updateNotifications(){

            },

            formatDate(date) {
                moment.locale('id');
                // console.log(moment().format('LLL'));

                return moment(date, 'YYYY-MM-DD hh:mm:ss').calendar();
            },

            realNotifTime(){
                var ref = this;
                setInterval(() => {
                    for (const key in this.notifications) {
                        if (this.notifications.hasOwnProperty(key)) {
                            const element = this.notifications[key];
                            var ref = this;
                            this.notifications[key].time =  ref.formatDate(element.updated_notif);
                            // console.log(this.notifications[key].time);
                        }
                    }
                }, 1000);

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
        }
    }

</script>
<style>
    .kt-notification .kt-notification__item:after {
        display: none;
    }

    .new-notif-bg {
        background-color: aliceblue;
    }
</style>
