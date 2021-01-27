<?php

$n = 9;

for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
        if ($j == 0 && $i < 4 || $i==0 || $i==4) {
            echo "+ ";
        }elseif ($j==8 && $i>=4 || $i==8) {
            echo "+ ";
        }
        else {
            echo "- ";
        }
    }
    echo "\n";
}
