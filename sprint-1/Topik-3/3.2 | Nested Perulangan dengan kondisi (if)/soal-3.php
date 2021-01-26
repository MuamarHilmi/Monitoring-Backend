<?php

$n = 9;
for ($i=0; $i < $n; $i++) { 
    if ($i<5) {
        for ($j=1; $j <= $i; $j++) { 
            echo "- ";
        }
        for ($h=5; $h > $i; $h--) { 
            echo "+ ";
        }
        for ($h=4; $h > $i; $h--) { 
            echo "+ ";
        }
        for ($j=1; $j <= $i; $j++) { 
            echo "- ";
        }
    }else {
        for ($j=$i; $j < $n-1; $j++) { 
            echo "- ";
        }
        for ($h=5; $h <= $i; $h++) { 
            echo "+ ";
        }
        for ($h=4; $h <= $i; $h++) { 
            echo "+ ";
        }
        for ($j=$i; $j < $n-1; $j++) { 
            echo "- ";
        }
        // for ($h=4; $h > $i; $h--) { 
        //     echo "+ ";
        // }
        // for ($j=1; $j <= $i; $j++) { 
        //     echo "- ";
        // }
    }
    echo "\n";
}