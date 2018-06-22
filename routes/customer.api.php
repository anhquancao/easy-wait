<?php



Route::prefix("auth")->namespace("Auth")->group(function() {
    Route::middleware("auth.jwt")->group(function() {
        Route::post("sign-out", "CustomerAuthApiController@signOut");
        Route::get("me", "CustomerAuthApiController@getAuthUser");
    });

    Route::post("sign-up", "CustomerAuthApiController@signUp");
    Route::post("sign-in", "CustomerAuthApiController@signIn");
});