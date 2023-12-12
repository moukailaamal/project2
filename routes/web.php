<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\categorieController;
use App\Http\Controllers\dashboardController;
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

Route::get('/', function () {
    return view('welcome');
});
// cree et supprimer et manipuler un article
Route::resource('articles', ArticleController::class)->names([
    'index' => 'articles.index',
    'create' => 'articles.create',
    'store' => 'articles.store',
    'edit' => 'articles.edit',
    'update' => 'articles.update',
    'destroy' => 'articles.destroy',
]);

// cree et supprimer et manipuler un categorie
Route::resource('categories',categorieController::class)->names([
    'index' =>'categories.index',
    'create'=>'categories.create',
    'store'=>'categories.store',
    'edit'=>'categories.edit',
    'update'=>'categories.update',
    'destroy'=>'categories.destroy',
]);
// dashboard
Route::get('/dashboard',[dashboardController::class,'index'])->name('dashboard.index');
// formulaire
Route::get('/register',[AuthController::class,'showRegistrationForm'])->name('auth.registerform');
Route::post('/register',[AuthController::class,'register'])->name('auth.register');
Route::get('/login',[AuthController::class,'showLoginForm'])->name('auth.loginform');
Route::post('/login',[AuthController::class,'login'])->name('auth.login');
route::post('/logout',[AuthController::class,'logOut'])->name('auth.logOut');

