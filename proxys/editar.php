<?php include '../templates/header.php';

include '../conexion.php';

if(isset($_GET['txtid'])) {

    $txtid = $_GET['txtid'];
    $sentencia = $conexion->prepare("SELECT * FROM proxy WHERE id = ?");
    $resultado = $sentencia->execute([$txtid]);
    $proxy = $sentencia->get_result()->fetch_all(MYSQLI_ASSOC);
}

if ($_POST) {
    $txtid = $_POST['txtid'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sentencia = $conexion->prepare("UPDATE proxy SET name = ?, image = ?, description = ?, price = ? WHERE id = ?");
    $resultado = $sentencia->execute([$name, $image, $description, $price, $txtid]);

    if ($resultado === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error al actualizar el proxy: " . mysqli_error($conexion);
    }
}
?>



<div class="card">
    <div class="card-header">
        <h3>Editar Proxy</h3>
    </div>
    <div class="card-body">
        <form action="editar.php" enctype="multipart/form-data" method="POST">
            <div class="mb-3">
                <label for="txtid" class="form-label">ID:</label>
                <input type="text" class="form-control" value="<?php echo $_GET["txtid"]?>" name="txtid" id="txtid" aria-describedby="helpId">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $proxy[0]['name']?>" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen</label>
                <input type="text" class="form-control" id="image" name="image" value="<?php echo $proxy[0]['image']?>" aria-describedby="helpId" placeholder="Imagen">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="description" name="description" value="<?php echo $proxy[0]['description']?>" aria-describedby="helpId" placeholder="Descripción">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $proxy[0]['price']?>" aria-describedby="helpId" placeholder="Precio">
            </div>

            <button type="submit" class="btn btn-success" >Crear</button>
            <a type="button" class="btn btn-danger" href="index.php">Cancelar</a>

    </div>
</div>

<?php include '../templates/footer.php'; ?>
