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
    echo 'api path' . '<br>' . '"/date" for time difference from 1732-04-14'. 
    '<br>' . '"/palindrom" to find palindrom in arrays'. '<br>' . '"/beer" to find beer ingredients'
    . '<br>' . '"/jokes" to get the latest dad jokes'. '<br>' . '/';
});

Route::get('/date', function () {

    // $date2 = new DateTime("1732-04-14"); 
    // $date1 = new DateTime();
    // $interval = $date1->diff($date2);
    // echo "difference " . $interval->days . " days ";
    echo strtotime('now') - strtotime('14-04-1732') . ' seconds have passed since 1732-04-14';
});


Route::get('/palindrome', function () {
    $array = $_GET['array'];
    $nbr_of_palindrom = 0;
    foreach($array as $str){
        $revString = strrev($str);
        if ($revString == $str){ 
            $nbr_of_palindrom += 1;
        }
    };
    echo strval($nbr_of_palindrom);
});

Route::get('/beer', function () {
    $json = file_get_contents("https://api.punkapi.com/v2/beers");
    $json = json_decode($json);
    echo json_encode($json[rand(0,24)]->ingredients);
});

Route::get('/jokes', function () {
    $json = file_get_contents("https://icanhazdadjoke.com/slack");
    $json = json_decode($json);
    $json = $json->attachments;
    echo json_encode($json[0]->text);
});

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