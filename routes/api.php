<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    //return view('welcome');
    $date2 = new DateTime("1732-04-14"); 
    $date1 = new DateTime();
    // $diff = date_diff($date1,$date2);
    $interval = $date1->diff($date2);
    // echo json_encode($interval);
    echo "difference " . $interval->days . " days ";
});
