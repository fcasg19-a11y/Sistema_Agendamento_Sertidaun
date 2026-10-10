<?php 
include '../config/database.php';
include '../classes/pedido.php';
include '../layout/layout.php';
layout::header("Status");
?>
<link rel="stylesheet" href="../css/certidao.css">

<div class="container-tabel-wrapper">
    <div class="card-tabel">
        <h1>Status Pedido</h1>
        <p class="text-muted">Digite seu codigo para ver status</p>

        <form method="GET" style="margin-bottom:20px;">
            <input type="text" name="codigo_pedido" placeholder="Ex: PED-20261007-A9C2F" required 
                   value="<?= htmlspecialchars($_GET['codigo_pedido'] ?? '') ?>" 
                   style="padding:10px; width:70%;">
            <button type="submit" style="padding:10px;">Verificar</button>
        </form>

        <?php
        function e($value) {
            return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
        }

        if (isset($_GET['codigo_pedido']) && !empty($_GET['codigo_pedido'])):
            $crudPedido = new CRUD_Pedido();
            $pedido = $crudPedido-> getPedidoById($_GET['codigo_pedido']);
        ?>

            <?php if ($pedido): ?>
            <table border="1" cellpadding="10" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama pemohon</th>
                        <th>Tujuan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= e($pedido['codigo_pedido']) ?></td>
                        <td><?= e($pedido['nome_requerente']) ?></td>
                        <td><?= e($pedido['finalidade']) ?></td>
                        <td><span style="padding:5px 10px; border-radius:5px; background:<?= $pedido['status']=='concluido'?'#d4edda':'#fff3cd' ?>"><?= e($pedido['status']) ?></span></td>
                    </tr>
                </tbody>
            </table>
            <?php else: ?>
                <p style="color:red;">Codigo <?= e($_GET['codigo_pedido']) ?> tidak ditemukan.</p>
            <?php endif; ?>

        <?php endif; ?>
    </div>
</div>
<?php Layout::footer(); ?>