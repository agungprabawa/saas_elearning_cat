<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',"LandingPage\LandingPage@index")->name('landing.page');

Auth::routes();


Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/administrator/index','SaaSAdmin\DashboardController@index')->name('saas_adm.dashboard');

Route::get('/auth/type/{type}','Auth\SwitchStatusController@switchStatus')->name('switch.to')->middleware('auth');
Route::get('/auth/session/{uuid}','Auth\SwitchStatusController@switchSession')->name('switch.session')->middleware('auth');
Route::get('/auth/swithandmanage/{uuid}','Auth\SwitchStatusController@switchAndManage')->name('switch.manage')->middleware(['auth']);
// ************************* OTHER TOOLS RESPONSES ***************** /
Route::post('/validation/mime-type/','Other\FileCheckerController@check')->middleware('auth')->name('validation.file');

//********************** COMPANY ************************ */

Route::name('public.auth.service.')->prefix('/service/register')->middleware('web')->group(function(){
    $companyRegistrations = 'Auth\CompanyRegistrations@';
    Route::get('/',$companyRegistrations.'index')->name('register.index');
    Route::post('/do',$companyRegistrations.'doRegistration')->name('register.do');
    Route::get('/subscribe',$companyRegistrations.'subscribe')->name('subscribe');
});

// *********************** Srv_Admin *************************** /
Route::get('/admin/dashboard','SrvAdmin\DashboardController@index')->middleware(['auth','active.status:1 2','general.logs:admin dashboard, 1'])->name('srv_admin.dashboard');

Route::name('srv_admin.settings.')->prefix('/admin/settings')->middleware(['auth','active.status:1'])
   ->group(function (){
      $srv_admin_set = 'SrvAdmin\SettingsController@';
      Route::get('/',$srv_admin_set.'index')->name('index');
      Route::post('/update',$srv_admin_set.'update')->name('update');
   });

Route::name('srv_admin.payment.')->prefix('/admin/payment/')->middleware(['auth','active.status:1','payment.validation'])->group(function(){
    $srv_admin_payment = 'SrvAdmin\PaymentController@';
    Route::get('/',$srv_admin_payment.'index')->name('index');
    Route::get('/create',$srv_admin_payment.'createPayment')->name('create');
    Route::get('/history',$srv_admin_payment.'transactionHistoryIndex')->name('history');
    Route::get('/history-json',$srv_admin_payment.'transactionHistory')->name('history.json');
    Route::get('/info/{token}',$srv_admin_payment.'getPayment')->name('info');
    Route::get('/validate/{token}',$srv_admin_payment.'checkFinishedPayment')->name('validate');
    Route::get('/upgrade/pay',$srv_admin_payment.'payUpgrade')->name('upgrade.pay');
    Route::get('/upgrade/validate/{token}',$srv_admin_payment.'checkFinishedPaymentFromUpgrade')->name('upgrade.validate');
    Route::get('/upgrade/cancel/{token}',$srv_admin_payment.'cancelPaymentFromUpgrade')->name('upgrade.cancel');

});

Route::name('srv_admin.subscribtions.')->prefix('/admin/subscribtions/')->group(function(){
    $srv_admin_subscribtions = 'SrvAdmin\SubscribtionsController@';
    Route::get('/',$srv_admin_subscribtions.'index')->middleware(['auth','active.status:1'])->name('index');
    Route::get('/change',$srv_admin_subscribtions.'changeSubscription')->middleware(['auth','active.status:1'])->name('change')->middleware('change.subs.check');
    Route::post('/change/save',$srv_admin_subscribtions.'saveChanges')->middleware(['auth','active.status:1'])->name('save');

    Route::get('/storage',$srv_admin_subscribtions.'storageUsage')->middleware(['auth','active.status:1 2'])->name('storage.usage');
});

