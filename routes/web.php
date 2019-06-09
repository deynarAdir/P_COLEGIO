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

// Route::get('principal', function () {
//     return view('content.principal');
// })->name('principal');

// Auth::routes();
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login')->name('login1');

// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');

//no autenticados en login
Route::group(['middleware'=>['guest']],function(){

	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login')->name('login1');

});
//autenticados en login
Route::group(['middleware'=>['auth']],function(){

	Route::get('principal', function () {
    	return view('content.principal');
	})->name('principal');

	Route::post('logout', 'Auth\LoginController@logout')->name('logout');

});




Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// porque

Route::resource('pensiones','PensionController');

Route::resource('mensualidad','MonthlyPaymentController', ['except' => ['show']]);
Route::put('mensualidad/activar/{id}','MonthlyPaymentController@active');
Route::put('mensualidad/desactivar/{id}','MonthlyPaymentController@desactive');
Route::resource('pagos','StudentPaymentController');
Route::get('obtener/mensualidades', 'StudentPaymentController@getMonthly');
Route::get('obtener/estudiante/{ci}','StudentPaymentController@getStudent');
Route::get('mensualidad/buscar','StudentPaymentController@search');


Route::resource('equipamiento','AssetsController');
Route::resource('aulas','ClassRoomController');
Route::put('aula/activar/{id}','ClassRoomController@active');
Route::put('aula/desactivar/{id}','ClassRoomController@desactive');