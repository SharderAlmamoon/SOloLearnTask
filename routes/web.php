<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/',[CategoryController::class,'ForFrontendAll'])->name('website');
Route::GET('/relatedpic/{value}',[CategoryController::class,'SerachPic']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(CategoryController::class)->prefix('/category')->middleware(['auth','verified'])->group(function(){
 	Route::get('/manage','AllCategory')->name('category.all');
 	Route::get('/add','AddCategory')->name('category.add');
 	Route::POST('/store','StoreCategory')->name('category.store');
});




Route::get('/allbackenddashboard',function(){
   return view('backenddashboard');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
