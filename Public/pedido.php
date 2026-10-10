<?php

include '../config/database.php';
include '../classes/pedido.php';


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pedido = new CRUD_Pedido();
    $success = $pedido->createPedido(
        $_POST['paroquia_id'],
        $_POST['tipo_certidao_id'],
        $_POST['nome_requerente'],
        $_POST['whatsapp'],
        $_POST['finalidade'],
        $_POST['data_levantamento_desejada']
    );

    if ($success) {
        echo "<script>alert('Pedido enviado com sucesso! Codigo: {$success}'); window.location.href='pedido.php';</script>";
        exit;
    } else {
        echo "<script>alert('Erro ao enviar pedido.');</script>";
    }
}

include '../layout/layout.php';
Layout::header("Pedido");
?>
<link rel="stylesheet" href="../css/certidao.css">

<div class="container-certidao-wrapper">
    <div class="card-certidao">
        <h1>Solicitar Certidão</h1>
        <p class="text-muted">Preencha o formulário abaixo.</p>
        
        <form action="pedido.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label class="form-label">Paróquia:</label>
                <select name="paroquia_id" class="form-select" required>
                    <option value="">Selecione a Paróquia</option>
                    <?php
                    $conn = (new Database())->getConnection();
                    $result = mysqli_query($conn, "SELECT id, nome_paroquia FROM paroquias");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id']}'>{$row['nome_paroquia']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo de Certidão:</label>
                <select name="tipo_certidao_id" class="form-select" required>
                    <option value="">Selecione o Tipo</option>
                    <?php
                    $result = mysqli_query($conn, "SELECT id, nome FROM tipos_certidao");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nome do Requerente:</label>
                <input type="text" name="nome_requerente" class="form-control" required>
            </div>
         

            <div class="mb-3">
                <label class="form-label">Número de WhatsApp:</label>
                <input type="text" name="whatsapp" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Finalidade:</label>
                <input type="text" name="finalidade" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Levantamento Desejada:</label>
                <input type="date" name="data_levantamento_desejada" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Enviar Pedido</button>
        </form>
    </div>
</div>
<?php Layout::footer();
 ?>