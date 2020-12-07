<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ContestController::class, 'index']);
Route::prefix('contests')->group(function () {
    Route::get('create', [ContestController::class, 'create']);
    Route::post('/store', [ContestController::class, 'store']);
    Route::get('/{id}/continue', [ContestController::class, 'continuePlaying']);
    Route::get('/{id}/winner/{playerid}', [ContestController::class, 'winner']);
    Route::get('/{id}/enter-player-name', [ContestController::class, 'enterPlayers']);
    Route::post('/players/store', [ContestController::class, 'storePlayers']);
    Route::get('/{id}/player/{player_id}', [ContestController::class, 'playersTurn']);
    Route::get('/{id}/player/{player_id}/card/{cardid}', [ContestController::class, 'getPlayersCard']);
    Route::get('/{id}/player/{player_id}/card/{cardid}/result', [ContestController::class, 'playerResult']);
});

Auth::routes(['register' => false]);
Route::prefix('admin')->group(function () {
  Route::prefix('cards')->group(function () {
    Route::get('/', [CardController::class, 'index']);
    Route::get('/create', [CardController::class, 'create']);
    Route::post('/store', [CardController::class, 'store']);
    Route::get('/{id}/edit', [CardController::class, 'edit']);
    Route::post('/update', [CardController::class, 'update']);
    Route::get('/{id}/delete', [CardController::class, 'delete']);
  });

  Route::get('/users/change-password', [UserController::class, 'changePassword']);
  Route::post('/users/password/update', [UserController::class, 'updatePassword']);

});
