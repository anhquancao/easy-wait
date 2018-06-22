<?php



Route::prefix("auth")->namespace("Customer")->group(function() {
    Route::post("sign-up", "CustomerApiController@signUp");
});