<?php
class Read extends Database
{
    public function rKategori()
    {
        try {
            $query = "SELECT * FROM tb_kategori";
            $hasil = $this->readAll($query);
            return $hasil;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function login($user, $pass)
    {
        try {
            $cek = "SELECT * FROM tb_akun JOIN tb_user on tb_akun.id_user=tb_user.id_user WHERE tb_akun.username='$user'";
            $hasil = $this->read($cek);
            if (empty($hasil)) {
                return "null";
            }
            elseif (password_verify($pass, $hasil['password'])) {
                return $hasil;
            }else {
                return "error";
            }
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }
    }
    public function rArtikel()
    {
        try {
            $query = "SELECT * FROM tb_artikel A JOIN tb_user B ON A.id_user=B.id_user JOIN tb_kategori C ON A.id_kategori=C.id_kategori ORDER BY tgl_post, id_artikel DESC";
            return $this->readAll($query);
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }
    }
    public function rArtikelId($id)
    {
        try {
            $query = "SELECT * FROM tb_artikel A JOIN tb_user B ON A.id_user=B.id_user JOIN tb_kategori C ON A.id_kategori=C.id_kategori WHERE id_artikel=$id";
            return $this->read($query);
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }
    }
    public function rArtikelKat($id)
    {
        try {
            $query = "SELECT * FROM tb_artikel A JOIN tb_user B ON A.id_user=B.id_user JOIN tb_kategori C ON A.id_kategori=C.id_kategori WHERE C.id_kategori=$id";
            return $this->readAll($query);
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }
    }
}

?>