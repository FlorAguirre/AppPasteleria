<?php
    require "../template/header.php";
?>

<main class="container">
    <h1 class="text-center">Registrar Cliente</h1>
    <br>
    <br>
    <a href="<?= BASE_URL ?>views/persona/index.php">Lista Clientes</a>
    <br>
    <br>
    <br>
    <form id="frmRestro">
        <div class="mb-3">
            <label for="txtNombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombres" required >
        </div>
        <div class="mb-3">
            <label for="txtApellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="txtApellido" name="txtApellido" placeholder="Apellidos" required >
        </div>
        <div class="mb-3">
            <label for="txtEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Correo electrónico" required >
        </div>
        <div class="mb-3">
            <label for="txtDNI" class="form-label">DNI</label>
            <input type="text" class="form-control" id="txtDNI" name="txtDNI" placeholder="DNI" required >
        </div>
        <div class="mb-3">
            <label for="txtTelefono" class="form-label">Telefono</label>
            <input type="number" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Telefono" required >
        </div>
        <div class="mb-3">
            <label for="txtCalle" class="form-label">Calle</label>
            <input type="text" class="form-control" id="txtCalle" name="txtCalle" placeholder="Dirrección" required >
        </div>
        <div class="mb-3">
            <label for="txtCiudad" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="txtCiudad" name="txtCiudad" placeholder="Ciudad" required >
        </div>
        <div class="mb-3">
            <label for="txtCP" class="form-label">Código Postal</label>
            <input type="text" class="form-control" id="txtCP" name="txtCP" placeholder="Código Postal" required >
        </div>
        
        
        <button type="submit" class="btn btn-info"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
    </form>

</main>

<?php
    require "../template/footer.php";
?>

<script src="../template/js/functions-persona.js"></script>