Route::name('srv_admin.group.')->prefix('/admin/group/')->middleware(['auth','active.status:1','subscribe.check'])->group(function(){
    $srv_admin_group = 'SrvAdmin\GroupsController@';
    Route::get('/',$srv_admin_group.'groupIndex')->name('index');
    Route::get('/category/',$srv_admin_group.'groupCategoryIndex')->name('category.index');
    Route::get('/{id}',$srv_admin_group.'editGroup')->name('edit');
    Route::get('/category/{id}',$srv_admin_group.'editGroupCategory')->name('category.edit');
    Route::post('/store',$srv_admin_group.'storeGroup')->name('store');
    Route::post('/category/store',$srv_admin_group.'storeGroupCategory')->name('category.store');
    Route::post('/update/{id}',$srv_admin_group.'updateGroup')->name('update');
    Route::post('/category/update/{id}',$srv_admin_group.'updateGroupCategory')->name('category.update');
    Route::post('/remove/{id}',$srv_admin_group.'removeGroup')->name('remove');
    Route::post('/category/remove/{id}',$srv_admin_group.'removeGroupCategory')->name('category.remove');

    Route::get('/to/json',$srv_admin_group.'groupsList')->name('json.groups');
});

Route::name('srv_admin.courses.')->prefix('/admin/courses/')->middleware(['auth','active.status:1 2','subscribe.check','general.logs:admin courses, 1'])->group(function(){
    $srv_admin_course = 'SrvAdmin\Learning\CoursesController@';

    Route::get('/create',$srv_admin_course.'create')->name('create');
    Route::post('/store',$srv_admin_course.'store')->name('store');
    Route::post('/delete',$srv_admin_course.'remove')->name('remove');

    Route::get('/',$srv_admin_course.'showAllCourses')->name('show');
    Route::get('/{uuid}',$srv_admin_course.'manageCourses')->name('manage');
    Route::get('/{uuid}/edit1',$srv_admin_course.'editCoursesInfo')->name('edit1');
    Route::get('/{uuid}/edit2',$srv_admin_course.'editCoursesConfig')->name('edit2');
    Route::get('/{uuid}/edit3', $srv_admin_course.'editCoursesType')->name('edit3');
    Route::post('/{uuid}/edit1/update',$srv_admin_course.'updateCoursesInfo')->name('edit1.update');
    Route::post('/{uuid}/edit2/update',$srv_admin_course.'updateCoursesConfig')->name('edit2.update');
    Route::post('/{uuid}/edit3/update',$srv_admin_course.'updateCoursesType')->name('edit3.update');

    Route::get('/{uuid}/teach/create',$srv_admin_course.'createTeachMaterial')->name('create.teach');
    Route::get('/{uuid}/teach',$srv_admin_course.'teachMaterials')->name('teach');
    Route::get('/{uuid}/teach/{id}',$srv_admin_course.'editTeachMaterial')->name('teach.edit');
    Route::post('/{uuid}/teach/store',$srv_admin_course.'storeTeachMaterial')->name('teach.store');
    Route::post('/{uuid}/teach/update',$srv_admin_course.'updateTeachMaterial')->name('teach.update');
    Route::post('/{uuid}/teach/sort',$srv_admin_course.'sortTeachMaterials')->name('teach.sort');
    Route::post('/{uuid}/teach/delete', $srv_admin_course.'deleteTeachMaterials')->name('teach.delete');

    Route::get('/{uuid}/task',$srv_admin_course.'taskCourses')->name('task');
    Route::get('/{uuid}/task/create',$srv_admin_course.'taskCreate')->name('task.create');
    Route::get('/{uuid}/task/{id}', $srv_admin_course.'taskEdit')->name('task.edit');
    Route::post('/{uuid}/task/store',$srv_admin_course.'storeTask')->name('task.store');
    Route::post('/{uuid}/task/update', $srv_admin_course.'taskUpdate')->name('task.update');
    Route::post('/{uuid}/task/delete', $srv_admin_course.'taskDelete')->name('task.delete');


    Route::get('/{uuid}/participants',$srv_admin_course.'participants')->name('participants');
    Route::get('/{uuid}/participants/to/json',$srv_admin_course.'coursesParticipants')->name('participants.to.json');
    Route::get('/{uuid}/participant/{id}',$srv_admin_course.'viewParticipant')->name('participant.view');
    Route::post('/{uuid}/search/participant',$srv_admin_course.'searchUsers')->name('search.user');
    Route::post('/{uuid}/search/groups',$srv_admin_course.'searchUserGroups')->name('search.groups');
    Route::post('/{uuid}/enroll/users',$srv_admin_course.'enrollStore')->name('enroll');
    Route::post('/{uuid}/unenroll/users',$srv_admin_course.'deleteParticipant')->name('delete');
});

