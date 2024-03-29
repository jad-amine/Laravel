<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AssignmentController;
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

Route::get('/', function () {
    echo 'api path' . '<br>' . '"/date" for time difference from 1732-04-14'. 
    '<br>' . '"/palindrom" to find palindrom in arrays'. '<br>' . '"/beer" to find beer ingredients'
    . '<br>' . '"/jokes" to get the latest dad jokes'. '<br>' . '/';
});

Route::get('/date', [AssignmentController::class, 'getDate'])->name("get-date");


Route::get('/palindrome', [AssignmentController::class, 'palindrome']);

Route::get('/beer', [AssignmentController::class, 'beer']);

Route::get('/jokes', [AssignmentController::class, 'jokes']);

Route::get('/array', [AssignmentController::class, 'array']);

Route::get('/nominee', [AssignmentController::class, 'nominee']);