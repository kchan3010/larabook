<?php

use Illuminate\Support\Facades\Event;

//Event::listen('Larabook.Registration.Events.UserRegistered', function ($event){
//    dd('send an email notification');
//});

Route::get('/', [
    'as'    => 'home',
    'uses'  => 'PagesController@home'
]);

Route::get('home', 'PagesController@home');

Route::get('register', [
    'as'    => 'register_path',
    'uses'  => 'RegistrationController@create'
]);

Route::post('register', [
    'as'    => 'register_path',
    'uses'  => 'RegistrationController@store'
]);

/**
 * Sessions
 */
Route::get('login', [
   'as'     => 'login_path',
    'uses'  => 'SessionsController@create'
]);

Route::post('login', [
    'as'     => 'login_path',
    'uses'  => 'SessionsController@store'
]);

Route::get('logout', [
    'as'    => 'logout_path',
    'uses'  => 'SessionsController@destroy'
]);

/**
 * Statuses
 */
Route::get('statuses', [
    'as'    => 'statuses_path',
    'uses'  => 'StatusesController@index'
]);

Route::post('statuses',  [
    'as'    => 'statuses_path',
    'uses'  => 'StatusesController@store'
]);