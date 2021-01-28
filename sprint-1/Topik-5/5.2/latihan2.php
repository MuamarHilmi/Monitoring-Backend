<?php

$jari = 4;
$alasAtas = 2;
$alasBawah = 5;
$tinggi = 4;
$alas = 12;

$luasSegitiga = function($tinggi, $alas){
    return 0.5*$alas*$tinggi;
};
$luasLingkaran= function($jari){
    return 3.14*$jari**2;
};
$luasTrapesium= function($alasAtas, $alasBawah, $tinggi){
    return ($alasBawah+$alasAtas)/2*$tinggi;
};

echo "Luas Segitiga = ". $luasSegitiga($tinggi, $alas). "\n";
echo "Luas Lingkaran = ". $luasLingkaran($jari). "\n";
echo "Luas Trapesium = ". $luasTrapesium($alasAtas, $alasBawah, $tinggi). "\n";