<?php

include '../conexion.php';

if ($_POST) {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO proxy (name, image, description, price) VALUES ('$name', '$image', '$description', '$price')";
    $query = mysqli_query($conexion, $sql);

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Error al crear el proxy: " . mysqli_error($conexion);
    }
}


    include '../templates/header.php';
?>

<div class="card">
    <div class="card-header">
        <h3>Crear Proxy</h3>
    </div>
    <div class="card-body">
        <form action="crear.php" enctype="multipart/form-data" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen</label>
                <input type="text" class="form-control" id="image" name="image" aria-describedby="helpId" placeholder="Imagen">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="description" name="description" aria-describedby="helpId" placeholder="Descripción">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="text" class="form-control" id="price" name="price" aria-describedby="helpId" placeholder="Precio">
            </div>

            <button type="submit" class="btn btn-success" >Crear</button>
            <a type="button" class="btn btn-danger" href="index.php">Cancelar</a>

    </div>
</div>

<?php
include '../templates/footer.php';
?>