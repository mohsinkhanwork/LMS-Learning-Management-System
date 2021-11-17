<?php


use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\testcontroller;
use App\Http\Controllers\historyController;
use App\Http\Controllers\chapterController;
use App\Http\Controllers\firstRegisterController;

/*
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

Route::get('/config/cache', function(){
    \Artisan::call('config:cache');
});
Route::get('/cache/clear', function(){
    \Artisan::call('cache:clear');
});




Route::post('/getemail','Backend\Admin\ReferalIncomeController@getemail')->name('getemail')->middleware('auth');
Route::get('/contacto','Backend\Admin\ReferalIncomeController@contacto');

Route::get('/test', [testcontroller::class, 'test']);
Route::get('/NotesPDF',[testcontroller::class, 'NotesPDF']);
Route::get('/delete/{id}','NotesController@del')->middleware('auth');
Route::get('/NotesPDF/{id}',[testcontroller::class,'SinglePDF']);
Route::get('/color', [testcontroller::class, 'color']);

Route::get('teacher-profile', [testcontroller::class, 'teacher_profile']);

Route::get('Taller-gratuito-de-escritura', [testcontroller::class, 'Taller_gratuito'])->name('Taller_gratuito');

Route::get('publicar_libro', [testcontroller::class, 'publicar_libro'])->name('publicar_libro');

Route::get('correction_page', [testcontroller::class, 'correction'])->name('correction');

Route::get('SERVICIO-DE-CORRECCIÓN-DE-LIBROS', [testcontroller::class, 'SERVICIO_DE_CORRECCIÓN_DE_LIBROS'])->name('SERVICIO_DE_CORRECCIÓN_DE_LIBROS');

Route::resource('paid-affiliate', 'Backend\Admin\ReferalIncomeController')->middleware('auth');

Route::get('policy', [testcontroller::class, 'policy']);
Route::get('term-condition', [testcontroller::class, 'term_condition']);


Route::resource('paid-affiliate', 'Backend\Admin\ReferalIncomeController')->middleware('auth');


Route::resource('topic','Backend\Admin\TopicController')->middleware('auth');

Route::resource('guidebookquestions', 'GuideBokkQuestionsController')->middleware('auth');
Route::resource('guidebookanswers', 'GuideBookAnswersController')->middleware('auth');
// Route::post('answer-store', 'GuideBookAnswersController@answer-store')->name('answer-store');

Route::get('testing-page', [testcontroller::class, 'test_page']);

// Route::resource('comment', 'CommentContrller');

Route::resource('firstRegister', 'firstRegisterController');
Route::get('/firstuser', 'firstRegisterController@firstuser')->name('firstuser');

Route::resource('history', 'historyController')->middleware('auth');
Route::get('/markread/{noti_id}/{user_id}/{history_id}/{chapter_id}',[historyController::class,'markread'])->middleware('auth');

Route::get('last_chapter_created/','chapterController@index')->middleware('auth');

Route::POST('history-store','historyController@historystore')->name('history-store');
Route::POST('chapter-store','chapterController@chapterstore');

Route::get('studenthistory/{id}','historyController@studenthistoryupdate')->middleware('auth');
Route::resource('chapter', 'chapterController')->middleware('auth');
Route::get('studentchaptor/{id}','chapterController@studentchapterupdate')->middleware('auth');
Route::resource('chapterIndex_with_historyID', 'chapterController')->middleware('auth');
Route::get('chapterIndex/{HistID}', 'chapterController@show')->middleware('auth');

Route::get('chap/{id}','chapterController@add_chp');
Route::get('chapter/{chapterID}/history/{historyID}','chapterController@chapterEdit')->middleware('auth');
Route::get('Edit_history/{historyID}','historyController@edit')->middleware('auth');

Route::get('chapter_id/{chapterID}','chapterController@chapterShow');

Route::resource('/extra-assignment','Backend\Admin\ExtraAssignmentController')->middleware('auth');
Route::get('submit_assignment/{ex_id}/{noti_id}/{user_id}','Backend\Admin\ExtraAssignmentController@submit')->middleware('auth');
Route::POST('/student/extra_assignment','Backend\Admin\ExtraAssignmentController@getAssignment')->middleware('auth');
Route::get('/get-extraassignment-data',['uses'=>'Backend\Admin\ExtraAssignmentController@getdata','as'=>'get-extraassignment-data']);
Route::get('/showextraassign/{id}','Backend\Admin\ExtraAssignmentController@showassign')->middleware('auth');
Route::post('/updateextraassign','Backend\Admin\ExtraAssignmentController@updateassign')->middleware('auth');
Route::get('get-extraassignment', ['uses' => 'Backend\Admin\ExtraAssignmentController@getappdata']);








Route::get('/selection',[testcontroller::class,'selection']);
Route::post('/colortitle',[testcontroller::class, 'colortitle']);
Route::get('/coupon',[testcontroller::class,'coupon']);
Route::resource('student/notes', 'NotesController')->middleware('auth');
Route::resource('/assignment','Backend\Admin\AssignmentController')->middleware('auth');
Route::get('/student/assignment/{id}/{course_id}',"Backend\Admin\AssignmentController@showform")->middleware('auth');
Route::post('/student/assignment',"Backend\Admin\AssignmentController@getAssignment");
Route::get('get-assignment-data', ['uses' => 'Backend\Admin\AssignmentController@getdata', 'as' => 'assignment.get_data']);
Route::get('/showassign/{id}','Backend\Admin\AssignmentController@showassign');
Route::post('/updateassign','Backend\Admin\AssignmentController@updateassign');
Route::resource('studycard','StudyCardController')->middleware('auth');


//history comment route
Route::post('history_comment','Backend\Admin\HistoryCommentController@store')->name('history_comment');
//end
//chapter Comment route
Route::post('chapter_comment','Backend\Admin\ChapterCommentController@store')->name('chapter_comment');
Route::post('chapter_comment_reply','Backend\Admin\ChapterCommentController@replystore')->name('chapter_comment_reply');

//end

Route::post('history_comment_reply','Backend\Admin\HistoryCommentController@replystore')->name('history_comment_reply')->middleware('auth');

Route::resource('/skills', 'Backend\Admin\SkillsController')->middleware('auth');

Route::resource('/guidebook','Backend\Admin\GuidebookController')->middleware('auth');
Route::get('/move/history_id/{id}','Backend\Admin\GuidebookController@move')->middleware('auth');
Route::get('moveancient','Backend\Admin\GuidebookController@moveancient')->middleware('auth');
Route::get('/answer/history_id/{id}','Backend\Admin\GuidebookController@answer')->name('answer')->middleware('auth');
Route::get('/moveanswer','Backend\Admin\GuidebookController@moveanswer')->middleware('auth');
Route::get('history_chapter/history_id/{id}','Backend\Admin\GuidebookController@chapter')->name('history_chapter')->middleware('auth');

Route::get('fileDownload/{id}','Backend\Admin\GuidebookController@fileDownload');

Route::get('chapter_fileDownload/{id}','Backend\Admin\GuidebookController@chapter_fileDownload');

Route::get('/showchapter/{id}', 'Backend\Admin\GuidebookController@showchapter')->middleware('auth');
Route::put('/updatechapter/{id}', 'Backend\Admin\GuidebookController@updatechapter')->name('updatechapter')->middleware('auth');

// Switch between the included languages
Route::get('lang/{lang}', [LanguageController::class, 'swap']);

Route::get('get-assignment', ['uses' => 'Backend\Admin\AssignmentController@getappdata']);

Route::get('/sitemap-' .str_slug(config('app.name')) . '/{file?}', 'SitemapController@index');


//============ Remove this  while creating zip for Envato ===========//

/*This command is useful in demo site you can go to https://demo.neonlms.com/reset-demo and it will refresh site from this URL. */

