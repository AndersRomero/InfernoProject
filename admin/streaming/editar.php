<?php
include '../../templates/header.php';
include '../../conexion.php';

if (isset($_GET['txtid'])) {
    $txtid = $_GET['txtid'];
    $sentencia = $conexion->prepare("SELECT * FROM streaming WHERE id = ?");
    $resultado = $sentencia->execute([$txtid]);
    $streaming = $sentencia->get_result()->fetch_all(MYSQLI_ASSOC);
}

if ($_POST) {
    $txtid = $_POST['txtid'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $newImage = $_FILES['image'];

    $oldImagePath = $streaming[0]['image'];

    if (empty($name) || empty($description) || empty($price)) {
        echo "Todos los campos son obligatorios.";
    } elseif (!is_numeric($price) || $price < 0) {
        echo "El precio debe ser un número positivo.";
    } else {
        if (!empty($newImage['name'])) {
            $target_dir = "uploadsstreaming/";
            $target_file = $target_dir . basename($newImage["name"]);

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0755, true);
            }

            if (!empty($oldImagePath) && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            if (move_uploaded_file($newImage["tmp_name"], $target_file)) {
                $sentencia = $conexion->prepare("UPDATE streaming SET name = ?, image = ?, description = ?, price = ? WHERE id = ?");
                $resultado = $sentencia->execute([$name, $target_file, $description, $price, $txtid]);
            } else {
                echo "Hubo un error al subir tu nueva imagen.";
            }
        } else {

            if (!empty($oldImagePath) && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $sentencia = $conexion->prepare("UPDATE streaming SET name = ?, description = ?, price = ? WHERE id = ?");
            $resultado = $sentencia->execute([$name, $description, $price, $txtid]);
        }

        if ($resultado === TRUE) {
            header("Location: index.php");
            exit(); // Importante: salir después de redirigir para evitar la ejecución adicional del código.
        } else {
            echo "Error al actualizar el proxy: " . mysqli_error($conexion);
        }
    }
}
?>
<link rel="stylesheet" href="../../css/crear.css">

<div class="card mx-auto" align="center">
    <div class="card-header">
        <h3>Editar Streaming</h3>
    </div>
    <div class="card-body">
        <form action="editar.php" enctype="multipart/form-data" method="POST">
            <div class="mb-3">
                <label for="txtid" class="form-label">ID:</label>
                <input name="txtid" id="txtid" class="form-control" type="text" value="<?php echo $txtid; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $streaming[0]['name']; ?>" aria-describedby="helpId" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="description" name="description" value="<?php echo $streaming[0]['description']; ?>" aria-describedby="helpId" placeholder="Descripción" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $streaming[0]['price']; ?>" aria-describedby="helpId" placeholder="Precio" required>
            </div>

            <button type="submit" class="btn btn-outline-success">Actualizar</button>
            <a type="button" class="btn btn-outline-danger" href="index.php">Cancelar</a>
        </form>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>
