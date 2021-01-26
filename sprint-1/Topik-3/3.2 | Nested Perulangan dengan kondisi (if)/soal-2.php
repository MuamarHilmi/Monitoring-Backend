<?php

$n = 9;

for ($i=0; $i < $n; $i++) { 
    for ($j=8; $j >= 0; $j--) { 
        if ($j>$i) {
            // echo $i . " + ". $j. " ";
            echo "- ";
        }else {
            // echo $i . " - ". $j. " ";
            echo "+ ";
        }
    }
    echo "\n";
}
