<?php

use App\Http\Controllers\API\V1\CannedResponsesController;
use App\Http\Controllers\API\V1\DepartmentController;
use App\Http\Controllers\API\V1\DocumentController;
use App\Http\Controllers\API\V1\ImageController;
use App\Http\Controllers\API\V1\ResponseController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\API\V1\StatusController;
use App\Http\Controllers\API\V1\TicketController;
use App\Http\Controllers\API\V1\TicketDetailController;
use App\Http\Controllers\API\V1\TicketSetupController;
use App\Http\Controllers\API\V1\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('/v1')
    ->middleware('auth:sanctum')
    ->group(function (){
    Route::get('/setup/tickets', TicketSetupController::class);
    Route::get('/setup/tickets/details/{ticket}', TicketDetailController::class);
    Route::apiResource('canned-responses', CannedResponsesController::class);
    Route::apiResource('departments', DepartmentController::class);
    Route::apiResource('documents', DocumentController::class);
    Route::apiResource('images', ImageController::class);
    Route::apiResource('responses', ResponseController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('statuses', StatusController::class);
    Route::apiResource('tickets', TIcketController::class);
    Route::apiResource('users', UserController::class);
});


