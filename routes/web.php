<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CustomAuthController;

use Illuminate\Support\Facades\Route;

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


Route::get('/', [CustomAuthController::class, 'homedashboard'])->middleware('alreadyLoggedIn');
Route::post('/admission-form', [CustomAuthController::class, 'admisionForm'])->middleware('alreadyLoggedIn');
Route::get('/admissions', [CustomAuthController::class, 'Admissions'])->middleware('alreadyLoggedIn');
Route::get('/add-student', [CustomAuthController::class, 'addStudentForm'])->middleware('alreadyLoggedIn');
Route::post('/add-student-now', [CustomAuthController::class, 'addStudent'])->middleware('alreadyLoggedIn');
Route::get('/view-student', [CustomAuthController::class, 'viewStudents'])->middleware('alreadyLoggedIn');
Route::delete('/view-student/{user}', [CustomAuthController::class, 'deleteStudent']);
Route::get('/view-student/{user}/edit', [CustomAuthController::class, 'editStudentView']);
Route::put('/view-student/edit/{user}', [CustomAuthController::class, 'updateStudent']);
Route::get('/login', [CustomAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/register', [CustomAuthController::class, 'registration'])->middleware('alreadyLoggedIn');
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/student-home', [CustomAuthController::class, 'studentHome'])->middleware('isLoggedIn');
Route::get('/admin-home', [CustomAuthController::class, 'adminHome'])->middleware('isLoggedIn');
Route::get('/student-profile', [CustomAuthController::class, 'studentProfile'])->middleware('isLoggedIn');
Route::put('/student-profile/{user}', [CustomAuthController::class, 'updateProfile']);
Route::get('/logout', [CustomAuthController::class, 'logout']);
Route::get('/admin-add-teacher-form', [CustomAuthController::class, 'addTeacherForm'])->middleware('alreadyLoggedIn');
Route::post('/admin-add-teacher', [CustomAuthController::class, 'addTeacher'])->middleware('alreadyLoggedIn');
Route::get('/view-teacher', [CustomAuthController::class, 'viewTeachers'])->middleware('alreadyLoggedIn');
Route::delete('/view-teacher/{teacher}', [CustomAuthController::class, 'deleteTeacher'])->middleware('alreadyLoggedIn');
Route::get('/view-teacher/{teacher}/edit', [CustomAuthController::class, 'editTeacherView'])->middleware('alreadyLoggedIn');
Route::put('/view-teacher/edit/{teacher}', [CustomAuthController::class, 'updateTeacher']);



Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);
