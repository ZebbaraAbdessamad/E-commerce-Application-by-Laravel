<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('orders')->group(function() {
    Route::get('/', 'OrderController@index')->name('orders.index')->middleware('role:admin');
    Route::get('/status-setting/{slug}', 'OrderController@setting')->name('orders.setting')->middleware('role:admin');
    Route::post('/status-setting', 'OrderController@status_setting')->name('orders.status_setting')->middleware('role:admin');
    Route::get('/details/{slug}', 'OrderController@details')->name('orders.details')->middleware('role:admin');
    Route::delete('/delete', 'OrderController@destroy')->name('orders.destroy')->middleware('role:admin');
});

Route::prefix('stock')->group(function() {
    Route::get('/', 'StockController@index')->name('stock.index')->middleware('role:admin');
    Route::post('/add-quantity', 'StockController@add_quantity')->name('stock.add_quantity')->middleware('role:admin');
    Route::delete('/delete', 'StockController@destroy')->name('stock.destroy')->middleware('role:admin');

});

Route::resource('categories', 'CategoryController')->middleware('role:admin');
Route::post('categories/destroy', 'CategoryController@destroy')->name('categories.destroy')->middleware('role:admin');

Route::resource('products', 'ProductController')->middleware('role:admin');
Route::post('products/destroy', 'ProductController@destroy')->name('products.destroy')->middleware('role:admin');
Route::get('products/image/{id}','ProductController@remove')->name('image.remove')->middleware('role:admin');
