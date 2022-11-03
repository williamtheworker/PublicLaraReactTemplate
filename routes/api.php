<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test_api', 'GeneralController@test_api');

Route::get('/item_validate', 'Items\ItemsController@item_validate');
Route::get('/item_create', 'Items\ItemsController@item_create');
Route::get('/item_update', 'Items\ItemsController@item_update');
Route::get('/item_first_or_create', 'Items\ItemsController@item_first_or_create');
Route::get('/item_first_or_new', 'Items\ItemsController@item_first_or_new');
Route::get('/item_update_or_create', 'Items\ItemsController@item_update_or_create');
Route::get('/item_upsert', 'Items\ItemsController@item_upsert');
Route::get('/items_get_all', 'Items\ItemsController@items_get_all');
Route::get('/items_raw_get_all', 'Items\ItemsController@items_raw_get_all');
Route::get('/items_get_toarray_all', 'Items\ItemsController@items_get_toarray_all');
Route::get('/item_find', 'Items\ItemsController@item_find');
Route::get('/item_basic_where', 'Items\ItemsController@item_basic_where');
Route::get('/item_where_value', 'Items\ItemsController@item_where_value');
Route::get('/item_pluck', 'Items\ItemsController@item_pluck');
Route::get('/item_pluck_multiple', 'Items\ItemsController@item_pluck_multiple');
Route::get('/item_join', 'Items\ItemsController@item_join');
Route::get('/item_left_join', 'Items\ItemsController@item_left_join');
Route::get('/item_right_join', 'Items\ItemsController@item_right_join');
Route::get('/item_cross_join', 'Items\ItemsController@item_cross_join');
Route::get('/item_advanced_join', 'Items\ItemsController@item_advanced_join');
Route::get('/item_or_where', 'Items\ItemsController@item_or_where');

// For UI usage
Route::get('/get_items', 'Items\ItemsController@get_items');
Route::post('/upload_file', 'GeneralController@upload_file');

Route::get('/product_create', 'Products\ProductsController@product_create');

Route::get('/user_create', 'Users\UsersController@user_create');