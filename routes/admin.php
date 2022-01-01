<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Auth::routes();


Route::group(['middleware' => 'guest'], function () {

    Route::get('/', 'HomeController@selection')->name('selection');

  });



Route::group(['namespace' => 'Auth'], function () {



        Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');

        Route::post('/login','LoginController@login')->name('login')->middleware('guest');

        Route::get('/logout/{type}', 'LoginController@logout')->name('logout');

  });

 //==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath',
         'auth']
    ], function () {

     //==============================dashboard============================
     Route::get('/dashboard', 'HomeController@index')->name('dashboard');


   //==============================dashboard============================
    Route::group(['namespace' => 'Grades'], function () {
        Route::resource('grades', 'GradesController');
    });


    //==============================Classrooms============================
    Route::group(['namespace' => 'class_room'], function () {
        Route::resource('class_room', 'ClassRoomController');
        Route::post('delete_all', 'ClassRoomController@delete_all')->name('delete_all');

        Route::post('Filter_Classes', 'ClassRoomController@Filter_Classes')->name('Filter_Classes');

    });


    //==============================Sections============================

    Route::group(['namespace' => 'Sections'], function () {

        Route::resource('sections', 'SectionsController');

         Route::get('/classes/{id}', 'SectionsController@getclasses');

    });



    Route::view('add_Parent','admin.livewire.show_Form');


    //==============================Teachers============================
    Route::group(['namespace' => 'Teacher'], function () {
        Route::resource('Teachers', 'TeachersController');
    });

    Route::group(['namespace' => 'Students'], function () {
        Route::resource('Students', 'StudentsController');
        Route::resource('Promotion', 'promotionController');
        Route::resource('Graduate' , 'GraduateController');
        Route::resource('Fees' , 'FessController');
        Route::resource('Fees_Invoices', 'FessInvoicesController');
        Route::resource('receipt_students', 'ReceiptStudentController');
        Route::resource('ProcessingFee', 'ProcessingFessController');
        Route::resource('Payment_students', 'PaymentsFessController');
        Route::resource('Attendance', 'AttendancesController');
        Route::resource('online_classes', 'OnlineClassController');
        Route::get('/indirect', 'OnlineClassController@indirectCreate')->name('indirect.create');
        Route::post('/indirect', 'OnlineClassController@storeIndirect')->name('indirect.store');
        Route::resource('library', 'LibraryController');
        Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');
        Route::get('/Get_class_id/{id}', 'StudentsController@Get_Ajax_class_room');
        Route::get('/Get_Sections/{id}', 'StudentsController@Get_Sections');
        Route::post('Upload_attachment', 'StudentsController@Upload_attachment')->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', 'StudentsController@Download_attachment')
                    ->name('Download_attachment');
        Route::post('Delete_attachment', 'StudentsController@Delete_attachment')->name('Delete_attachment');



    });

    Route::group(['namespace' => 'subjects'] , function () {

        Route::resource('subjects', 'SubjectsController');

    });

    Route::group(['namespace' => 'Quizzes'] , function () {

        Route::resource('Quizzes', 'QuizzesController');

    });

    Route::group(['namespace' => 'questions'], function () {
        Route::resource('questions', 'QuestionsController');
    });

    Route::group(['namespace' => 'settings'], function () {


    Route::resource('settings', 'SettingController');

});

});
