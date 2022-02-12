<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SemesterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum', 'ability:admin'])->group(function () {
    Route::apiResource('semesters', SemesterController::class)->scoped([
        'semester' => 'code'
    ])->only(['store', 'update', 'destroy']);
    Route::apiResource('semesters.courses', CourseController::class)->scoped([
        'semester' => 'code'
    ])->only(['store']);
});

Route::apiResource('semesters', SemesterController::class)->scoped([
    'semester' => 'code'
])->only(['index', 'show']);
Route::apiResource('semesters.courses', CourseController::class)->scoped([
    'semester' => 'code'
])->only(['index', 'show']);
Route::apiResource('semesters.sections', SectionController::class)->scoped([
    'semester' => 'code',
    'section' => 'crn'
])->only(['show']);