Route::get('reset-demo',function (){
    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', 1000);
    try{
        \Illuminate\Support\Facades\Artisan::call('refresh:site');
        return 'Refresh successful!';
    }catch (\Exception $e){
        return $e->getMessage();
    }
});
//===================================================================//




/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    include_route_files(__DIR__ . '/frontend/');
});

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'user', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the password is expired
     */
    include_route_files(__DIR__ . '/backend/');
});

Route::group(['namespace' => 'Backend', 'prefix' => 'user', 'as' => 'admin.', 'middleware' => 'auth'], function () {

//==== Messages Routes =====//
    Route::get('messages', ['uses' => 'MessagesController@index', 'as' => 'messages']);
    Route::post('messages/unread', ['uses' => 'MessagesController@getUnreadMessages', 'as' => 'messages.unread']);
    Route::post('messages/send', ['uses' => 'MessagesController@send', 'as' => 'messages.send']);
    Route::post('messages/reply', ['uses' => 'MessagesController@reply', 'as' => 'messages.reply']);
});


Route::get('category/{category}/blogs', 'BlogController@getByCategory')->name('blogs.category');
Route::get('tag/{tag}/blogs', 'BlogController@getByTag')->name('blogs.tag');
Route::get('blog/{slug?}', 'BlogController@getIndex')->name('blogs.index');
Route::post('blog/{id}/comment', 'BlogController@storeComment')->name('blogs.comment');
Route::get('blog/comment/delete/{id}', 'BlogController@deleteComment')->name('blogs.comment.delete');

