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
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');

//no autenticados en login
Route::group(['middleware'=>['guest']],function(){

	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login')->name('login1');

});
//**********************************************************************************************
//ANTES DE INGRESAR AL SISTEMA PASA POR UN FORMULARIO DE IDENTIFICACION "LOGIN"
Route::group(['middleware'=>['auth']],function(){

		Route::get('principal', function () {
			return view('content.principal');
		})->name('principal');
		Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//----------------------------------------------------------------------------------------------
		Route::group(['middleware'=>'tesorero'],function(){
			//Acceso a finanzas
			Route::resource('pensiones','PensionController');

			Route::resource('cuotas','FeeTypeController', ['except' => ['show']]);
			Route::put('cuotas/activar/{id}','FeeTypeController@active');
			Route::put('cuotas/desactivar/{id}','FeeTypeController@desactive');
			Route::resource('pagos','StudentPaymentController');
			Route::get('obtener/mensualidades/{id}', 'StudentPaymentController@getMonthly');
			Route::get('obtener/estudiante/{ci}','StudentPaymentController@getStudent');
			Route::get('mensualidad/buscar','StudentPaymentController@search');

			Route::get('pago/pdf/{id}','StudentPaymentController@pdf');
			Route::get('pagos/detalle/{id}','StudentPaymentController@detallePago');
		});
//----------------------------------------------------------------------------------------------
		Route::group(['middleware'=>'director'],function(){
			//Accesos del director para las notas horarios entre otros...
		});
//----------------------------------------------------------------------------------------------
		Route::group(['middleware'=>'docente'],function(){
			//Accesos del docente Notas,Horario etc..
		});
//----------------------------------------------------------------------------------------------
		Route::group(['middleware'=>'estudiante'],function(){
			//Acceso del estudiante para ver notas...
		});
//----------------------------------------------------------------------------------------------
		Route::group(['middleware'=>'tutor'],function(){
			//Acceso del tutor para verificar estado del estudiante...
		});

});
//**********************************************************************************************

Route::get('404', function () { return view('error'); });


Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

//**********************************************************************************************
// porque


Route::resource('monthly','MonthlyPaymentController');

Route::resource('parallels','ParallelController');

Route::resource('degrees','DegreeController');

Route::resource('managers','ManagerController');

Route::resource('inscriptions','InscriptionController');

Route::resource('students','StudentController');

Route::get('configurar/tiempos','PunishmentController@index')->name('configuration.index');
Route::get('configurar/tiempo/{id}/{time}','PunishmentController@edit')->name('configuration.edit');
Route::put('configurar/tiempo/{id}/{time}','PunishmentController@update')->name('configuration.update');

