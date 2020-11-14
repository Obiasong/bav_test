<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/manage_products',[ManageProductController::class,'showProductListPage'])->name('manage_products');

Route::get('/manage_products/edit',[ManageProductController::class,'getEditPage']);
Route::post('/manage_products/edit',[ManageProductController::class,'saveProductChanges']);



Route::post('/manage_products/delete',[ManageProductController::class,'deleteProduct']);
Route::post('/manage_products/edit_product',[ManageProductController::class,'showEditProductPage']);


Route::get('/manage_products/create',[ManageProductController::class,'showCreateProductPage']);
Route::post('/manage_products/create',[ManageProductController::class,'createProduct']);

