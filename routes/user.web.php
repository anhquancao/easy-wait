<?php


Route::namespace("Auth")->group(function(){
    Route::get('register', "UserRegisterController@showRegistrationForm");
    Route::post('register', "UserRegisterController@register")->name("user.register");
    Route::post('login', "UserLoginController@login")->name("user.login");
    Route::get('login', "UserLoginController@showLoginForm");
});

Route::middleware("auth.user")->namespace("User")->group(function () {
    Route::get("home", "UserHomeController@index");
});


Route::get('/', function () {
    return "home user";
})->name("customer.home");