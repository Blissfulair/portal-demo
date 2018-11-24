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

Route::get('/', function () {
    return view('welcome');
})->name('index');
Route::get('/photo/{filename}', [
    'uses' => 'BackendController@photo',
    'as' => 'photo'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/news', [
    'uses' => 'BlogController@index',
    'as' => 'blog'
]);
Route::group(['middleware'=>['web','auth']], function(){
    Route::get('/admin', [
        'uses' => 'BackendController@index',
        'as' => 'admin'
    ]);
    Route::post('/admin_create', [
        'uses' => 'BackendController@create',
        'as' => 'admin_create'
    ]);
    Route::get('/register_student.new', [
        'uses' => 'BackendController@register_student',
        'as' => 'register_student.new'
    ]);
    Route::post('/signup.new', [
        'uses' => 'BackendController@signup_new',
        'as' => 'signup_new'
    ]);
    Route::get('/student', [
        'uses' => 'BackendController@student',
        'as' => 'student'
    ]);
    Route::get('/teacher', [
        'uses' => 'BackendController@teacher',
        'as' => 'teacher'
    ]);
    Route::get('/edit_user/{user_id}', [
        'uses' => 'BackendController@edit',
        'as' => 'edit_user'
    ]);
    Route::get('/delete_user/{user_id}', [
        'uses' => 'BackendController@delete',
        'as' => 'delete_user'
    ]);
    Route::post('/user_update}', [
        'uses' => 'BackendController@update',
        'as' => 'user_update'
    ]);
    Route::get('/subject_form', [
        'uses' => 'BackendController@subject_form',
        'as' => 'subject_form'
    ]);
    Route::post('/save_subject}', [
        'uses' => 'BackendController@save_subject',
        'as' => 'save_subject'
    ]);
    Route::post('/biodata}', [
        'uses' => 'FrontendController@biodata',
        'as' => 'biodata'
    ]);
    Route::get('/change', [
        'uses' => 'FrontendController@change',
        'as' => 'change'
    ]);
    Route::post('/change_password}', [
        'uses' => 'FrontendController@change_password',
        'as' => 'change_password'
    ]);
    Route::get('/reciept/{reciept_id}', [
        'uses' => 'PaymentController@recipt',
        'as' => 'recipt'
    ]);
    Route::get('/payment', [
        'uses' => 'PaymentController@payment',
        'as' => 'payment'
    ]);
    Route::get('/payment_form', [
        'uses' => 'PaymentController@payment_form',
        'as' => 'payment_form'
    ]);
    Route::post('/make_payment', [
        'uses' => 'PaymentController@make_payment',
        'as' => 'make_payment'
    ]);
    Route::get('/results', [
        'uses' => 'FrontendController@results',
        'as' => 'results'
    ]);
    Route::get('/result/{result_id}/{term_id}', [
        'uses' => 'FrontendController@result',
        'as' => 'result'
    ]);
    Route::get('/calander', [
        'uses' => 'BackendController@calander',
        'as' => 'calander'
    ]);
    Route::post('/calander_create', [
        'uses' => 'BackendController@calander_create',
        'as' => 'calander_create'
    ]);
    Route::get('/all_calander', [
        'uses' => 'BackendController@all_calander',
        'as' => 'all_calander'
    ]);
    Route::get('/register_teacher.new', [
        'uses' => 'BackendController@register_teacher',
        'as' => 'register_teacher.new'
    ]);
    Route::get('/dashboard', [
        'uses' => 'FrontendController@dashboard',
        'as' => 'dashboard'
    ]);
    Route::get('/class_display', [
        'uses' => 'BackendController@class_display',
        'as' => 'class_display'
    ]);
    Route::post('/class_create', [
        'uses' => 'BackendController@class_create',
        'as' => 'class_create'
    ]);
    Route::get('/class_list', [
        'uses' => 'BackendController@class_list',
        'as' => 'class_list'
    ]);
    Route::post('/score', [
        'uses' => 'FrontendController@score',
        'as' => 'score'
    ]);
    Route::get('/user_profile/{user_id}', [
        'uses' => 'BackendController@user_profile',
        'as' => 'user_profile'
    ]);
});