Route::name('srv_admin.assistedtest.')->prefix('/admin/exam/')->middleware(['auth','active.status:1 2','subscribe.check'])->group(function(){
    $srv_admin_exam = 'SrvAdmin\AssistedTest\ExamController@';

    Route::get('/create',$srv_admin_exam.'create')->name('create');
    Route::post('/store',$srv_admin_exam.'store')->name('store');
    Route::post('/remove',$srv_admin_exam.'remove')->name('remove');
    Route::get('/exam-relations',$srv_admin_exam.'withCoursesRelations')->name('with.courses.relations');

    Route::get('/',$srv_admin_exam.'showAllExams')->name('show');

    Route::get('/{uuid}/result/{id}',$srv_admin_exam.'examResult')->name('result');

    Route::get('/{uuid}',$srv_admin_exam.'manageOverview')->name('overview');
    Route::get('/{uuid}/edit1',$srv_admin_exam.'editExamInfo')->name('edit1');
    Route::get('/{uuid}/edit2',$srv_admin_exam.'editExamConfig')->name('edit2');
    Route::get('/{uuid}/edit3', $srv_admin_exam.'editExamType')->name('edit3');
    Route::post('/{uuid}/edit1/update',$srv_admin_exam.'updateExamInfo')->name('edit1.update');
    Route::post('/{uuid}/edit2/update',$srv_admin_exam.'updateExamConfig')->name('edit2.update');
    Route::post('/{uuid}/edit3/update',$srv_admin_exam.'updateExamType')->name('edit3.update');



    Route::post('/{uuid}/search',$srv_admin_exam.'searchExam')->name('exam.search');


    Route::get('/{uuid}/questions',$srv_admin_exam.'questions')->name('questions');
    Route::get('/{uuid}/questions/create',$srv_admin_exam.'createQuestionObj')->name('questions.create');
    Route::get('/{uuid}/questions/to/json',$srv_admin_exam.'questionsJson')->name('questions.json');
    Route::get('/{uuid}/questionslinked/to/json/',$srv_admin_exam.'linkedQuestions')->name('questions.linked.json');
    Route::get('/{uuid}/questionslinked/edit/{idLink}',$srv_admin_exam.'linkedQuestionEdit')->name('questions.linked.edit');
    Route::get('/{uuid}/questions/{id}',$srv_admin_exam.'questionEdit')->name('questions.edit');

    Route::post('/{uuid}/questions/store',$srv_admin_exam.'questionStore')->name('questions.store');
    Route::post('/{uuid}/questions/update',$srv_admin_exam.'questionUpdate')->name('questions.update');
    Route::post('/{uuid}/questions/remove',$srv_admin_exam.'questionDelete')->name('questions.remove');
    Route::post('/{uuid}/questions/link',$srv_admin_exam.'linkQuestion')->name('questions.link');
    Route::post('/{uuid}/questionslinked/update',$srv_admin_exam.'linkQuestionUpdate')->name('questions.linked.update');
    Route::post('/{uuid}/questionslinked/remove',$srv_admin_exam.'linkedExamRemove')->name('questions.linked.remove');


    Route::get('/{uuid}/relations/',$srv_admin_exam.'withCoursesRelationsPage')->name('relations');
    Route::get('/{uuid}/relations/to/json',$srv_admin_exam.'hasRelationsWith')->name('relations.json');
    Route::post('/{uuid}/relations/store',$srv_admin_exam.'storeRelations')->name('relations.store');
    Route::post('/{uuid}/relations/remove',$srv_admin_exam.'removeRelation')->name('relations.remove');

    Route::get('/{uuid}/participants',$srv_admin_exam.'participants')->name('participants');
    Route::get('/{uuid}/participants/to/json',$srv_admin_exam.'examParticipants')->name('participants.to.json');
    Route::post('/{uuid}/search/participant',$srv_admin_exam.'searchUsers')->name('search.user');
    Route::post('/{uuid}/search/groups',$srv_admin_exam.'searchUserGroups')->name('search.groups');
    Route::post('/{uuid}/enroll/users',$srv_admin_exam.'enrollStore')->name('enroll');
    Route::post('/{uuid}/unenroll/users',$srv_admin_exam.'deleteParticipant')->name('delete');

    Route::post('/{uuid}/exam/result-update',$srv_admin_exam.'examResultUpdate')->name('result.update');

    

});

