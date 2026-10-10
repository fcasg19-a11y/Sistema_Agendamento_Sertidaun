<?php
require_once '../config/database.php';

class CRUD_Pedido
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function createPedido($paroquia_id, $tipo_certidao_id, $nome_requerente, $whatsapp, $finalidade, $data_levantamento_desejada = null)
    {
        // Bikin kode otomatis disini, jadi tidak perlu input user
        $codigo_pedido = 'PED-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -5));

        $stmt = $this->conn->prepare(
            'INSERT INTO pedidos (codigo_pedido, paroquia_id, tipo_certidao_id, nome_requerente, whatsapp, finalidade, data_levantamento_desejada) VALUES (?, ?, ?, ?, ?, ?, ?)'
        );
        // s = string, i = int -> urutan: s,i,i,s,s,s,s
        $stmt->bind_param('siissss', $codigo_pedido, $paroquia_id, $tipo_certidao_id, $nome_requerente, $whatsapp, $finalidade, $data_levantamento_desejada);

        if ($stmt->execute()) {
            return $codigo_pedido; 
        } else {
            return false;
        }
    }
    
    public function getPedidos()
    {
        $result = mysqli_query($this->conn, 'SELECT * FROM pedidos');
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getPedidoById($codigo_pedido)
    {
        $stmt = $this->conn->prepare('SELECT * FROM pedidos WHERE codigo_pedido = ?');
        $stmt->bind_param('s', $codigo_pedido);
        $stmt->execute();

        return mysqli_fetch_assoc($stmt->get_result());
    }



    public function updatePedido(
        $codigo_pedido,
        $paroquia_id,
        $tipo_certidao_id,
        $nome_requerente,
        $whatsapp,
        $finalidade,
        $data_levantamento_desejada,
        $status,
        $observacao_admin
    ) {
        $stmt = $this->conn->prepare(
            'UPDATE pedidos
             SET paroquia_id = ?, tipo_certidao_id = ?, nome_requerente = ?, whatsapp = ?,
                 finalidade = ?, data_levantamento_desejada = ?, status = ?, observacao_admin = ?
             WHERE codigo_pedido = ?'
        );
        $stmt->bind_param(
            'iissssssi',
            $paroquia_id,
            $tipo_certidao_id,
            $nome_requerente,
            $whatsapp,
            $finalidade,
            $data_levantamento_desejada,
            $status,
            $observacao_admin,
            $codigo_pedido
        );

        return $stmt->execute();
    }

    public function deletePedido($codigo_pedido)
    {
        $stmt = $this->conn->prepare('DELETE FROM pedidos WHERE codigo_pedido = ?');
        $stmt->bind_param('i', $codigo_pedido);

        return $stmt->execute() && $stmt->affected_rows > 0;
    }

   
}
?>
