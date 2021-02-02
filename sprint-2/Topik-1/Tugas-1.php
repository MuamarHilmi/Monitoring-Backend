<?php

class Perpustakaan
{
    public $buku = array(
        array(
            "judul" => "Pemrogramman Dasar PHP",
            "isbn" => "BK001"
        ),
        array(
            "judul" => "Pemrogramman Dasar HTML dan CSS",
            "isbn" => "BK002"
        ),
        array(
            "judul" => "Pemrogramman Dasar JAVASCRIPT",
            "isbn" => "BK003"
        ),
        array(
            "judul" => "Pemrogramman Dasar JQUERY",
            "isbn" => "BK004"
        ),
        array(
            "judul" => "Dasar-Dasar Menjadi Programmer",
            "isbn" => "BK005"
        ),

    );
    private static $peminjaman = [];
    private $pengembalian;

    public function __construct()
    {

        echo "======================================================
||               Program Perpustakaan               ||
======================================================\n\n";
    }

    public function Pengembalian($judul, $nama, $usia)
    {
        $this->pengembalian = array(
            "nama" => $nama,
            "usia" => $usia,
            "judul" => $judul["judul"],
            "isbn" => $judul["isbn"]
        );

        return $this->pengembalian;
    }
    public static function peminjaman($judul, $nama, $usia)
    {

        self::$peminjaman = array(
            "nama" => $nama,
            "usia" => $usia,
            "judul" => $judul["judul"],
            "isbn" => $judul["isbn"]
        );

        return self::$peminjaman;
    }
}

class Pengunjung extends Perpustakaan
{
    public function Meminjam($judul, $nama, $usia)
    {
        $data_peminjaman = parent::peminjaman($judul, $nama, $usia);
        return $data_peminjaman;
    }
}

$perpustakaan = new Perpustakaan;
$pengunjung = new Pengunjung;
$data_buku = $perpustakaan->buku;

echo "Menu
-----
1. Meminjam Buku
2. Mengembalikan Buku\n
Pilih Menu: ";
$menu = trim(fgets(STDIN));
echo "\n";
if ($menu == 1) {
    echo "======================================================
||                  Peminjaman Buku                 ||
======================================================\n\n";
    echo "Judul Buku
------------\n";
    foreach ($data_buku as $key => $value) {
        echo $key + 1 . ". " . $value['judul'] . " (" . $value['isbn'] . ")\n";
    }
    echo "\nPilih judul buku: ";
    $n = trim(fgets(STDIN));
    $judul = array(
        "judul" => $data_buku[$n - 1]["judul"],
        "isbn" => $data_buku[$n - 1]["isbn"]
    );
    echo "Nama: ";
    $nama = trim(fgets(STDIN));
    echo "Usia: ";
    $usia = trim(fgets(STDIN));
    echo "\n\n";
    $data_meminjam = $pengunjung->Meminjam($judul, $nama, $usia);
    echo "======================================================
||               Data Peminjaman Buku               ||
||__________________________________________________||
                                                
    Nama Peminjam : " . $data_meminjam["nama"] . "                          
    Usia          : " . $data_meminjam["usia"] . "                               
    Buku Yang Dipinjam                               
    (" . $data_meminjam["isbn"] . ") " . $data_meminjam["judul"] . "                   
======================================================\n\n";
} else {
    echo "======================================================
||                 Pengembalian Buku                ||
======================================================\n\n";
    echo "Judul Buku
------------\n";
    foreach ($data_buku as $key => $value) {
        echo $key + 1 . ". " . $value['judul'] . " (" . $value['isbn'] . ")\n";
    }
    echo "\nPilih judul buku yang ingin dikembalikan: ";
    $n = trim(fgets(STDIN));
    $judul = array(
        "judul" => $data_buku[$n - 1]["judul"],
        "isbn" => $data_buku[$n - 1]["isbn"]
    );
    echo "Nama: ";
    $nama = trim(fgets(STDIN));
    echo "Usia: ";
    $usia = trim(fgets(STDIN));
    $data_pengembalian = $perpustakaan->Pengembalian($judul, $nama, $usia);
    echo "======================================================
||               Data Pengembalian Buku             ||
||__________________________________________________||
                                                
    Nama Peminjam : " . $data_pengembalian["nama"] . "                          
    Usia          : " . $data_pengembalian["usia"] . "                               
    Buku Yang Dikembalikan                               
    (" . $data_pengembalian["isbn"] . ") " . $data_pengembalian["judul"] . "                   
======================================================\n\n";
}
