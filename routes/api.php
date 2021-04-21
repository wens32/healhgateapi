<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\TypePageController;
use App\Http\Controllers\TypeUserController;
use App\Http\Controllers\UserController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('demandes', DemandeController::class);
    Route::apiResource('offres', OffreController::class);
    Route::apiResource('commentaires', CommentaireController::class);
    Route::apiResource('pages', PageController::class);
    Route::apiResource('publications', PublicationController::class);
    Route::apiResource('typepages', TypePageController::class);
    Route::apiResource('typeusers', TypeUserController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
