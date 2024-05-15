<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
//    Route::resource('canned_responses', UserController::class);
    Route::resource('departments', DepartmentController::class);
//    Route::resource('documents', DocumentController::class);
//    Route::resource('flags', FlagController::class);
      Route::resource('images', ImageController::class);
//    Route::resource('notes', NoteController::class);
//    Route::resource('permissions', PermissionController::class);
    Route::resource('statuses', StatusController::class);
//    Route::resource('tickets', TicketController::class);

    Route::name('technical')->get('/system', function () {
        return redirect(route('system'));
    });
});
