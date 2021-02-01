<?php
function selectionValue($array)
{
    $sort = [];
    foreach ($array as $key => $value) {
        if ($value == 0) {
            continue;
        } else {
            $sort[] = $value;
            sort($sort);
        }
    }
    print_r($sort);
}

echo "Masukan Angka: ";
$data = trim(fgets(STDIN));
$data = (int)$data;

selectionValue(str_split($data));