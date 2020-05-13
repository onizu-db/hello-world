<?php

function func1($arg1) {
    echo $arg1;
}

function sum($x, $y) {
    return $x+$y;
}

function func2($funcName, $arg, $funcName2, $arg2A, $arg2B) {
    call_user_func($funcName, $arg);
    $sum = call_user_func($funcName2, $arg2A, $arg2B);
    return $sum;
}

$result = func2('func1', 'hi', 'sum', 2, 3);
echo "\n".$result;
