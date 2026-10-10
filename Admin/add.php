<?php
include '../layout/layout.php';
include '../classes/admin.php';
layout::header("Admin");
?>
<link rel="stylesheet" href="../css/table.css">
<table  class="table table-bordered table-striped" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>WhatsApp</th>
            <th>Tipo_Certidão</th>
            <th>Paróquia</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $crudAdd = new CRUD_Add();
        $result = $crudAdd->Table();

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['codigo_pedido']}</td>";
            echo "<td>{$row['nome_requerente']}</td>";
            echo "<td>{$row['whatsapp']}</td>";
            echo "<td>{$row['nome_tipo']}</td>";
            echo "<td>{$row['nome_paroquia']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td><a href='editar.php?codigo_pedido={$row['codigo_pedido']}'>Editar</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<?php
layout::footer();
?>