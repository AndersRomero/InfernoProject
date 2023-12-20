<?php
include '../templates/header.php';
include '../conexion.php';

// Obtiene el ID del proxy a editar
if (isset($_GET['txtid'])) {
    $txtid = $_GET['txtid'];
    $sentencia = $conexion->prepare("SELECT * FROM proxy WHERE id = ?");
    $resultado = $sentencia->execute([$txtid]);
    $proxy = $sentencia->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Procesa el formulario cuando se envía
if ($_POST) {
    $txtid = $_POST['txtid'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Obtén la información de la nueva imagen
    $newImage = $_FILES['image'];

    // Obtiene la ruta de la imagen anterior
    $oldImagePath = $proxy[0]['image'];

    // Validaciones
    if (empty($name) || empty($description) || empty($price)) {
        echo "Todos los campos son obligatorios.";
    } elseif (!is_numeric($price) || $price < 0) {
        echo "El precio debe ser un número positivo.";
    } else {
        // Manejo de la subida de la nueva imagen
        if (!empty($newImage['name'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($newImage["name"]);

            // Crea el directorio si no existe
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0755, true);
            }

            // Elimina la imagen anterior si existe
            if (!empty($oldImagePath) && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            if (move_uploaded_file($newImage["tmp_name"], $target_file)) {
                // Actualiza la información del proxy con la nueva imagen
                $sentencia = $conexion->prepare("UPDATE proxy SET name = ?, image = ?, description = ?, price = ? WHERE id = ?");
                $resultado = $sentencia->execute([$name, $target_file, $description, $price, $txtid]);
            } else {
                echo "Hubo un error al subir tu nueva imagen.";
            }
        } else {
            // Si no se proporciona una nueva imagen, actualizar la información sin cambiar la imagen
            // pero elimina la imagen anterior si existe
            if (!empty($oldImagePath) && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $sentencia = $conexion->prepare("UPDATE proxy SET name = ?, description = ?, price = ? WHERE id = ?");
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

<!-- HTML -->
<div class="card">
    <div class="card-header">
        <h3>Editar Proxy</h3>
    </div>
    <div class="card-body">
        <form action="editar.php" enctype="multipart/form-data" method="POST">
            <div class="mb-3">
                <label for="txtid" class="form-label">ID:</label>
                <input name="txtid" id="txtid" class="form-control" type="text" value="<?php echo $txtid; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $proxy[0]['name']; ?>" aria-describedby="helpId" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="description" name="description" value="<?php echo $proxy[0]['description']; ?>" aria-describedby="helpId" placeholder="Descripción" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $proxy[0]['price']; ?>" aria-describedby="helpId" placeholder="Precio" required>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a type="button" class="btn btn-danger" href="index.php">Cancelar</a>
        </form>
    </div>
</div>

<?php include '../templates/footer.php'; ?>
