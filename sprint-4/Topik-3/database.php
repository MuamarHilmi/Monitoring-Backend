<?php
class Database{
    private $koneksi;
    public function __construct()
    {
        try {
            $this->koneksi = new PDO("mysql: host=localhost; dbname=db_pondokit", "ilahana","h4n4081358942678");
        } catch (PDOException $e) {
            echo "Error Koneksi: " . $e->getMessage();
        }
    }
    public function cekLogin($username, $password)
    {
        try {
            $query = "SELECT * FROM tb_akun WHERE username='$username'";
            $hasil = $this->koneksi->prepare($query);
            $hasil->execute();
            $file = $hasil->fetch(PDO::FETCH_ASSOC);
            // $cek = ($file['password']==$password) ? true : false ;
            if ($file['password']==$password) {
                $cek = [
                    "status" => "success",
                    "name" => $file['username']
                ];
            } else {
                $cek = [
                    "status" => "error",
                    "pesan" => "Username Password Salah!"
                ];
            }
            
            return $cek;
        } catch (PDOException $e) {
            echo "Error CekLogin: " . $e->getMessage();
        }
    }
}

?>