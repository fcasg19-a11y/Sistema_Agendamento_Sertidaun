<?php
class Database{
    private $host = "localhost";
    private $db_name = "igreja_certidao";
    private $username = "root";
    private $password = "";
    public $conn;
    public function getConnection(){
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);

        if (!$this->conn) {
            die("Connection error: " . mysqli_connect_error());
        }

        return $this->conn;
    }
}
?>