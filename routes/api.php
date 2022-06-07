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

Route::get('/array', function () {
    $len = rand(5,10);
    $a = range(1, $len);
    while(count($a)>0){
        $team = [];
        $rand = rand(0, count($a)-1);
        array_push($team, array_splice($a, $rand, 1));
        $rand = rand(0, count($a) -1);
        array_push($team, array_splice($a, $rand, 1));
        echo json_encode($team) . '<br>';
    }
});

Route::get('/nominee', function () {
    $students = ['jad', 'pablo', 'ali', 'mhamad', 'stephanelle', 'anthony', 'pablo', 'pablo'];
    $rand = rand(0,6);
    echo "the nominee is $students[$rand]" . '<br>' . 'pablo has a 3/8 probability';
});