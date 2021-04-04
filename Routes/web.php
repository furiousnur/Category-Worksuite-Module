<?php


/*Route::prefix('category')->group(function() {
    Route::get('/', 'CategoryController@index');
});*/

//Admin routes
Route::group(['prefix' => 'employee', 'as' => 'employee.', 'middleware' => ['auth']], function () {
    Route::resource('category', 'CategoryController');
});