Route::name('post.comment.')->prefix('/post/comment')->middleware('auth')->group(function (){
   $post_comment = 'Other\CommentController@';
   Route::get('/',$post_comment.'getComments')->name('index');
   Route::post('/store',$post_comment.'store')->name('store');
   Route::post('/update',$post_comment.'update')->name('update');
   Route::post('/delete',$post_comment.'delete')->name('delete');
});

Route::name('post.rating.')->prefix('/post/rating')->middleware('auth')->group(function (){
   $rating = 'Student\RatingController@';
   Route::get('/',$rating.'getRatings')->name('index');
   Route::get('/my-rating',$rating.'myRating')->name('myrating');
   Route::post('/store',$rating.'postRating')->name('store');
});

Route::name('srv_admin.users.')->prefix('/admin/users')->middleware(['auth','active.status:1 2','subscribe.check'])->group(function(){
    $srv_admin_users = 'SrvAdmin\UsersController@';

    Route::get('/',$srv_admin_users.'index')->name('index');
    Route::get('/create',$srv_admin_users.'create')->name('create');
    Route::get('/edit/{id}',$srv_admin_users.'edit')->name('edit');
    Route::get('/to/json', $srv_admin_users.'usersAjax')->name('to.json');

    Route::post('/store',$srv_admin_users.'store')->name('store');
    Route::post('/update/{uuid}', $srv_admin_users.'update')->name('update');
    Route::post('/delete/{id_user}', $srv_admin_users.'delete')->name('delete');
});

Route::name('srv_admin.announcement.')->prefix('/admin/announcement')->middleware(['auth'])->group(function(){
    $srv_admin_ann = 'Other\AnnouncementController@';
    Route::get('/',$srv_admin_ann.'create')->name('create');
    Route::get('/edit/{uuid}',$srv_admin_ann.'edit')->name('edit');
    Route::get('/list',$srv_admin_ann.'listAdm')->name('list');

    // Route::get('/list',$srv_admin_ann.'list')->name('list');
    // Route::get('/read/{uuid}',$srv_admin_ann.'read')->name('read');

    Route::post('/get/notifiable/json',$srv_admin_ann.'getShouldNotifiableUser')->name('get.notifiable');
    Route::post('/send', $srv_admin_ann.'sendAnnouncement')->name('send');
    Route::post('/update/{uuid}',$srv_admin_ann.'updateAnnouncement')->name('update');
    Route::post('/delete/{uuid}',$srv_admin_ann.'deleteAnnouncement')->name('delete');
    Route::get('/json',$srv_admin_ann.'announcementJson')->name('get.json');
});

Route::name('srv_admin.other_data.')->prefix('admin/other-data')->middleware(['auth','active.status:1 2'])->group(function (){
    $category = 'SrvAdmin\OtherDataController\CategoryController@';
    $dashboard = 'SrvAdmin\DashboardController@';

    Route::get('/category',$category.'list')->name('category.list');
    Route::post('/category',$category.'store')->name('category.store');
    Route::post('/category/{id_category}',$category.'update')->name('category.update');
    Route::post('/category-delete/{id_category}', $category.'delete')->name('category.delete');
    Route::get('/category-data/',$category.'listJson')->name('category-data.list');

    Route::get('/logs/',$dashboard.'dynActivityLogs')->name('logs');
});

// GENERAL / UMUM

Route::name('general.announcement.')->prefix('general/announcement')->middleware(['auth','general.logs:announcement, 2'])->group(function(){
    $general_ann = 'Other\AnnouncementController@';

    Route::get('/',$general_ann.'list')->name('all');
    Route::get('/{uuid}',$general_ann.'read')->name('read');
});

Route::name('service.')->prefix('service')->middleware('auth','general.logs:services, 2')->group(function(){
    $service = 'SrvAdmin\ServiceController@';
    Route::get('/new',$service.'addService')->name('new');
    Route::post('/newcreate',$service.'storeCompany')->name('create');
});

