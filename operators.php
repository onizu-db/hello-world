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
