<?php
    require "../template/header.php";
?>

<main class="container">
    <h1 class="text-center">Lista de Clientes</h1>
    <br>
    <br>
    <a href="./persona/crear-persona.php" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i>  Registrar Cliente</a>
    <br>
    <br>
    <br>
    <table id="tblPersonas" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">DNI</th>
                <th scope="col">Telefono</th>
                <th scope="col">Calle</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Código Postal</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody id="tblBodyPersonas">
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

<script src="../template/js/functions-persona.js"></script>