<?php

use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;
use App\Http\Controllers\OrganizedController;
use App\Http\Middleware\TokenMiddleware;
use App\Http\Middleware\Authenticate;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('/register/organized',[OrganizedController::class,"register"]);
Route::post("login/organized",[OrganizedController::class,"login"]);
Route::group(['middleware' => 'auth:api'], function () {
Route::get("event/showAll",[EventController::class,"all"]);
Route::post("event/show",[EventController::class,"show"]);
Route::post("event/add",[EventController::class,"add"]);
Route::post("event/edit",[EventController::class,"edit"]);
Route::post("event/delete",[EventController::class,"delete"]);
Route::post("event/addImage",[EventController::class,"addImage"]);

Route::get("show/parts",[EventController::class,"parts"]);
});
