<?php
require_once '../config/database.php';

class CRUD_Add
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    public function Table(){
        $sql = "
            SELECT 
                pe.codigo_pedido, 
                pe.nome_requerente, 
                pe.whatsapp, 
                ti.nome AS nome_tipo, 
                pa.nome_paroquia,
                pe.status
            FROM pedidos pe 
            INNER JOIN tipos_certidao ti ON pe.tipo_certidao_id = ti.id 
            INNER JOIN paroquias pa ON pe.paroquia_id = pa.id
        ";

        $result = $this->conn->query($sql);
        return $result; 

    }
}
?>