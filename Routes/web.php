<?php

/*Route::prefix('category')->group(function() {
    Route::get('/', 'CategoryController@index');
});*/

//Admin routes
Route::group(['prefix' => 'admin',  'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['auth','role:admin']], function () {
    Route::resource('category', 'CategoryController');
});

//Employee routes
Route::group(['namespace' => 'Member', 'prefix' => 'member', 'as' => 'member.', 'middleware' => ['role:employee']], function () {
    Route::resource('category', 'MemberCategoryController');
});