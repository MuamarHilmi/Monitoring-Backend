<?php

$n = 9;

for ($i=0; $i < $n; $i++) { 
    if($i%2 == 0){
        continue;
    }else {
        echo $i. " ";
    }
}