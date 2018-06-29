<?php



Route::namespace("Auth")->group(function () {
    Route::middleware("auth.jwt")->group(function () {
        Route::post("sign-out", "AuthApiController@signOut");
        Route::get("me", "AuthApiController@getAuthUser");
    });

    Route::post("sign-up", "AuthApiController@signUp");
    Route::post("sign-in", "AuthApiController@signIn");
});
