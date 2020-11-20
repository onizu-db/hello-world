<?php 

function recursiveTraverse($arr, $indentCount = 0) {
    foreach($arr as $key => $val) { 
        $indentSpacer = '';
        for($i=0; $i<$indentCount; $i++) {
            $indentSpacer = $indentSpacer.'----'; 
        }
        echo $indentSpacer.$key;
        if(!is_array($val)) {
            echo ': '.$val.'<br>';
        } else {
            echo '<br>';
            $indentCount += 1;
            $this->recursiveTraverse($val, $indentCount);
            $indentCount -= 1; // if indentCount is incremented in this condition, then it should decrement by the same value in the same condition
        }
    }
    $indentCount = 0;
    // it's interesting to see how many times foreach ends in a recursive loop like this one
    //echo "<span style='color:red'>Foreach ends</span><br>";
}

function recursiveArrayBuild($arr) {
    $result = [];
    foreach($arr as $key => $val) { 
        $result[$key] = [];
        if(!is_array($val)) {
            $result[$key] = $val;
        } else {
            $result[$key] = array_merge($result[$key], $this->recursiveArrayBuild($val));
        }
    }
    return $result;
}