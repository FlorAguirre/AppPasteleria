<?php
    require "../template/header.php";
?>

<main class="container">
    <h1 class="text-center">Registrar Cliente</h1>
    <br>
    <br>
    <a href="<?= BASE_URL ?>views/stock/stock.php">Lista Stock</a>
    <br>
    <br>
    <br>
    <form id="frmRestroStock">
        <div class="mb-3">
            <label for="txtNombreStock" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="txtNombreStock" name="txtNombreStock" placeholder="Nombre de la materia prima" required >
        </div>
        <div class="mb-3">
            <label for="txtCantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="txtCantidad" name="txtCantidad" placeholder="Cantidad" required >
        </div>
        <div class="mb-3">
            <label for="txtMedida" class="form-label">Medida</label>
            <input type="text" class="form-control" id="txtMedida" name="txtMedida" placeholder="Medida" required >
        </div>
        
        <button type="submit" class="btn btn-info"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
    </form>

</main>

<?php
    require "../template/footer.php";
?>

<script src="../template/js/functions-stock.js"></script>