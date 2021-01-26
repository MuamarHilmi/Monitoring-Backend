<?php

$n = 9;
$nilai = 1;
for ($i=0; $i < $n; $i++) { 
    for ($j=0; $j < $n; $j++) { 
        if ($j==$i) {
            echo $nilai;
            $nilai+=2;
        }else {
            echo "- ";
        }
    }
    echo "\n";
}