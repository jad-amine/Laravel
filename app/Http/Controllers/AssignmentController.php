<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class assignmentController extends Controller
{
    public function getDate(){
        
    // $date2 = new DateTime("1732-04-14"); 
    // $date1 = new DateTime();
    // $interval = $date1->diff($date2);
    // echo "difference " . $interval->days . " days ";
    return strtotime('now') - strtotime('14-04-1732') . ' seconds have passed since 1732-04-14';
    }

    public function palindrome() {
        $array = $_GET['array'];
        $nbr_of_palindrom = 0;
        foreach($array as $str){
            $revString = strrev($str);
            if ($revString == $str){ 
                $nbr_of_palindrom += 1;
            }
        };
        return $nbr_of_palindrom;
    }

    public function beer() {
        $json = file_get_contents("https://api.punkapi.com/v2/beers");
        $json = json_decode($json);
        return $json[rand(0,24)]->ingredients;
    }

    public function jokes() {
        $json = file_get_contents("https://icanhazdadjoke.com/slack");
        $json = json_decode($json);
        $json = $json->attachments;
        return $json[0]->text;
    }

    public function array() {
        $len = rand(5,10);
        $students = range(1, $len);
        while(count($students) > 0){
            $team = [];
            $rand = rand(0, count($students)-1);
            array_push($team, array_splice($students, $rand, 1));
            $rand = rand(0, count($students) -1);
            array_push($team, array_splice($students, $rand, 1));
            echo json_encode($team) . '<br>';
        }
    }

    public function nominee() {
        $students = ['jad', 'pablo', 'ali', 'mhamad', 'stephanelle', 'anthony', 'pablo', 'pablo'];
        $rand = rand(0,6);
        return "the nominee is $students[$rand]" . '<br>' . 'pablo has a 3/8 probability';
    }
}
