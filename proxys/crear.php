<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Validación de campos requeridos
    if (empty($name) || empty($description) || empty($price)) {
        echo "Todos los campos son obligatorios.";
    } elseif (!is_numeric($price)) {
        echo "El precio debe ser un número.";
    } else {
        // Manejo de la subida de la imagen
        $target_dir = "uploads/";

        // Crea el directorio si no existe
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica si el archivo es una imagen real o una imagen falsa...
        // Resto del código de subida de archivo...

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Sentencia preparada para evitar la inyección de SQL
            $sql = "INSERT INTO proxy (name, image, description, price) VALUES (?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);

            // Vincula los parámetros y ejecuta la sentencia
            $stmt->bind_param("sssd", $name, $target_file, $description, $price);
            $query = $stmt->execute();

            if ($query) {
                header("Location: index.php");
                exit(); // Importante: salir después de redirigir para evitar la ejecución adicional del código.
            } else {
                echo "Error al crear el proxy: " . $stmt->error;
            }

            // Cierra la declaración
            $stmt->close();
        } else {
            echo "Hubo un error al subir tu archivo.";
        }
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
                <input type="text" class="form-control" id="name" name="name" aria-describedby="helpId" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="image" name="image" aria-describedby="helpId" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="description" name="description" aria-describedby="helpId" placeholder="Descripción" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" class="form-control" id="price" name="price" aria-describedby="helpId" placeholder="Precio" required>
            </div>

            <button type="submit" class="btn btn-success">Crear</button>
            <a type="button" class="btn btn-danger" href="index.php">Cancelar</a>
        </form>
    </div>
</div>

<?php include '../templates/footer.php'; ?>
