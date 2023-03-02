<?php
    require "../template/header.php";
?>

<main class="container">
    <h1 class="text-center">Editar Stock</h1>
    <br>
    <br>
    <a href="<?= BASE_URL ?>views/stock/stock.php">Lista Stock</a>
    <br>
    <br>
    <br>
    <form id="frmEditarStock">
        <input type="hidden" id="txtId" name="txtId" required>
        <div class="mb-3">
            <label for="txtNombreProducto" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="txtNombreProducto" name="txtNombreProducto" placeholder="Nombre del producto" required >
        </div>
        <div class="mb-3">
            <label for="txtCantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="txtCantidad" name="txtCantidad" placeholder="Cantidad" required >
        </div>
        <div class="mb-3">
            <label for="txtMedida" class="form-label">Medida</label>
            <input type="text" class="form-control" id="txtMedida" name="txtMedida" placeholder="Medida" required >
        </div>
        
        <button type="submit" class="btn btn-info"><i class="fa-sharp fa-regular fa-pen-to-square"></i> Actualizar</button>
    </form>

</main>

<?php
    require "../template/footer.php";
?>


<script src="../template/js/functions-stock.js"></script>
<script>
    let id = "<?= $_GET['p']?>";
    fntMostrar(id);
</script>