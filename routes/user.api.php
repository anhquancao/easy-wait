<?php

Route::prefix("queue-user")->middleware("auth.jwt")->namespace("User")->group(function () {
    Route::post("/", "QueueUserApiController@hello");

    // Route::get("/", "QueueUserApiController@getQueues");
    // Route::get("/{id}", "QueueUserApiController@getQueue");
    // Route::post("/", "QueueUserApiController@createQueue");
    // Route::put("/{id}", "QueueUserApiController@updateQueue");
    // Route::delete("/{id}", "QueueUserApiController@deleteQueue");
});