Route::get('teachers', 'Frontend\HomeController@getTeachers')->name('teachers.index')->middleware('auth');
Route::get('teachers/{id}/show', 'Frontend\HomeController@showTeacher')->name('teachers.show')->middleware('auth');


Route::post('newsletter/subscribe', 'Frontend\HomeController@subscribe')->name('subscribe')->middleware('auth');

//============Course Routes=================//
Route::get('courses', ['uses' => 'CoursesController@all', 'as' => 'courses.all']);
Route::get('course/{slug}', ['uses' => 'CoursesController@show', 'as' => 'courses.show'])->middleware('subscribed');
//Route::post('course/payment', ['uses' => 'CoursesController@payment', 'as' => 'courses.payment']);
Route::post('course/{course_id}/rating', ['uses' => 'CoursesController@rating', 'as' => 'courses.rating']);
Route::get('category/{category}/courses', ['uses' => 'CoursesController@getByCategory', 'as' => 'courses.category']);
Route::post('courses/{id}/review', ['uses' => 'CoursesController@addReview', 'as' => 'courses.review']);
Route::get('courses/review/{id}/edit', ['uses' => 'CoursesController@editReview', 'as' => 'courses.review.edit']);
Route::post('courses/review/{id}/edit', ['uses' => 'CoursesController@updateReview', 'as' => 'courses.review.update']);
Route::get('courses/review/{id}/delete', ['uses' => 'CoursesController@deleteReview', 'as' => 'courses.review.delete']);


//============Bundle Routes=================//
Route::get('bundles', ['uses' => 'BundlesController@all', 'as' => 'bundles.all']);
Route::get('bundle/{slug}', ['uses' => 'BundlesController@show', 'as' => 'bundles.show']);
//Route::post('course/payment', ['uses' => 'CoursesController@payment', 'as' => 'courses.payment']);
Route::post('bundle/{bundle_id}/rating', ['uses' => 'BundlesController@rating', 'as' => 'bundles.rating']);
Route::get('category/{category}/bundles', ['uses' => 'BundlesController@getByCategory', 'as' => 'bundles.category']);
Route::post('bundles/{id}/review', ['uses' => 'BundlesController@addReview', 'as' => 'bundles.review']);
Route::get('bundles/review/{id}/edit', ['uses' => 'BundlesController@editReview', 'as' => 'bundles.review.edit']);
Route::post('bundles/review/{id}/edit', ['uses' => 'BundlesController@updateReview', 'as' => 'bundles.review.update']);
Route::get('bundles/review/{id}/delete', ['uses' => 'BundlesController@deleteReview', 'as' => 'bundles.review.delete']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('lesson/{course_id}/{slug}/', ['uses' => 'LessonsController@show', 'as' => 'lessons.show']);
    Route::post('lesson/{slug}/test', ['uses' => 'LessonsController@test', 'as' => 'lessons.test']);
    Route::post('lesson/{slug}/retest', ['uses' => 'LessonsController@retest', 'as' => 'lessons.retest']);
    Route::post('video/progress', 'LessonsController@videoProgress')->name('update.videos.progress');
    Route::post('lesson/progress', 'LessonsController@courseProgress')->name('update.course.progress');
    Route::post('lesson/book-slot','LessonsController@bookSlot')->name('lessons.course.book-slot');
});

Route::get('/search', [HomeController::class, 'searchCourse'])->name('search');
Route::get('/search-course', [HomeController::class, 'searchCourse'])->name('search-course');
Route::get('/search-bundle', [HomeController::class, 'searchBundle'])->name('search-bundle');
Route::get('/search-blog', [HomeController::class, 'searchBlog'])->name('blogs.search');
Route::get('/signup', [HomeController::class, 'signup'])->name('signup');

Route::get('/faqs', 'Frontend\HomeController@getFaqs')->name('faqs');


/*=============== Theme blades routes ends ===================*/


Route::get('contact', 'Frontend\ContactController@index')->name('contact');
Route::post('contact/send', 'Frontend\ContactController@send')->name('contact.send');


Route::get('download', ['uses' => 'Frontend\HomeController@getDownload', 'as' => 'download']);

