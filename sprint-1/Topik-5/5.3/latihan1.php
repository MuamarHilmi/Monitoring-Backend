<?php

$students = [
    [
        'id' => 'IT-001',
        'name' => 'Ridwan',
        'division' => 'PHP Backend',
        'age' => 25,
    ],
    [
        'id' => 'IT-010',
        'name' => 'Achmad',
        'division' => 'Java for Android',
        'age' => 23,
    ],
    [
        'id' => 'IT-005',
        'name' => 'Yusuf',
        'division' => 'ReactJS',
        'age' => 22,
    ],
    [
        'id' => 'IT-002',
        'name' => 'Arief',
        'division' => 'PHP Backend',
        'age' => 21,
    ],
    [
        'id' => 'IT-004',
        'name' => 'Dayat',
        'division' => 'React Native',
        'age' => 21,
    ],
    [
        'id' => 'IT-017',
        'name' => 'Lutfi',
        'division' => 'ReactJS',
        'age' => 18,
    ],
];

function sort_array($students, $jenis)
{
    $urutan = [];

    foreach ($students as $key => $value) {
        $urutan[$students[$key][$jenis]] = $value;
    }
    ksort($urutan);

    foreach ($urutan as $key => $value) {
        $hasil[] = $value;
    }
    return $hasil;
}

function search_divisi($students, $jenis, $cari)
{
    $urutan = [];
    foreach ($students as $key => $value) {
        if ($value[$jenis] == $cari) {
            $urutan[] = $value;   # code...
        }
    }
    return $urutan;
}

function search_age($students, $jenis, $cari)
{
    $urutan = [];
    foreach ($students as $key => $value) {
        if ($value[$jenis] < $cari) {
            $urutan[] = $value;
        }
    }
    return count($urutan);
}

function rata2($students)
{
    $jumlah = 0;
    foreach ($students as $key => $value) {
        $jumlah += $value['age'];
    }
    return (int)($jumlah / count($students));
}

function palingmuda($students)
{
    $urutan = [];
    foreach ($students as $key => $value) {
        $urutan[$students[$key]['age']] = $value;
    }
    ksort($urutan);

    return $urutan[array_key_first($urutan)];
}

echo "||== DAFTAR SANTRI PER NOMOR INDUK ==|| <br><br>";

// print_r(sort_array($students, 'id'));
$sort = sort_array($students, 'id');
foreach($sort as $key => $value){
    echo "[$key]";
    foreach ($value as $k => $val) {
    echo " $k => $val ";
    }
    echo "<br>";
}

echo "<br>||== DAFTAR SANTRI PER NAMA ==|| <br><br>";

// print_r(sort_array($students, 'name'));
$sort = sort_array($students, 'name');
foreach($sort as $key => $value){
    echo "[$key]";
    foreach ($value as $k => $val) {
    echo " $k => $val ";
    }
    echo "<br>";
}

echo "<br>||== DAFTAR SANTRI BERDASARKAN DIVISION PHP BACKEND ==|| <br><br>";

// print_r(search_divisi($students, 'division', 'PHP Backend'));
$sort = search_divisi($students, 'division', 'PHP Backend');
foreach($sort as $key => $value){
    echo "[$key]";
    foreach ($value as $k => $val) {
    echo " $k => $val ";
    }
    echo "<br>";
}

echo "<br>||== JUMAH SANTRI UMUR SANTRI KURANG DARI 25 ==|| <br><br>";

echo "Ada " . search_age($students, 'age', '25') . " santri yang berumur kurang dari 25. <br><br>";

echo "||== RATA-RATA UMUR SANTRI ==|| <br><br>";

echo "Rata-rata umur santri " . rata2($students) . " <br><br>";

echo "||== SANTRI PALING MUDA ==|| <br><br>";

$santri = palingmuda($students);
echo "Santri paling muda adalah " . $santri['name'] . " dengan umur " . $santri['age'] . " tahun <br>";

