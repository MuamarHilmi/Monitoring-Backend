<?php

class Siswa
{
    static $menu;
    static $Santri;
    static $confrim;
    public function __construct()
    {
        echo "==============================\n";
        echo "||    PENDAFTARAN SANTRI    ||\n";
        echo "==============================\n";
        echo "\nMenu\n";
        echo "------\n";
        echo "1. Tambah Data Santri\n";
        echo "2. Ubah Data Santri\n";
        echo "3. Hapus Data Santri\n";
        echo "4. Lihat Data Santri\n";

        echo "\nPilih Menu:";
        self::$menu = trim(fgets(STDIN));
        // echo self::$menu;
        switch (self::$menu) {
            case 1:
                self::Tambah();
                break;

            case 2:
                self::Ubah();
                break;

            case 3:
                self::Hapus();
                break;

            case 4:
                self::Lihat();
                break;

            default:
                echo "\nMENU TIDAK DITEMUKAN\n\n";
                new Siswa;
                break;
        }
    }

    public static function Tambah()
    {
        echo "\n|| Menambah Data Santri ||\n";
        echo "\nJumlah Data yang Ditambah: ";
        $n = trim(fgets(STDIN));
        for ($i = 0; $i < $n; $i++) {
            echo "Nama: ";
            $nama = trim(fgets(STDIN));
            echo "Nik: ";
            $nik = trim(fgets(STDIN));
            echo "Asal: ";
            $asal = trim(fgets(STDIN));
            echo "\n";
            self::$Santri[] = array(
                'nama' => $nama,
                'nik' => $nik,
                'asal' => $asal,
            );
        }
        self::Lihat();
    }

    public static function Ubah()
    {
        if (empty(self::$Santri)) {
            echo "ERROR: Tidak dapat melakukan perubahan karna tidak ada data santri!";
            echo "\nTambah Santri? (y/n)";
            self::$confrim = trim(fgets(STDIN));
            (self::$confrim == 'n') ? die : self::Tambah();
        } else {
            echo "\n|| Ubah Data Santri ||\n";
            echo "\n|-> Data Santri\n\n";
            $i = 1;
            foreach (self::$Santri as $key => $value) {
                echo $i . ". (NIK: " . $value['nik'] . ") " . $value['nama'] . " dari " . $value['asal'] . "\n";
                $i++;
            }
            echo "\nPilih santri: ";
            $pilih = trim(fgets(STDIN));
            echo "\n1. Nama: " . self::$Santri[$pilih - 1]['nama'] . "\n";
            echo "2. NIK: " . self::$Santri[$pilih - 1]['nik'] . "\n";
            echo "3. Asal: " . self::$Santri[$pilih - 1]['asal'] . "\n";
            echo "\nPilih yang mau dirubah: ";
            $ubah = trim(fgets(STDIN));
            switch ($ubah) {
                case 1:
                    echo "\nNama baru: ";
                    $nm_baru = trim(fgets(STDIN));
                    self::$Santri[$pilih - 1]['nama'] = $nm_baru;
                    break;
                case 2:
                    echo "\nNIK baru: ";
                    $nik_baru = trim(fgets(STDIN));
                    self::$Santri[$pilih - 1]['nik'] = $nik_baru;
                    break;
                case 3:
                    echo "\nAsal baru: ";
                    $asl_baru = trim(fgets(STDIN));
                    self::$Santri[$pilih - 1]['asal'] = $asl_baru;
                    break;

                default:
                    echo "\nMENU TIDAK DIEMUKAN!\n\n";
                    Siswa::Ubah();
                    break;
            }
            // print_r(self::$Santri);
            self::Lihat();
        }
    }

    public static function Hapus()
    {
        if (empty(self::$Santri)) {
            echo "ERROR: Tidak dapat melakukan perubahan karna tidak ada data santri!";
            echo "\nTambah Santri? (y/n)";
            self::$confrim = trim(fgets(STDIN));
            (self::$confrim == 'n') ? die : self::Tambah();
        } else {
            echo "\n|| Hapus Data Santri ||\n";
            echo "\n|-> Data Santri\n\n";
            $i = 1;
            foreach (self::$Santri as $key => $value) {
                echo $i . ". (NIK: " . $value['nik'] . ") " . $value['nama'] . " dari " . $value['asal'] . "\n";
                $i++;
            }
            echo "\nPilih santri: ";
            $pilih = trim(fgets(STDIN));
            unset(self::$Santri[$pilih - 1]);

            self::Lihat();
        }
    }

    public static function Lihat()
    {
        echo "\n|| Data Santri ||\n\n";
        $i = 1;
        foreach (self::$Santri as $key => $value) {
            echo $i . " (NIK: " . $value['nik'] . ") " . $value['nama'] . " dari " . $value['asal'] . "\n";
        }
        echo "\nKembali menu awal? (y/n)";
        self::$confrim = trim(fgets(STDIN));
        if (self::$confrim == 'n') {
            die;
        } else {
            new Siswa;
        }
    }
}

$siswa = new Siswa;
