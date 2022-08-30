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

use Modules\Frontend\Http\Controllers\CartController;
use Modules\Frontend\Http\Controllers\CommandController;
use Modules\Frontend\Http\Controllers\UserController;

Route::get('/', 'HomeController@index')->name('frontend.home');
Route::get('/shop', 'HomeController@shop')->name('frontend.shop');
Route::get('/about', 'HomeController@about')->name('frontend.about');
Route::get('/contact', 'HomeController@contact')->name('frontend.contact');

Route::get('product/{slug}', 'HomeController@show')->name('product.show');


Route::prefix('cart')->group(function() {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.cart');
    Route::post('add-to-cart/{id}', [CartController::class, 'addCart'])->name('add.cart');
    Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [CartController::class, 'destroy'])->name('remove.cart');
});

Route::prefix('command')->group(function() {
    Route::post('add-command', [CommandController::class, 'add_command'])->name('add.command');
    Route::get('add-command', [CartController::class, 'index']);
    Route::get('invoice/{id}', [CommandController::class, 'show_facteur'])->name('show.facture');
});

Route::prefix('user')->group(function() {
    Route::get('profile', [UserController::class, 'index'])->name('user.profile')->middleware('role:client');
    Route::post('profile', [UserController::class, 'update_profile'])->name('user.update')->middleware('role:client');
    Route::get('profile/change-password', [UserController::class, 'change_password'])->name('user.change_password')->middleware('role:client');
    Route::post('profile/change-password', [UserController::class, 'changepass'])->name('user.changepass')->middleware('role:client');
    Route::get('profile/commands', [UserController::class, 'commands'])->name('user.commands')->middleware('role:client');
    Route::get('profile/commands/details/{slug}', [UserController::class, 'commands_details'])->name('user.commands_details')->middleware('role:client');

});

