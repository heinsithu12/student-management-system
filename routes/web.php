<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;
use App\Models\Enrollment;
use App\Models\Payment;

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
    return view('layout');
});

Route::resource('/students',StudentController::class);
Route::resource('/teachers',TeacherController::class);
Route::resource('/courses',CourseController::class);
Route::resource('/batches',BatchController::class);
Route::delete('/students/{id}',[StudentController::class , 'destroy'])->name('students.destory');
Route::resource('/enrollments',EnrollmentController::class);
Route::resource('/payments',PaymentController::class);
Route::get('report/report1/{pid}', [ReportController::class,'report1']);