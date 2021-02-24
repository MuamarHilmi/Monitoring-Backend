<?php
class Read extends Database
{
    public function login($user,$pass)
    {
        try {
            $sql = "SELECT * FROM tb_akun a, tb_user b WHERE a.id_akun=b.id_akun and a.username='$user' and a.password='$pass'";
            $data = $this->read($sql);
            // print_r($data);
            return $data;
        } catch (PDOException $e) {
            echo "Error login: " . $e->getMessage();
        }
    }
    public function dt_santri()
    {
        try {
            $sql = "SELECT * FROM dt_santri";
            $data = $this->readAll($sql);
            // print_r($data);
            return $data;
        } catch (PDOException $e) {
            echo "Error dt_santri: " . $e->getMessage();
        }
    }
}

// $read = new Read;
// $read->login('ilahana','123');
