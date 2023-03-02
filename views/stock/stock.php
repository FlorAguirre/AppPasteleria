<?php
    require "../template/header.php";
?>

<main class="container">
    <h1 class="text-center">Stock de Productos</h1>
    <br>
    <br>
    <a href="<?= BASE_URL ?>views/stock/crear-stock.php" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i>  Registrar Producto</a>
    <br>
    <br>
    <br>
    <table id="tblStock" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre del producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Medida</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody id="tblBodyStock">
            <!--
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Mark@Mark.com</td>
                <td>36851708</td>
                <td>8043669642</td>
                <td>Sarmiento 1082</td>
                <td>General Rodríguez</td>
                <td>1748</td>
                <td>
                    <a href="<?= BASE_URL ?>views/persona/editar-persona.php?p=1" class="btn btn-outline-primary btn-sm" title="Editar Registro"><i
                            class="fa-solid fa-user-pen"></i></a>
                    <button class="btn btn-outline-danger btn-sm" title="Eliminar Registro" onclick="fntDelPersona(1)" ><i
                            class="fa-solid fa-trash-can"></i></button></td>
            </tr>
-->
        </tbody>
    </table>
</main>

<?php
    require "../template/footer.php";
?>

<script src="../template/js/functions-stock.js"></script>