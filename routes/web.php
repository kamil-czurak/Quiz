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
Route::middleware(['auth'])->group(function () {
	Route::view('/account', 'pages.account');

	Route::get('/account/{name?}', 'AccountController@generateFunction');

	Route::get('/account/edit/{id?}/{name?}', 'QuizController@generateQuiz')->name('pages.edit_quiz');
});	


Route::get('/','QuizController@displayQuizes');

Route::view('/login', 'auth.login');

Route::view('/register', 'auth.register');

Route::get('/logout',function(){
	Auth::logout();
	return redirect('/');
});

Route::get('/{id?}/{name?}','QuizController@generateQuiz')->name('pages.quiz');

Route::post('/quiz-summary','QuizController@generateSummary');

Route::post('/quiz-delete','QuizController@delete');

Route::post('/quiz-update','QuizController@update');

Route::post('/create-quiz','QuizController@create');

Auth::routes();


