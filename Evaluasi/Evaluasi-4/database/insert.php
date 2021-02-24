<?php
class Insert extends Database
{
    public function daftar($user, $pass, $nama)
    {
        try {
            $id = 1;
            while (true) {
                $id_akun = "SELECT id_akun FROM tb_akun where id_akun=$id";
                $data_id = $this->read($id_akun);
                // print_r($data_id);
                if (empty($data_id)) {
                    $data_id = $id;
                    break;
                } else {
                    $id++;
                }
            }
            $query = "INSERT INTO tb_akun (id_akun, username, password) value ($data_id, '$user', '$pass');";
            $query .= "INSERT INTO tb_user (id_user, id_akun, nama) value($id, $id, '$nama')";
            $this->execute($query);
        } catch (PDOException $e) {
            echo "Error daftar: " . $e->getMessage();
        }
        // print_r($data_id);
    }
    public function tambah($nama,$divisi,$asal)
    {
        try {
            $query = "INSERT INTO dt_santri (nama,divisi,asal) VALUE ('$nama','$divisi','$asal')";
            $this->execute($query);
        } catch (PDOException $e) {
            echo "Error tambah: ". $e->getMessage();
        }
    }
}
