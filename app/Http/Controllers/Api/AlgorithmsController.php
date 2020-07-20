<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlgorithmsController extends Controller
{
    //
    public function factorialof13(){
        $factorial = 1;
        $number = 13;
        for ($i = 1; $i <= $number; $i++){ 
            $factorial = $factorial * $i; 
        } 
        return $factorial; 
    }

    public function searchInsert(Request $request) {

        $nums = $request['numbers'];
        $target = $request['target'];
        $i = 0; 
        $j = sizeOf($nums)-1;
  
        while($i<=$j){
            $mid = ($i+$j)/2;
            if($target > $nums[$mid]){
                $i=$mid+1;
            }else if($target < $nums[$mid]){
                $j=$mid-1;
            }else{
                return (int)$mid;
            }
        }
        return (int)$i;
    }

    public function sortArrayValues(Request $request){
        $array = $request->states;
        usort($array, function ($a, $b) { return (strlen($b) <=> strlen($a)); });
        return json_encode($array);  
    }

    public function groupAnagrams(Request $request){
        $data = $request->array;
        // Initialize an empty array
        $map = [];
        foreach($data as $str){
            //Split the string to get an array of individual characters.
            $strSplit = str_split($str); 
            // Sort them in ascending/non-decreasing order.
            sort($strSplit);
            // Implode it back to get it as a sorted string.
            $strSplit = implode("",$strSplit);
            // put the current string in an array where sorted key is the actual key 
            // where the current anagram belongs
            $map[$strSplit][] = $str; 
        }
        return json_encode($map);
    }
}
