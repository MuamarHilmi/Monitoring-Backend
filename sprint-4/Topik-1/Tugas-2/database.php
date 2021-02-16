<?php
class Database
{
    private $conn;
    private $stmt;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=barang;port=3306", 'ilahana', 'h4n4081358942678');
        } catch (PDOException $e) {
            echo "Malasah Connection: " . $e->getMessage() . "<br> Baris: " . $e->getLine();
        }
    }
    public function insert($nama, $harga)
    {
        try {

            $query = "INSERT INTO tb_barang (nama, harga) VALUE ('$nama', '$harga')";
            // echo $query;
            $this->stmt = $this->conn->prepare($query);
            $this->stmt->execute();

        } catch (PDOException $e) {
            echo "Masalah Insert: " . $e->getMessage();
            echo "<br> Baris: " . $e->getLine();
        }
    }
    public function readAll()
    {
        try {

            $query = "SELECT * FROM tb_barang";
            $this->stmt = $this->conn->prepare($query);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Masalah Read All: " . $e->getMessage();
            echo "<br> Baris: " . $e->getLine();
        }
    }
    public function readId($id)
    {
        try {

            $query = "SELECT * FROM tb_barang WHERE id=$id";
            $this->stmt = $this->conn->prepare($query);
            $this->stmt->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Masalah Read All: " . $e->getMessage();
            echo "<br> Baris: " . $e->getLine();
        }
    }
    public function update($nama, $harga, $id)
    {
        try {

            $query = "UPDATE tb_barang SET nama='$nama', harga='$harga' WHERE id=$id";
            // echo $query;
            $this->stmt = $this->conn->prepare($query);
            $this->stmt->execute();

        } catch (PDOException $e) {
            echo "Masalah Delete: " . $e->getMessage();
            echo "<br> Baris: " . $e->getLine();
        }
    }
    public function delete($id)
    {
        try {

            $query = "DELETE FROM tb_barang WHERE id=$id";
            // echo $query;
            $this->stmt = $this->conn->prepare($query);
            $this->stmt->execute();

        } catch (PDOException $e) {
            echo "Masalah Delete: " . $e->getMessage();
            echo "<br> Baris: " . $e->getLine();
        }
    }
}
