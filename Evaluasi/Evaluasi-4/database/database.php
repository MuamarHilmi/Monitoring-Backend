<?php
class Database
{
    private $conn;
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql: host=localhost;dbname=evaluasi", "ilahana", "h4n4081358942678");
        } catch (PDOException $e) {
            echo "Error Koneksi: " . $e->getMessage();
        }
    }
    public function readAll($query)
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function read($query)
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function execute($query)
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
}
include('insert.php');
include('read.php');
// $data = new Database;
// print_r($data->read("select * from tb_akun where username='ilahana'"));
