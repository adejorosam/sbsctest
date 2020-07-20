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
        $low = 0; 
        $high = sizeOf($nums)-1;
        
        while($low <= $high){
            // Divide the length of the array by 2(lower bound + upper bound / 2)
            $mid = ($low + $high)/2;
            // Compare the target element with the elements in the array
            if($target > $nums[$mid]){
                // If it's higher, add one to the index
                $low = $mid+1;
            // Compare the target element with the elements in the array
            }else if($target < $nums[$mid]){
                // If it's lower, subtract one from the index
                $high = $mid-1;
            }else{
                // If the target element is equals to the element in the array
                // return the index
                return (int)$mid;
            }
        }
        // If the element is not found, return the low index
        return (int)$low;
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
