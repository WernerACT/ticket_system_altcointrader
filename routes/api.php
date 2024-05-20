<?php

use App\Http\Controllers\API\V1\CannedResponsesController;
use App\Http\Controllers\API\V1\DepartmentController;
use App\Http\Controllers\API\V1\DocumentController;
use App\Http\Controllers\API\V1\ImageController;
use App\Http\Controllers\API\V1\Invokable\ActivateAgentController;
use App\Http\Controllers\API\V1\Invokable\AgentsWithDepartmentsController;
use App\Http\Controllers\API\V1\Invokable\AssignAgentController;
use App\Http\Controllers\API\V1\Invokable\AssignDepartmentController;
use App\Http\Controllers\API\V1\Invokable\AssignStatusController;
use App\Http\Controllers\API\V1\Invokable\DeactivateAgentController;
use App\Http\Controllers\API\V1\Invokable\TicketDepartmentController;
use App\Http\Controllers\API\V1\Invokable\TicketDetailController;
use App\Http\Controllers\API\V1\Invokable\TicketHistoryController;
use App\Http\Controllers\API\V1\Invokable\TicketResponseController;
use App\Http\Controllers\API\V1\Invokable\TicketSetupController;
use App\Http\Controllers\API\V1\Invokable\TicketStatusController;
use App\Http\Controllers\API\V1\Invokable\TicketUploadController;
use App\Http\Controllers\API\V1\ResponseController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\API\V1\StatusController;
use App\Http\Controllers\API\V1\TicketController;
use App\Http\Controllers\API\V1\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('/v1')
    ->middleware('auth:sanctum')
    ->group(function (){
    Route::get('/setup/tickets', TicketSetupController::class);
    Route::post('/agent/activate/{user}', ActivateAgentController::class);
    Route::post('/agent/deactivate/{user}', DeactivateAgentController::class);
    Route::get('/setup/tickets/details/{ticket}', TicketDetailController::class);
    Route::get('/ticket/history/{ticket}', TicketHistoryController::class);
    Route::post('/ticket/response', TicketResponseController::class);
    Route::get('/ticket/upload/{ticket}', TicketUploadController::class);
    Route::get('/list/agents/{ticket}', AgentsWithDepartmentsController::class);
    Route::get('/list/departments/{ticket}', TicketDepartmentController::class);
    Route::get('/list/statuses/{ticket}', TicketStatusController::class);
    Route::post('/assign/agent', AssignAgentController::class);
    Route::post('/assign/department', AssignDepartmentController::class);
    Route::post('/assign/status', AssignStatusController::class);
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


