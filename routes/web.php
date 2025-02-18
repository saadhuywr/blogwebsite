<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\Auth\loginController;
use App\Http\Controllers\Backend\Auth\registerController;

// frontend routes
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/singlepost/{id}', [MainController::class, 'singlePost'])->name('singlepost');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/category/{name}', [MainController::class, 'category'])->name('category');


// Admin and user Dashboard Route
Route::get('/register/user', [registerController::class, 'index'])->name('register');
Route::post('/registeruser', [registerController::class, 'registeruser'])->name('register.user');
Route::get('/login/user', [loginController::class, 'index'])->name('login');
Route::post('/loginuser', [loginController::class, 'loginuser'])->name('login.user');
Route::post('/logout/user', [loginController::class, 'logout'])->name('logout');


// Category Controller All Routes

Route::get('/category/create', [CategoryController::class, 'index'])->name('category.index');
Route::post('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/table', [CategoryController::class, 'show'])->name('category.table');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

// Blogs Controller All Routes
Route::get('/blogs/create', [BlogController::class, 'index'])->name('blogs.index');
Route::post('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::get('/blogs/table', [BlogController::class, 'show'])->name('blogs.table');
Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/update/{id}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/delete/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

// About Controller All Routes
Route::get('/about/create', [AboutController::class, 'index'])->name('about.index');
Route::post('/about/create', [AboutController::class, 'create'])->name('about.create');
Route::get('/about/table', [AboutController::class, 'show'])->name('about.table');
Route::get('/about/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
Route::put('/about/update/{id}', [AboutController::class, 'update'])->name('about.update');
Route::delete('/about/delete/{id}', [AboutController::class, 'destroy'])->name('about.destroy');

// Comment Controller All Routes
Route::get('/comments/table/{id}', [CommentController::class, 'show'])->name('comments.table');
Route::get('/comments/edit/{id}', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/update/{id}', [CommentController::class, 'update'])->name('comments.update');
Route::post('/comments/store/{id}', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/delete/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