Route::name('user.')->prefix('user/')->middleware(['auth','general.logs:user, 2'])->group(function(){
    $profile = 'Other\ProfileController@';
    $transaction = 'Other\TransactionsController@';
    Route::get('/profile',$profile.'profile')->name('profile');
    Route::get('/profile/change-password',$profile.'changePassword')->name('change.password');
    Route::get('/profile/assosiated',$profile.'assosiatedService')->name('assosiated');
    Route::get('/profile/add-services',$profile.'addService')->name('add.service');
    Route::get('/transactions/my-transactions',$profile.'myTransactions')->name('my.transactions');
    Route::get('/transactions/my-services-transactions',$profile.'myServicesTransactions')->name('my.services.transactions');
    Route::get('/transactions/my-transactions-json',$transaction.'myTransactions')->name('transactions.json');
    Route::get('/transactions/my-services-json',$transaction.'companyTransaction')->name('transactions.services.json');
    Route::post('/profile/update',$profile.'updateProfile')->name('profile.update');
    Route::post('profile/update-password',$profile.'changePasswordDo')->name('change.password.do');
});

//STUDENT

Route::name('student.auth.')->prefix('/student/')->middleware(['guest'])->group(function(){
    $stdn_register = 'Student\RegisterController@';

    Route::get('register/{uuid}',$stdn_register.'regIndex')->name('register');
    Route::get('login/{uuid}',$stdn_register.'loginIndex')->name('login');

    Route::post('register/{uuid}/do',$stdn_register.'register')->name('do.register');
    Route::post('login/{uuid}/do', $stdn_register.'login')->name('do.login');

});

Route::name('student.learning.')->prefix('/learning/')->middleware(['web'])->group(function(){

    $stdn_courses = 'Student\Learning\CoursesController@';
    $stdn_join = 'Student\Learning\JoinController@';

    Route::get('/join/{uuid}',$stdn_join.'joinCoursesIndex')->name('join');
    Route::post('/join/{uuid}/do', $stdn_join.'joinCourses')->name('join.do');

    Route::get('/',$stdn_courses.'leangings')->name('all.learning')
        ->middleware(
            ['auth',
            'active.status:3',
            'general.logs:learning, 2'
            ]);

    Route::get('/{uuid}',$stdn_courses.'learning')->name('learning')
        ->middleware(['auth','learning.check','general.logs:leangings, 2']);
    Route::get('/{uuid}/{location}',$stdn_courses.'learningTeach')->name('materials')
        ->middleware(['auth','learning.check','general.logs:leangings, 2']);

});

Route::name('student.assistedtest.')->prefix('/exams/')->middleware(['web'])->group(function(){
    $stdn_exams = 'Student\AssistedTest\ExamController@';
    $stdn_join = 'Student\AssistedTest\JoinController@';

    Route::get('/join/{uuid}',$stdn_join.'joinExamIndex')->name('join');
    Route::post('/join/{uuid}/do', $stdn_join.'joinExam')->name('join.do');

    Route::get('/',$stdn_exams.'exams')->name('all.exams')->middleware(['auth','active.status:3','general.logs:exams, 2']);
    Route::get('/{uuid}/overview',$stdn_exams.'examOverview')->name('overview')->middleware(['auth','general.logs:exams, 2']);
    Route::get('/{uuid}/start',$stdn_exams.'startExam')->name('start.exam')->middleware(['auth','active.status:3']);
//    Route::get('/test/text',$stdn_exams.'textCleaning');
    Route::get('/{uuid}',$stdn_exams.'doExam')->name('do.exam')->middleware(['auth','active.status:3']);
    Route::get('/{uuid}/result',$stdn_exams.'resultPage')->name('result.exam')->middleware(['auth','active.status:3','general.logs:exams, 2']);
    Route::post('/{uuid}/answer',$stdn_exams.'answerQuestion')->name('answer')->middleware(['auth','active.status:3']);
    Route::post('/{uuid}/finish',$stdn_exams.'finishExam')->name('finish')->middleware(['auth','active.status:3']);
});

Route::name('student.task.')->prefix('student/task/')->middleware(['auth','general.logs:task, 2'])->group(function(){
    $task = 'Student\Task\TaskController@';
    Route::get('/{coursesID?}/{taskID?}',$task.'list')->name('list');
    Route::post('/{coursesID}/{taskID}',$task.'submitTask')->name('submit');
});

