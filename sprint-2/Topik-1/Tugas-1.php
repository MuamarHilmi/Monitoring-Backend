<?php

class Perpustakaan
{
    public static $buku = array(
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
    public static $peminjaman = [];
    private static $pengembalian;

    public static function Pengembalian($judul, $nama, $usia)
    {
        self::$pengembalian = array(
            "nama" => $nama,
            "usia" => $usia,
            "judul" => $judul["judul"],
            "isbn" => $judul["isbn"]
        );
        self::$buku[] = self::$pengembalian;
        $urutan = [];
        $file = self::$buku;
        foreach ($file as $key => $value) {
            $urutan[$file[$key]["isbn"]] = $value;
        }
        ksort($urutan);

        foreach ($urutan as $key => $value) {
            $hasil[] = $value;
        }
        self::$buku = $hasil;
        // $sisa=null;
        foreach (self::$peminjaman as $key => $value) {
            if ($value['isbn']==self::$pengembalian['isbn']) {
                unset(self::$peminjaman[$key]);
            } else {
                $sisa[] = $value;
            }
            self::$peminjaman = $sisa;
        }
        return self::$pengembalian;
    }
    public static function peminjaman($judul, $nama, $usia)
    {

        self::$peminjaman[] = array(
            "nama" => $nama,
            "usia" => $usia,
            "judul" => $judul["judul"],
            "isbn" => $judul["isbn"]
        );

        foreach (self::$buku as $key => $value) {
            if (in_array($value['isbn'], array_column(self::$peminjaman, 'isbn'))) {
                unset(self::$buku[$key]);
            } else {
                $hasil[] = $value;
            }
            self::$buku = $hasil;
        }
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

// $perpustakaan = new Perpustakaan;
$pengunjung = new Pengunjung;
// $data_buku = $perpustakaan->buku;

echo "======================================================
||               Program Perpustakaan               ||
======================================================\n";


echo "\nMenu
-----
1. Meminjam Buku
2. Mengembalikan Buku\n
Pilih Menu: ";
$menu = trim(fgets(STDIN));
echo "\n";

while (true) {
    if ($menu == 1) {
        echo "======================================================
||                  Peminjaman Buku                 ||
======================================================\n\n";


        echo "Judul Buku
------------\n";


        //PEMINJAMAN BUKU
        while (true) {
            //DAFTAR BUKU
            foreach (Perpustakaan::$buku as $key => $value) {
                echo $key + 1 . ". " . $value['judul'] . " (" . $value['isbn'] . ")\n";
            }
            //DAFTAR BUKU

            echo "\nPilih judul buku: ";
            $n = trim(fgets(STDIN));
            $judul = array(
                "judul" => Perpustakaan::$buku[$n - 1]["judul"],
                "isbn" => Perpustakaan::$buku[$n - 1]["isbn"]
            );
            echo "Nama: ";
            $nama = trim(fgets(STDIN));
            echo "Usia: ";
            $usia = trim(fgets(STDIN));
            echo "\n\n";
            $data_meminjam = $pengunjung->Meminjam($judul, $nama, $usia);
            // print_r($data_meminjam);
            echo "======================================================
||               Data Peminjaman Buku               ||
||__________________________________________________||
                                                
    Nama Peminjam : " . $data_meminjam[0]["nama"] . "                          
    Usia          : " . $data_meminjam[0]["usia"] . "                               
    Buku Yang Dipinjam
    ";
            foreach ($data_meminjam as $key => $value) {
                echo "(" . $value["isbn"] . ") " . $value["judul"] . "
    ";
            }
            echo "

    Sisa Buku
    ";
            // print_r(Perpustakaan::$buku);
            foreach (Perpustakaan::$buku as $key => $value) {
                echo $key + 1 . ". " . $value['judul'] . " (" . $value['isbn'] . ")
    ";
            }
            echo "
======================================================\n\n";
            echo "Pinjam lagi? (y/n)";
            $pinjam_lagi = trim(fgets(STDIN));
            if ($pinjam_lagi == "n") {
                break;
            }
        }
        //PEMINJAMAN BUKU


    } else {
        if (empty(Perpustakaan::$peminjaman)) {
            echo "Tidak ada riwayat peminjaman. \n";
            echo "Lakukan peminjaman? (y/n)";
            $pinjam = trim(fgets(STDIN));
            if ($pinjam == "n") {
                die;
            } else {
                $menu = 1;
            }
        } else {

            echo "======================================================
||                 Pengembalian Buku                ||
======================================================\n\n";
            echo "Judul Buku
------------\n";

            foreach (Perpustakaan::$peminjaman as $key => $value) {
                echo $key + 1 . ". " . $value['judul'] . " (" . $value['isbn'] . ")\n";
            }
            echo "\nPilih judul buku yang ingin dikembalikan: ";
            $n = trim(fgets(STDIN));
            $judul = array(
                "judul" => Perpustakaan::$peminjaman[$n - 1]["judul"],
                "isbn" => Perpustakaan::$peminjaman[$n - 1]["isbn"]
            );
            echo "Nama: ";
            $nama = trim(fgets(STDIN));
            echo "Usia: ";
            $usia = trim(fgets(STDIN));
            $data_pengembalian = Perpustakaan::Pengembalian($judul, $nama, $usia);
            // print_r($data_pengembalian);
            echo "======================================================
||               Data Pengembalian Buku             ||
||__________________________________________________||
                                                
    Nama Peminjam : " . $data_pengembalian["nama"] . "                          
    Usia          : " . $data_pengembalian["usia"] . "                               
    Buku Yang Dikembalikan                               
    (" . $data_pengembalian["isbn"] . ") " . $data_pengembalian["judul"] . "
    ";                   

    echo "

    Sisa Buku
    ";
            // print_r(Perpustakaan::$buku);
            foreach (Perpustakaan::$buku as $key => $value) {
                echo $key + 1 . ". " . $value['judul'] . " (" . $value['isbn'] . ")
    ";
            }
            echo "
======================================================\n\n";
        }
    }
    // print_r(Perpustakaan::$peminjaman);
    if (!empty(Perpustakaan::$peminjaman)) {
        echo "\nIngin mengembalikan buku? (y/n)";
        $mengembalikan = trim(fgets(STDIN));
        if ($mengembalikan == "n") {
            die;
        } else {
            $menu = 2;
        }
    }
}
