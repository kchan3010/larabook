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