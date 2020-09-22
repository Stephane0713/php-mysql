<?php

// function fibonacci($int) {
//     $arr = [0,1];
//     $val = 0;
//     for($i = 1; $i < $int; $i++) {
//         $val = $arr[$i] + $arr[$i -1];
//         array_push($arr, $val);
//         echo $val.'<br>';
//     }
// };

// fibonacci(12);

function fibo($int, $acc = 0, $cur = 1) {
    if($int > 1) {
        return fibo($int -1, $cur, $acc + $cur);
    } else {
        return $cur;
    }
};

echo fibo(12);