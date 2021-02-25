<?php
class Insert extends Database
{
    public function tbh_kategori($kat)
    {
        try {
            $query = "INSERT INTO tb_kategori (kategori) value ('$kat')";
            $hasil = $this->execute($query);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function daftar($nama,$genre,$user,$pass)
    {
        try{
            $id = 1;
            while (true) {
                $cek = "SELECT id, username FROM tb_akun WHERE id=$id AND username='$user'";
                if(empty($this->read($cek))){
                    // echo "baru";
                    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
                    $query = "INSERT INTO tb_user values ($id, '$nama', '$genre');
                    INSERT INTO tb_akun values ($id, '$user', '$pass_hash', $id)";
                    $this->execute($query);
                    break;
                }else {
                    $id++;
                    echo $id;
                }
            }
        }catch(PDOException $e){
            echo "error: " . $e->getMessage();
        }
    }
    public function iArtikel($id,$judul,$kategori,$artikel,$filename,$tmpname,$tgl_post)
    {
        try {
            while (true) {
                $rand = rand();
                $file = $rand . "_" . $filename;
                $cek = "SELECT cover FROM tb_artikel WHERE cover='$file'";
                if(empty($this->read($cek))){
                    break;
                }
            }
            // echo $file;
            $query = "INSERT INTO tb_artikel (judul,artikel,tgl_post,cover,id_kategori,id_user) VALUE ('$judul','$artikel','$tgl_post','$file',$kategori,$id)";
            move_uploaded_file($tmpname, "../gambar/" . $file);
            $this->execute($query);
            // echo $query;
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }
    }
}

?>