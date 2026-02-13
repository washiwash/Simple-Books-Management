<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AssignStudentController;

// view routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::get('/superadmin', [SuperAdmin::class, 'index'])->name('superadmin');
Route::get('/teacher', [AdminController::class, 'index'])->name('admin');
Route::get('/teacher/addBooks', [BooksController::class, 'index']) -> name('books');
Route::get('/teacher/assignStudent', [AssignStudentController::class, 'index'])->name('assignStudent');

// process routes
Route::get('/register/show', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/teacher/addBooks', [BooksController::class, 'store'])->name('books.store');
Route::patch('/teacher/addBooks/{books}', [BooksController::class, 'update'])->name('books.update');
Route::delete('/teacher/addBooks/{books}', [BooksController::class, 'destroy'])->name('books.destroy');
Route::post('/teacher/assignStudent', [AssignStudentController::class, 'store'])->name('assignStudent.store');
Route::delete('/teacher/assignStudent', [AssignStudentController::class, 'destroy'])->name('assignStudent.destroy');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
