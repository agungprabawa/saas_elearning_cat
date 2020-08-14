require('./bootstrap');
window.Vue = require('vue');
import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.component('comment', require('./components/CommentComponent.vue').default);
Vue.component('rating', require('./components/RatingComponent').default);
Vue.component('notification', require('./components/NotificationComponent.vue').default);
Vue.component('dashboard-announcement', require('./components/student_dashboard/AnnouncementComponent.vue').default);
Vue.component('vdatenow', require('./components/DateFromNowComponent.vue').default);
Vue.component('exam-navigation', require('./components/assisted_test/ExamNavigation.vue').default);
Vue.component('exam-main', require('./components/assisted_test/ExamMain.vue').default);
Vue.component('helper-currency', require('./components/helpers/CurrencyComponent.vue').default);

Vue.use( CKEditor );


const app = new Vue({
    el: '#app',
});
