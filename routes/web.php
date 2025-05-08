<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\CourseEvaluationController;
use App\Http\Controllers\ApiKeyController;

// College Routes
Route::resource('colleges', CollegeController::class);

// Department Routes
Route::resource('departments', DepartmentController::class);

// Course Routes
Route::resource('courses', CourseController::class);

// Instructor Routes
Route::resource('instructors', InstructorController::class);

// Program Routes
Route::resource('programs', ProgramController::class);

// Academic Year Routes
Route::resource('academic_years', AcademicYearController::class);

Route::get('/', [CourseEvaluationController::class, 'index'])->name('course_evaluations.index'); // change this line


Route::resource('api-keys', ApiKeyController::class);