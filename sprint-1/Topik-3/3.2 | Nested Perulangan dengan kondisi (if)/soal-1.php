<?php

$n = 9;

for ($i=0; $i < $n; $i++) { 
    for ($j=0; $j < $n; $j++) { 
        if ($j<=$i) {
            echo "+ ";
        }else {
            echo "- ";
        }
    }
    echo "\n";
}