<?php

Route::redirect('/', '/desk/home');
Route::get('/admin', 'Admin\AdminController@index')->middleware('auth');
Route::post('/admin', 'Admin\AdminController@update')->middleware('auth');
Route::get('/admin/skills', 'Admin\AdminSkillsController@index')->middleware('auth');
Route::post('/admin/skills', 'Admin\AdminSkillsController@update')->middleware('auth');

Route::get('/admin/wg', 'Admin\AdminWgController@index')->middleware('auth');
Route::post('admin/wg', 'Admin\AdminWgController@update')->middleware('auth');
Route::post('admin/wg/insert', 'Admin\AdminWgController@insert')->middleware('auth');
Route::get('/admin/wg/delete/{id?}', 'Admin\AdminWgController@delete')->middleware('auth');
Route::get('/admin/wg/send/{id?}', 'Admin\AdminWgController@send')->middleware('auth');
Route::post('admin/wg/text', 'Admin\AdminWgController@updateText')->middleware('auth');
Route::post('admin/wg/insert/text', 'Admin\AdminWgController@insertText')->middleware('auth');
Route::get('/admin/wg/delete/text/{id?}', 'Admin\AdminWgController@deleteText')->middleware('auth');

Route::get('/admin/sound', 'Admin\AdminSoundController@index')->middleware('auth');
Route::post('admin/sound', 'Admin\AdminSoundController@update')->middleware('auth');
Route::post('/admin/sound/insert', 'Admin\AdminSoundController@insert')->middleware('auth');
Route::get('/admin/sound/delete/{id?}', 'Admin\AdminSoundController@delete')->middleware('auth');

Route::redirect('/home', '/desk/home');
Route::get('{responsive?}/home', 'HomeController@index');

// Route::get('/{responsive?}/impressum', 'HomeController@impressum');

Route::redirect('/festival', '/desk/festival');
Route::get('/{responsive?}/festival', 'HomeController@festival');

Route::redirect('/sound', '/desk/sound');
Route::get('{responsive?}/sound', 'SoundController@index');
Route::get('{responsive?}/sound/filter/{filter?}', 'SoundController@index');

Route::redirect('/skills', '/desk/skills');
Route::get('{responsive?}/skills', 'SkillsController@index');
Route::get('{responsive?}/skills/vita', 'SkillsController@vita')->middleware('auth');
Route::get('{responsive?}/skills/person', 'SkillsController@person')->middleware('auth');

Route::redirect('/kontakt', '/desk/kontakt');
Route::get('{responsive?}/kontakt', 'KontaktController@index');

Route::get('{responsive?}/skills/vita/{pdf?}', 'SkillsController@vita')->middleware('auth');
Route::get('{responsive?}/skills/person/{pdf?}', 'SkillsController@person')->middleware('auth');
Route::get('{responsive?}/skills/pdf', 'SkillsController@completePdf')->middleware('auth');

Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('{responsive?}/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('{responsive?}/login', 'Auth\LoginController@login');
Route::post('{responsive?}/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('{responsive?}/login', 'Auth\LoginController@logout')->name('login');

/*
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
 */

// Password Reset Routes...
/*
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
 */

Route::get('/blog', 'BlogController@index');

Route::get('{responsive?}/blog/{id?}', 'BlogController@index');
Route::redirect('/wg', '/desk/wg');
Route::get('{responsive?}/wg/{url?}', 'WgController@index');

Route::get('m3u/url/{url?}', 'M3uController@index');
Route::get('m3u/batch', 'M3uController@batchM3u')->middleware('auth');

//Route::resource('test', 'TestController');

Route::get('{responsive?}/api/sets/list/{id?}', 'ApiController@sets');
Route::get('{responsive?}/api/sets/filter/{id?}', 'ApiController@filter');
Route::get('{responsive?}/api/sets/playlist/{id?}', 'ApiController@playlist');
Route::get('{responsive?}/api/clicks/{id?}', 'ApiController@click');
Route::get('{responsive?}/api/dl/{id?}', 'ApiController@dl');
Route::get('{responsive?}/api/play/{id?}', 'ApiController@play');

Auth::routes();
