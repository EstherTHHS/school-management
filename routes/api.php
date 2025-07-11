<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AssignmentController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\TeacherController;
use App\Http\Controllers\API\AssignmetController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/users', [UserController::class, 'store']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::controller(UserController::class)->group(function () {
        Route::get('/users',  'index');
        Route::get('/users/{id}',  'getById');
        Route::post('/users/{id}',  'update');
        Route::delete('/users/{id}',  'delete');
        Route::post('/users/{id}/status',  'updateStatus');
        Route::post('/users/{id}/change-password',  'changePassword');
    });
    Route::controller(SubjectController::class)->group(function () {
        Route::get('/years',  'getYears');
        Route::get('/subjects',  'getSubjects');
        Route::get('/subjects/{id}',  'getSubjectById');
        Route::post('/subjects',  'storeSubject');
        Route::post('/subjects/{id}',  'updateSubjectById');
        Route::delete('/subjects/{id}',  'deleteSubjectById');
        Route::post('/subjects/{id}/toggle-status',  'toggleStatus');
        Route::post('/year-subjects',  'attachSubjectToYear');
        Route::post('/teacher-subjects',  'storeTeacherSubject');
    });
    Route::controller(AssignmentController::class)->group(function () {
        Route::get('/assignments',  'getAssignments');
        Route::post('/assignments',  'storeAssignment');
        Route::get('/teachers',  'getTeachers');
        Route::get('/students',  'getStudents');
        Route::get('/year-subjects',  'getYearSubjects');
        Route::get('/assignments/{id}',  'getAssignmentById');
        Route::post('/assignment-category', 'storeAssignmentCategory');
        Route::get('/assignment-categories', 'getAssignmentCategories');
        Route::get('/delete-assignment-file/{id}', 'deleteAssignmentFile');
        Route::post('/submissions', 'storeSubmission');
        Route::post('/submissions/{id}', 'updateSubmissionById');
        Route::get('/years/{yearId}/subjects', 'getSubjectListByYearId');
        Route::get('/submissions', 'getSubmissionList');
    });
});
