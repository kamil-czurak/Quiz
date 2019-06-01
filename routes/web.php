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

Route::get('/','QuizController@displayQuizes');

Route::get('/login', function(){
	return view('auth.login');
});

Route::get('/register', function(){
	return view('auth.register');
});

Route::get('/logout',function(){
	Auth::logout();
	return redirect('/');
});

Route::get('/account', function(){
	return view('pages.account');
});

Route::get('/{id?}/{name?}','QuizController@generateQuiz');

Route::post('/quiz-summary','QuizController@generateSummary');

Auth::routes();


