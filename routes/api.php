<?php

use App\Http\Controllers\API\V1\CannedResponsesController;
use App\Http\Controllers\API\V1\DepartmentController;
use App\Http\Controllers\API\V1\DocumentController;
use App\Http\Controllers\API\V1\ImageController;
use App\Http\Controllers\API\V1\Invokable\AgentAccessToken;
use App\Http\Controllers\API\V1\Invokable\AgentsWithDepartmentsController;
use App\Http\Controllers\API\V1\Invokable\AssignAgentController;
use App\Http\Controllers\API\V1\Invokable\AssignCategoryController;
use App\Http\Controllers\API\V1\Invokable\AssignDepartmentController;
use App\Http\Controllers\API\V1\Invokable\AssignStatusController;
use App\Http\Controllers\API\V1\Invokable\ListTicketResponses;
use App\Http\Controllers\API\V1\Invokable\TicketCategoryController;
use App\Http\Controllers\API\V1\Invokable\TicketDepartmentController;
use App\Http\Controllers\API\V1\Invokable\TicketDetailController;
use App\Http\Controllers\API\V1\Invokable\TicketHistoryController;
use App\Http\Controllers\API\V1\Invokable\TicketImageController;
use App\Http\Controllers\API\V1\Invokable\TicketResponseController;
use App\Http\Controllers\API\V1\Invokable\TicketSetupController;
use App\Http\Controllers\API\V1\Invokable\TicketStatusController;
use App\Http\Controllers\API\V1\Invokable\TicketUploadController;
use App\Http\Controllers\API\V1\ResponseController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\API\V1\StatusController;
use App\Http\Controllers\API\V1\TicketController;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Middleware\VerifyIPAndToken;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\JWT;

Route::get('/v1/guest/departments', [DepartmentController::class,'index']);

Route::prefix('/v1')
    ->middleware('auth:sanctum')
    ->group(function (){
    Route::get('/setup/tickets', TicketSetupController::class);
    Route::get('/setup/tickets/details/{ticket}', TicketDetailController::class);
    Route::get('/ticket/history/{ticket}', TicketHistoryController::class);
    Route::post('/ticket/response', TicketResponseController::class);
    Route::get('/ticket/upload/{ticket}', TicketUploadController::class);
    Route::get('/ticket/image/{image}', TicketImageController::class);
    Route::get('/list/agents/{ticket}', AgentsWithDepartmentsController::class);
    Route::get('/list/responses/{ticket}', ListTicketResponses::class);
    Route::get('/list/departments/{ticket}', TicketDepartmentController::class);
    Route::get('/list/statuses/{ticket}', TicketStatusController::class);
    Route::get('/list/categories/{ticket}', TicketCategoryController::class);
    Route::post('/assign/agent', AssignAgentController::class);
    Route::post('/assign/department', AssignDepartmentController::class);
    Route::post('/assign/status', AssignStatusController::class);
    Route::post('/assign/category', AssignCategoryController::class);
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

Route::prefix('/v1')
    ->middleware([VerifyIPAndToken::class])->group(function () {
    Route::post('/agent/login', AgentAccessToken::class);
});





