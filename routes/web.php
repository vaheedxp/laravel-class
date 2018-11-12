<?php
Route::get('/login', 'LoginController@index')->name("login");

Route::post('/authenticate','LoginController@auth')->name('auth');
Route::get("/logout",'LoginController@logout')->name('logout');
Route::get("/newaccount",'LoginController@showCreateAccountForm');
Route::post('/register', 'LoginController@register')->name('register');

Route::group(["middleware"=>['admin']], function(){
	// Read
	Route::get('/', 'StudentController@index')->name("displayall");
	Route::get('students/detail/{id}', 'StudentController@show');
	// Create 
	Route::get('students/addform', 'StudentController@create');
	Route::post('students/create', 'StudentController@store');
	Route::get('students/sendemail','StudentController@sendemail');
	Route::post("students/send",'StudentController@send');
	// Update
	Route::get('students/updateform/{id}', 'StudentController@edit');
	Route::post('students/update', 'StudentController@update');
	// Delete
	Route::get('students/delete/{id}', 'StudentController@destroy');

	// change lang
	Route::get('language/{lang}','LoginController@changelang');
});






































