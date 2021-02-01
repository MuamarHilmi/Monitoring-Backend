<?php
echo "||=== SOAL 1 ===|| \n\n";
for ($i = 0; $i < 9; $i++) {
    for ($j = 0; $j < 9; $j++) {
        if ($j % 2 == 0) {
            echo "+";
        } else {
            echo "-";
        }
    }
    echo "\n";
}
echo "\n\n";
for ($i = 0; $i < 9; $i++) {
    for ($j = 0; $j < 10; $j++) {
        if ($i % 2 == 0) {
            echo "+";
        } else {
            echo "-";
        }
    }
    echo "\n";
}



echo "\n\n ||=== SOAL 2 ===|| \n\n";

function selectionValue($array)
{
    $sort = [];
    $i = 0;
    foreach ($array as $key => $value) {
        if ($value == 0) {
            $i++;
            continue;
        } else {
            $sort[$i][] = $value;
            sort($sort[$i]);
        }
    }
    print_r($sort);
}

echo "Masukan Angka: ";
$data = trim(fgets(STDIN));
$data = (int)$data;

selectionValue(str_split($data));


echo "\n\n ||=== SOAL 3 ===|| \n\n";

echo "======================================== \n";
echo "| Selamat Datang Di Program Input Data |\n";
echo "======================================== \n\n\n";

echo "Data yang ingin diinputkan :\n";
$x = 1;

while (true) {
    echo "Masukkan data $x \n";echo "\n";
    echo "Nama :";
    $nama[] = trim(fgets(STDIN));
    echo "\n";
    echo "NIK :";
    $nik[] = trim(fgets(STDIN));
    echo "\n";
    echo "Pilih Jurusan \n1. Programmer, 2. Multimedia, 3. Marketer\n";
    echo "Jurusan :";
    $jurusan[] = trim(fgets(STDIN));
    echo "\n";
    echo "Pilih Divisi \n1. Backend, 2. Frontend, 3. Mobile\n";
    echo "Divisi :";
    $divisi[] = trim(fgets(STDIN));
    echo "\n";
    echo "Usia :";
    $usia[] = trim(fgets(STDIN));
    echo "\nApa ingin menambah: (y/n)";
    $aksi = trim(fgets(STDIN));

    echo "\n\n";
    if ($aksi == 'n') {
        break;
    }
    $x++;
}
for ($i = 0; $i < count($nama); $i++) {
    $file[] = [
        'name' => $nama[$i],
        'nik'  => $nik[$i],
        'jurusan' => $jurusan[$i],
        'divisi' => $divisi[$i],
        'usia' => $usia[$i],
    ];
}
print_r($file);
$n = 1;
echo "Yang minat sebagai Backend: \n";
foreach ($file as $key => $value) {
    if ($value['divisi']=='backend') {
        echo $n . ". ". $value['name']. "\n";
    }
    $n++;
}
echo "Yang yang kurang dari 25: \n";
$i = 1;
foreach ($file as $key => $value) {
    if ($value['usia'] < 25) {
        echo $i . ". ". $value['name']." usia " . $value['usia'] ."\n";
    }
    $i++;
}
echo "Yang paling muda adalah";

foreach ($file as $key => $value) {
    $muda = [];
    $muda[$file [$key]['usia']]=$value;
}
ksort($muda);
$new []= array_key_first($muda);

foreach ($new as $key => $value) {
    echo $value['name']. " dengan usia ". $value['usia'];
}

// print_r($data[0]);