Route::name('log.')->prefix('system/log')->middleware('auth')->group(function(){
    Route::post('/courses','Student\Learning\CoursesController@logUpdate')->name('courses');
});

Route::name('notifications.')->prefix('notifications')->middleware('auth')->group(function(){
    $notif = 'Other\CustomNotifController@';
    Route::get('/',$notif.'getNotifications')->name('get.notifications');
    // Route::get('/read/{type}/{uuid}',$notif.'readNotification')->name('read'); deprecated
    Route::get('/read/{uuid}',$notif.'read')->name('read2');
});

Route::get('/dashboard','Student\DashboardController@index')->name('student.dashboard')->middleware(['auth','active.status:3','general.logs:dashboard, 2']);


// HELPER

Route::name('data.select2.')->prefix('data/select2')->middleware(['auth','active.status:1 2'])->group(function(){
    $general = 'Other\GeneralDataResponses@';
    Route::post('/users/{uuid}',$general.'searchUsers')->name('users');
    Route::post('/group',$general.'getGroups')->name('groups');
});

// Administrator layanan
Route::get('sudo/login','Auth\SudoAuthController@loginIndex')->name('sudo.login')->middleware('guest');
Route::post('sudo/login','Auth\SudoAuthController@doLogin')->name('sudo.login.do')->middleware('guest');
Route::get('sudo/dashboard','SaaSAdmin\DashboardController@index')->name('sudo.dashboard')->middleware(['auth','active.status:-1']);

Route::name('sudo.apps.manage.')->prefix('/sudo/apps')->middleware(['auth','active.status:-1'])->group(function(){
    $apps = 'SaaSAdmin\Applications\ApplicationsController@';

    Route::get('/',$apps.'appList')->name('list');
    Route::get('/{id}',$apps.'appDetails')->name('details');
    Route::post('/{id}',$apps.'appDetailsUpdate')->name('update');
});

