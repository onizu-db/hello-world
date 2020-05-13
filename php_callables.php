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

// In a class:

class Test {
    private function func1($arg1) {
        echo "\n".$arg1;
    }
    
    private function func2($funcName, $arg) {
        call_user_func($funcName, $arg);
    }
    
    // one way:
    public function func3() {
        $this->func2('func1', 'hello');
    }
    
    private function func4($funcName, $arg) {
        $funcName($arg);   
    }
    
    // another way:
    public function func5() {
        $this->func4([$this, 'func1'], 'hello');   // call_user_func(array($obj, 'myCallbackMethod'));
    }
}

$a = new Test();
$a->func3();
