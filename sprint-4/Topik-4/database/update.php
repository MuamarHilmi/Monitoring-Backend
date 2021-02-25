<?php
class Update extends Database
{
    public function uArtikel($judul,$kategori,$artikel,$tgl_post,$id_artikel)
    {
        $query = "UPDATE tb_artikel SET judul='$judul', artikel='$artikel', tgl_post='$tgl_post', id_kategori=$kategori WHERE id_artikel=$id_artikel";
        $this->execute($query);
    }
    public function uArtikelImg($judul,$kategori,$artikel,$tgl_post,$id_artikel,$cover,$filename,$tmpname)
    {
        if (file_exists("../gambar/$cover")) {
            // echo "file ada.";
            unlink("../gambar/$cover");
        }
        while (true) {
            $rand = rand();
            $file = $rand . "_" . $filename;
            $cek = "SELECT cover FROM tb_artikel WHERE cover='$file'";
            if(empty($this->read($cek))){
                break;
            }
        }
        move_uploaded_file($tmpname, "../gambar/" . $file);
        $query = "UPDATE tb_artikel SET judul='$judul', artikel='$artikel', tgl_post='$tgl_post', id_kategori=$kategori, cover='$file' WHERE id_artikel=$id_artikel";
        $this->execute($query);
    }
}


?>