Route::name('sudo.customers.monitor.')->prefix('/sudo/customers')->middleware(['auth','active.status:-1'])->group(function(){
    $customers = 'SaaSAdmin\Customers\CustomersMonitorController@';
    $dashboardMonitor = 'SaaSAdmin\Monitor\DashboardMonitorController@';
    $elearning = 'SaaSAdmin\Monitor\ELearningMonitorController@';
    $exam = 'SaaSAdmin\Monitor\AssistedTestMonitorController@';
    $announcement = 'SaaSAdmin\Monitor\AnnounMonitorController@';

    Route::get('/',$customers.'customersList')->name('list');
    Route::get('/{id_company}',$dashboardMonitor.'dashboard')->name('dashboard');
    Route::post('/{id_company}/act/inactivate', $dashboardMonitor.'inactivate')->name('act.inactivate');
    Route::post('/{id_company}/act/activate', $dashboardMonitor.'activate')->name('act.activate');

    /**
     * Bagian E-Learning
     */
    Route::get('/{id_company}/courses', $elearning.'coursesList')
        ->name('courses.list');
    Route::get('/{id_company}/courses/{id_courses}', $elearning.'courses')
        ->name('courses.details');
    Route::post('/{id_company}/courses', $elearning.'remove')->name('courses.delete');

    Route::get('/{id_company}/courses/{id_courses}/materials/', $elearning.'teachMaterials')
        ->name('courses.teachmaterials.list');
    Route::get('/{id_company}/courses/{id_courses}/materials/{id_teachmaterials}', $elearning.'teachMaterialDetail')
        ->name('courses.teachmaterials.detail');

    Route::post('/{id_company}/courses/{id_courses}/materials/delete', $elearning.'deleteTeachMaterials')
        ->name('courses.teachmaterials.delete');

    Route::get('/{id_company}/courses/{id_courses}/tasks/', $elearning.'tasks')->name('courses.task.list');
    Route::get('/{id_company}/courses/{id_courses}/tasks/{id_task}', $elearning.'taskDetails')->name('courses.task.details');
    Route::post('{id_company}/courses/{id_courses}/tasks/delete', $elearning.'taskDelete')
        ->name('courses.task.delete');

    Route::get('/{id_company}/courses/{id_courses}/participants/', $elearning.'participants')->name('courses.participants.list');

    /**
     * Bagian Ujian
     */
    Route::get('/{id_company}/exams', $exam.'examList')->name('exams.list');
    Route::post('/{id_company}/exams', $exam.'remove')->name('exams.delete');
    Route::get('/{id_company}/exam/{id_exam}', $exam.'exam')->name('exam.details');
    Route::get('/{id_company}/exam/{id_exam}/questions', $exam.'questions')->name('exam.questions');
    Route::post('/{id_company}/exam/{id_exam}/questions/delete', $exam.'questionDelete')->name('exam.questions.delete');
    Route::get('/{id_company}/exam/{id_exam}/participants', $exam.'participants')->name('exam.participants.list');

    /**
     * Bagian Announcement
     */
    Route::get('/{id_company}/announcements', $announcement.'announcList')->name('announ.list');
    Route::post('/{id_company}/announcements', $announcement.'deleteAnnouncement')->name('announ.delete');
    Route::get('/{id_company}/announcement/{id_announcement}', $announcement.'announcement')->name('announ.details');
    Route::get('/{id_company}/announcement/{id_announcement}/participants', $announcement.'notifiedUsers')->name('announ.participants.list');

    /**
     * Bagian Data Json
     */
    Route::get('/data/customers',$customers.'customersDataTables')->name('data.customers');
    Route::get('/data/activitystat',$dashboardMonitor.'activityLog')->name('data.activity');
    Route::get('/data/storage/{id_company}',$dashboardMonitor.'storageUsage')->name('data.storage.usage');

    Route::get('data/elearning/{id_company}',$elearning.'coursesListJson')->name('data.courses.list');
    Route::get('data/elearning/{id_company}/courses/{id_courses}/teach',$elearning.'teachMaterialsJson')->name('data.courses.teachmaterials.list');
    Route::get('data/elearning/{id_company}/courses/{id_courses}/task',$elearning.'taskListJson')->name('data.courses.task.list');
    Route::get('data/elearning/{id_company}/courses/{id_courses}/task/{id_task}',$elearning.'taskSubmitedJson')->name('data.courses.task.submited');
    Route::get('data/elearning/{id_company}/courses/{id_courses}/participants',$elearning.'partisipantsJson')->name('data.courses.participants.list');

    Route::get('data/assistedtest/{id_company}',$exam.'examsListJson')->name('data.exams.list');
    Route::get('data/assistedtest/{id_company}/exam/{id_exam}',$exam.'questionsListJson')->name('data.questions.list');
    Route::get('data/assistedtest/{id_company}/exam/{id_exam}/q/{id_question}',$exam.'questionSingleJson')->name('data.questions.single');
    Route::get('data/assistedtest/{id_company}/exam/{id_exam}/participants',$exam.'partisipantsJson')->name('data.exam.participants.list');

    Route::get('data/announcements/{id_company}', $announcement.'announcementListJson')->name('data.announ.list');
    Route::get('data/announcements/{id_company}/announcement/{id_announcement}', $announcement.'notifiedUsersJsonList')->name('data.announ.notified.list');
});

Route::name('sudo.transactions.')->prefix('/sudo/transactions')->middleware(['auth','active.status:-1'])->group(function(){
    $transaction = 'SaaSAdmin\Customers\CustomersTransactionsController@';

    Route::get('/',$transaction.'transactionsList')->name('list');
    Route::get('/{idtransaction}',$transaction.'transactionsDetail')->name('detail');
    Route::get('/data/transactions',$transaction.'transactionsDataTables')->name('data.transactions');

});

Route::name('sudo.other_data.')->prefix('sudo/other-data/')->middleware(['auth','active.status:-1'])->group(function (){

    $usageStorage = 'SaaSAdmin\DashboardController@';
    $dashboard = 'SaaSAdmin\DashboardController@';
    Route::get('/storages',$usageStorage.'storageUsage')->name('storage.all');
    Route::get('/activity-log', $dashboard.'dynActivityLogs')->name('data.activity-logs');
    Route::get('/transactions-log', $dashboard.'dynTransactionsLogs')->name('data.transactions-logs');
});
