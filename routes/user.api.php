<?php

Route::prefix("auth")->namespace("Auth")->group(function () {
    Route::middleware("auth.jwt")->group(function () {
        Route::post("sign-out", "CustomerAuthApiController@signOut");
        Route::get("me", "CustomerAuthApiController@getAuthUser");
    });

    Route::post("sign-up", "CustomerAuthApiController@signUp");
    Route::post("sign-in", "CustomerAuthApiController@signIn");
});

Route::prefix("queue-user")->middleware("auth.jwt")->namespace("User")->group(function () {
    Route::post("/", "QueueUserApiController@hello");

    // Route::get("/", "QueueUserApiController@getQueues");
    // Route::get("/{id}", "QueueUserApiController@getQueue");
    // Route::post("/", "QueueUserApiController@createQueue");
    // Route::put("/{id}", "QueueUserApiController@updateQueue");
    // Route::delete("/{id}", "QueueUserApiController@deleteQueue");
});