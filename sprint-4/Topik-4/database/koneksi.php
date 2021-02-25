<?php
class Database
{
    protected $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql: host=localhost;dbname=db_pondokit", "ilahana", "h4n4081358942678");
        } catch (PDOException $e) {
            echo "Error Koneksi: " . $e->getMessage();
        }
    }

    public function readAll($query)
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error ReadAll: " . $e->getMessage();
        }
    }
    public function read($query)
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error Read: " . $e->getMessage();
        }
    }
    public function execute($query)
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error Execute: " . $e->getMessage();
        }
    }
}
include('insert.php');
include('read.php');
include('update.php');