<?php
class Read extends Database
{
    public function login($user, $pass)
    {
        $query = "SELECT * FROM tb_akun a, tb_user b WHERE a.id_akun=b.id_akun AND a.username='$user' AND a.password='$pass'";
        $hasil = $this->conn->read($query);
        if (empty($hasil)) {
            echo "<script>alert('Akun Tidak Ditemukan! \nPeriksa kembali username dan password')</script>";
        }else {
            return $hasil;
        }
    }
}
