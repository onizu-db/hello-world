<?php

    // "??" is the null coalescing operator (php7)
    // "?:" is the Elvis operator
    // "?" is the ternary operator (php5)

$x;
$y = 0;
$z = 3;

if ($y === 1) {
    $x = 1;
} else {
    $x = ($z !== NULL ? $z : 2);
    // $x = $z ?? 2; -- if $z is NULL then $x = 2 (php7)
}

echo $x;

// null-coalescing operator:
$values = [
    'a' => 1,
    'b' => 2,
    'c' => 3
    ];
$total = [];
foreach($values as $value) {
    $total['x'] ?? $total['x'] = 0; 
    // null-coalescing operator (PHP7):
    // $x ?? $x=; if $x is not set, set it to 0, else retain its value.
    $total['x'] += $value;
}
var_dump($total); // array(1) { ["x"] => int(6) }
