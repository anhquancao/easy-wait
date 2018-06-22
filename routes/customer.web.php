<?php


Route::namespace("Auth")->group(function () {
    Route::get('register', "CustomerRegisterController@showRegistrationForm");
    Route::post('register', "CustomerRegisterController@register")->name("customer.register");
    Route::post('login', "CustomerLoginController@login")->name("customer.login");
    Route::get('login', "CustomerLoginController@showLoginForm");
});

Route::middleware("auth.customer")->namespace("Customer")->group(function () {
    Route::get("home", "CustomerHomeController@index");
});


Route::get('/', function () {
    return \File::get(public_path() . '/customer.html');;
})->name("customer.home");