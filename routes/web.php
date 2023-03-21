<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource("Categories",CategoryController::class);
Route::get("/",function(){
    $categories=Category::all();
    return response()->view("cms_pages.categorisePages.viewCategories",["categories"=>$categories]);
});
Route::resource("Products",ProductController::class);
