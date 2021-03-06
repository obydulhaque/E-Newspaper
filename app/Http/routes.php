<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
 Route::get('data', function () {
     return view('common_folder.data_table');
});


Route::get('/','FontendNewsController@news_home');
//Route::get('/','FontendNewsController@create');
Route::get('news-details/{id}','FontendNewsController@news_details');
Route::get('category-news-details/{id}','FontendNewsController@category_news_details');

Route::auth();

Route::get('/home', 'HomeController@index');



// Main category add by obydul date 24-7-16

Route::get('category-create-form','CategoryController@Main_cat_show');
Route::post('category-store','CategoryController@store');
Route::get('category-delete/{id}','CategoryController@category_delete');
Route::post('home-store/{id}','CategoryController@home_show_store');
Route::post('up-down-store/{id}','CategoryController@up_down_store');
Route::post('category-create-form/{id}','CategoryController@main_category_update');

// Sub category add by obydul date 24-7-16
Route::post('sub-category-store','CategoryController@sub_cat_store');
Route::get('sub-category-delete/{id}','CategoryController@sub_cat_delete');
Route::post('sub-category-update/{id}','CategoryController@sub_cat_update');

//slider image controlling
Route::get('slider-form','SliderController@slider_form');
//saif test water mark
Route::post('slider-form','SliderController@slider_upload');
//end watermark
//Route::post('slider-image-store','SliderController@slider_upload');
Route::post('slider-update/{id}','SliderController@slider_update');
Route::get('slider-delete/{id}','SliderController@slider_delete');
Route::post('slider-show-store/{id}','SliderController@slider_store');
//Route::post('slider-form','SliderController@waterpallImage');


// news insert update delete by obydul date:31-7-16
Route::get('news-create','NewsController@create');
Route::get('news-category-show','NewsController@sub_category');
Route::post('news-contain-store','NewsController@news_store');
Route::get('news-show','NewsController@news_show');
Route::get('news-show-delete/{id}','NewsController@news_delete');
Route::get('news-edit-form/{id}','NewsController@edit_news');
Route::post('news-update/{id}','NewsController@news_update');
Route::post('news-published/{id}','NewsController@new_publish');

Route::get('backing-news','NewsController@backing_news_form');
Route::post('backing-news-store','NewsController@backing_news_store');
Route::post('backing-news-update/{id}','NewsController@backing_news_update');
Route::get('backing-news-delete/{id}','NewsController@backing_news_delete');
Route::post('backing-news-show/{id}','NewsController@backing_news_show');



// fontend layout controll by obydul date:6-8-16





// Add controll by obydul date:7-8-16

Route::get('add-create-form','AddController@create');
Route::post('add-store','AddController@add_store');
Route::post('add-update/{id}','AddController@add_update');
Route::post('add-status/{id}','AddController@AdsStatus');
Route::get('add-delete/{id}','AddController@adds_delete');



// Change Password
Route::get('change-password','ChangePasswordController@changePasswordForm');
Route::post('change-pass','ChangePasswordController@changePassword');

// 404 page controll by obydul date:13-8-16

//Route::get('404','AddController@errorpage');
