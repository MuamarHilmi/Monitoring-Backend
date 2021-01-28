<?php

function merubah($data){
    foreach ($data as $key => $value) {
        $file[] = $value*3;
    }
    return $file;
}

$data = [2, 3, 4, 5, 6, 7, 8, 9];

print_r(merubah($data));

