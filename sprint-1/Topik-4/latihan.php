<?php

$nilai = [5, 9, 6, 7, 9, 8, 10, 7, 8];


echo "//====> SOAL 1 <====\\\ \n\n";

$mean = 0;
$median;

function median_array($nilai)
{
    $nilai = $nilai[count($nilai)/2];
    return $nilai;
}
sort($nilai);

$mean = array_sum($nilai)/count($nilai);
echo "Mean = ".$mean. "\n";

$median = median_array($nilai);
echo "Median = ".$median. "\n";

$modus = array_count_values($nilai);
// // $max = $modus[array_key_first($modus)];
// print_r(max($modus));
echo "Modus paling banyak \n";
foreach ($modus as $key => $value) {
    if ($value == max($modus)) {
        $max = $value;
    }else {
        continue;
    }
    echo " Nilai ".$key . " ada ". $max. "\n";
}


echo "\n\n //====> SOAL 2 <====\\\ \n\n";

for ($i=0; $i < 3; $i++) { 
    $lowest[] = $nilai[$i];
    echo "Lowest index ke-".$i." : ".$lowest[$i]."\n";
}
echo "\n";
$highest = array();
for ($i=count($nilai)-1; $i >= 0; $i--) { 
    if ( in_array($nilai[$i], $highest)) {
        continue;
    }else{
        $highest[] = $nilai[$i];
    }
    if (count($highest)==3) {
        break;
    }
}
foreach ($highest as $key => $value) {
    echo "Highest index ke-".$key." : ".$value."\n";
}