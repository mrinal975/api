<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products','ProductController');

Route::apiResource('productss','ProductControllers');

Route::group(['prefix'=>'products'],function (){
    Route::apiResource('/{product}/reviews','ReviewController');
});