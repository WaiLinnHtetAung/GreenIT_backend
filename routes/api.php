<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function() {

    //promotion
    Route::resource('promotions', 'PromotionsController');

    //Email
    Route::post('sendEmail', 'EmailController@sendEmail')->name('sendEmail');
});