Route::group(['middleware' => 'auth'], function () {
    Route::post('cart/checkout', ['uses' => 'CartController@checkout', 'as' => 'cart.checkout']);
    Route::post('cart/add', ['uses' => 'CartController@addToCart', 'as' => 'cart.addToCart']);
    Route::get('cart', ['uses' => 'CartController@index', 'as' => 'cart.index']);
    Route::get('cart/clear', ['uses' => 'CartController@clear', 'as' => 'cart.clear']);
    Route::get('cart/remove', ['uses' => 'CartController@remove', 'as' => 'cart.remove']);
    Route::post('cart/apply-coupon',['uses' => 'CartController@applyCoupon','as'=>'cart.applyCoupon']);
    Route::post('cart/remove-coupon',['uses' => 'CartController@removeCoupon','as'=>'cart.removeCoupon']);
    Route::post('cart/stripe-payment', ['uses' => 'CartController@stripePayment', 'as' => 'cart.stripe.payment']);
    Route::post('cart/paypal-payment', ['uses' => 'CartController@paypalPayment', 'as' => 'cart.paypal.payment']);
    Route::get('cart/paypal-payment/status', ['uses' => 'CartController@getPaymentStatus'])->name('cart.paypal.status');

    Route::post('cart/instamojo-payment',['uses' => 'CartController@instamojoPayment', 'as' => 'cart.instamojo.payment']);
    Route::get('cart/instamojo-payment/status', ['uses' => 'CartController@getInstamojoStatus'])->name('cart.instamojo.status');

    Route::post('cart/razorpay-payment',['uses' => 'CartController@razorpayPayment', 'as' => 'cart.razorpay.payment']);
    Route::post('cart/razorpay-payment/status', ['uses' => 'CartController@getRazorpayStatus'])->name('cart.razorpay.status');

    Route::post('cart/cashfree-payment',['uses' => 'CartController@cashfreeFreePayment', 'as' => 'cart.cashfree.payment']);
    Route::post('cart/cashfree-payment/status', ['uses' => 'CartController@getCashFreeStatus'])->name('cart.cashfree.status');

    Route::post('cart/payu-payment',['uses' => 'CartController@payuPayment', 'as' => 'cart.payu.payment']);
    Route::post('cart/payu-payment/status', ['uses' => 'CartController@getPayUStatus'])->name('cart.pauy.status');

    Route::match(['GET','POST'],'cart/flutter-payment',['uses' => 'CartController@flatterPayment', 'as' => 'cart.flutter.payment']);
    Route::get('cart/flutter-payment/status',['uses' => 'CartController@getFlatterStatus', 'as' => 'cart.flutter.status']);

    // Route::get('status', function () {
    //     return view('frontend.cart.status');
    // })->name('status');
    Route::get('status','CartController@status')->name('status');
    Route::post('cart/offline-payment', ['uses' => 'CartController@offlinePayment', 'as' => 'cart.offline.payment']);
    Route::post('cart/getnow',['uses'=>'CartController@getNow','as' =>'cart.getnow']);
});

//============= Menu  Manager Routes ===============//
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => config('menu.middleware')], function () {
    //Route::get('wmenuindex', array('uses'=>'\Harimayco\Menu\Controllers\MenuController@wmenuindex'));
    Route::post('add-custom-menu', 'MenuController@addcustommenu')->name('haddcustommenu');
    Route::post('delete-item-menu', 'MenuController@deleteitemmenu')->name('hdeleteitemmenu');
    Route::post('delete-menug', 'MenuController@deletemenug')->name('hdeletemenug');
    Route::post('create-new-menu', 'MenuController@createnewmenu')->name('hcreatenewmenu');
    Route::post('generate-menu-control', 'MenuController@generatemenucontrol')->name('hgeneratemenucontrol');
    Route::post('update-item', 'MenuController@updateitem')->name('hupdateitem');
    Route::post('save-custom-menu', 'MenuController@saveCustomMenu')->name('hcustomitem');
    Route::post('change-location', 'MenuController@updateLocation')->name('update-location');
});

Route::get('certificate-verification','Backend\CertificateController@getVerificationForm')->name('frontend.certificates.getVerificationForm');
Route::post('certificate-verification','Backend\CertificateController@verifyCertificate')->name('frontend.certificates.verify');
Route::get('certificates/download', ['uses' => 'Backend\CertificateController@download', 'as' => 'certificates.download']);


if(config('show_offers') == 1){
    Route::get('offers',['uses' => 'CartController@getOffers', 'as' => 'frontend.offers']);
}

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth','role:teacher|administrator']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['prefix' => 'subscription'], function(){
    Route::get('plans', 'SubscriptionController@plans')->name('subscription.plans');
    
    Route::get('price_plans', 'SubscriptionController@price')->name('subscription.price_plans');

    Route::get('/{plan}/{name}', 'SubscriptionController@showForm')->name('subscription.form');
    Route::post('subscribe/{plan}', 'SubscriptionController@subscribe')->name('subscription.subscribe');
    Route::post('update/{plan}', 'SubscriptionController@updateSubscription')->name('subscription.update');
    Route::get('status','SubscriptionController@status')->name('subscription.status');
    Route::post('subscribe','SubscriptionController@courseSubscribed')->name('subscription.course_subscribe');
});


// wishlist
Route::post('add-to-wishlist','Backend\WishlistController@store')->name('add-to-wishlist');

Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    Route::get('/{page?}', [HomeController::class, 'index'])->name('index');
});
