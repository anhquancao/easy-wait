<?php


Route::namespace("Auth")->group(function(){
    Route::get('register', "CustomerRegisterController@showRegistrationForm");
    Route::post('register', "CustomerRegisterController@register")->name("customer.register");
    Route::post('login', "CustomerLoginController@login")->name("customer.login");
    Route::get('login', "CustomerLoginController@showLoginForm");
});


Route::get('/', function () {
    return "home customer";
})->name("customer.home");