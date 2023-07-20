<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/hello/{name?}', function ($name = null) {
    if ($name) {
        return "Hello, " . $name . "!";
    } else {
        return "Hello, anonymous user!";
    }
});

Route::get('/users/last-week', [UserController::class, 'usersCreatedLastWeek'])->name('users.last-week');

Route::get('/users/show-with-resource/{user}', [UserController::class, 'showWithResource'])->name('users.show-with-resource');

Route::get('/users/send-mail/{user}', [UserController::class, 'sendMail'])->name('users.send-mail');

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/users/{user}/has-role/{role}', [UserController::class, 'userHasRole'])->name('users.has-role');

Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
