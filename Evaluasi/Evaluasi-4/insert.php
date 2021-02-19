<?php
include('database.php');
class Insert extends Database
{
    public function daftar($user, $pass, $nama)
    {
        $id = 1;
        while (true) {
            $id_akun = "SELECT id_akun FROM tb_akun where id_akun=$id";
            $data_id = $this->read($id_akun);
            // print_r($data_id);
            if (empty($data_id)) {
                $data_id=$id;
                break;
            } else {
                $id++;
            }
        }
        $query= "INSERT INTO tb_akun (id_akun, username, password) value ($data_id, '$user', '$pass');";
        $query .= "INSERT INTO tb_user (id_user, id_akun, nama) value($id, $id, '$nama')";
        $this->execute($query);
        // print_r($data_id);
    }
}

?>