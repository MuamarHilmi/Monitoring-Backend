<?php

$r = 2;
for ($n=0; $n < 20; $n++) { 
    if ($n == 5 || $n == 9 || $n == 19) {
        $r = ($n+1)*2;
        echo "Baris ke n = ". $n .", r = ". $r . "\n";
    }
}