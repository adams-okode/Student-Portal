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

//login page
Route::get('/', function () {
    return view('welcome');
});

//view management
Route::get('/home','ViewsController@home');
Route::get('/classes','ViewsController@classes');
Route::get('/classdetails','ViewsController@classdetails');
Route::get('/exams','ViewsController@exams');
Route::get('/questions','ViewsController@questions');
Route::get('/answers','ViewsController@answers');
Route::get('/account','ViewsController@account');
Route::get('/students','ViewsController@students');
Route::get('/teachers','ViewsController@teachers');
Route::get('/parents','ViewsController@parents');
Route::get('/progress','ViewsController@progress');
Route::get('/take-test','ViewsController@take_test');
Route::get('/test','ViewsController@test');
Route::get('/logout','ViewsController@logout');
Route::get('/chat','ViewsController@chat');




//functionality
Route::post('/login','AuthenticationController@login');
Route::post('/register','AuthenticationController@register');
Route::post('/change_pass','AuthenticationController@change_pass');


Route::post('/create_class','ClassesController@create');
Route::get('/delete_class','ClassesController@delete');
Route::post('/create_subject','SubjectController@create');
Route::get('/delete_subject','SubjectController@delete');
Route::post('/create_exam','ExamController@create');
Route::get('/delete_exam','ExamController@delete');
Route::post('/create_question','QuestionsController@create');
Route::get('/delete_question','QuestionsController@delete');
Route::post('/create_answer','AnswersController@create');
Route::get('/delete_answer','AnswersController@delete');
Route::post('/create_test','TestsController@create');
Route::get('/delete_test','TestsController@delete');
Route::post('/finish_exams','TestsController@finish_exams');

//chat routes
Route::post('/send_message','ChatController@send');
Route::get('/show_messages','ChatController@show');

Route::get('/delete_user','ParentsController@delete');


Route::post('/create_student','StudentController@create');
Route::post('/create_teacher','TeachersController@create');
Route::post('/create_parent','ParentsController@create');






