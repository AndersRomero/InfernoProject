<?php
include '../conexion.php';

// Iniciar o reanudar la sesión para mantener el carrito entre páginas
session_start();

// Inicializar el carrito si aún no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Consultar proxy
$sentencia = $conexion->prepare("SELECT * FROM proxy");
$sentencia->execute();
$proxy = $sentencia->get_result()->fetch_all(MYSQLI_ASSOC);

// Agregar producto al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregarCarrito'])) {
    $productoId = $_POST['id'];
    $productoExistente = array_filter($_SESSION['carrito'], function ($item) use ($productoId) {
        return $item['id'] == $productoId;
    });

    // Si el producto ya está en el carrito, mostrar mensaje
    if (!empty($productoExistente)) {
        echo "<script>alert('Ya tienes este artículo en tu carrito.')</script>";
    } else {
        $producto = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'quantity' => isset($_POST['cantidad']) && $_POST['cantidad'] > 0 ? $_POST['cantidad'] : 1,
        ];

        // Agregar el producto al carrito
        array_push($_SESSION['carrito'], $producto);
    }
}

// Función para calcular el total del carrito
function calcularTotal() {
    $total = 0;
    foreach ($_SESSION['carrito'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

// Eliminar producto del carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminarItem'])) {
    $productoId = $_POST['eliminarItem'];
    $_SESSION['carrito'] = array_filter($_SESSION['carrito'], function ($item) use ($productoId) {
        return $item['id'] != $productoId;
    });
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../css/styleseccions.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        /* Estilos adicionales para el carrito */

    </style>

    <title>INFERNO PROJECT</title>
</head>

<body>
<header class="container-fluid animate__animated animate__fadeInDown">
    <nav class="navbar navbar-expand-lg nav-tabs bg-body-tertiary flex-column">
        <div class="container">
            <div class="d-flex align-items-center p-2">
                <a href="../index.php">
                    <img src="../images/logo.png" alt="Logo de INFERNO PROJECT" class="img-fluid animate__animated animate__fadeInDown" style="max-height: 60px;">
                </a>
            </div>
            <!-- Botón de hamburguesa para dispositivos móviles -->
            <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars"></i>
                </span>
            </button>

            <!-- Contenido de la barra de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link special" href="streaming.php">Streaming</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link special" href="proxy.php">Proxys</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link special" href="config.php">Checkers</a>
                    </li>
                </ul>
            </div>

            <a href="../admin/login.php" class="admin-icon  ">
                <i class="fas fa-user-cog"></i>

            </a>

            <!-- Icono de carrito -->
            <span class="carrito-icon" onclick="toggleCarrito()">
                        <i class="fas fa-shopping-cart"></i>
            </span>
        </div>
    </nav>
</header>

<section class="text-center">
    </br>
    <h1 class="text-white animate__animated animate__bounceInLeft">PROXYS</h1>
    </br>

    <div class="container d-flex flex-wrap justify-content-around">
        <?php foreach ($proxy as $registros) { ?>
            <div class="card animate__animated animate__fadeInDown">
                <img src="../admin/proxys/<?php echo $registros['image']; ?>" alt="Card Image" style="width: 100%; height: 200px; object-fit: cover;">
                <div class="card-content">
                    <h3 class="title"><?php echo $registros['name']; ?></h3>
                    <p class="description"><?php echo $registros['description']; ?></p>
                    <div class="details">
                        <p class="price">USD $<?php echo $registros['price']; ?></p>
                        <?php if ($registros['agotado']) { ?>
                            <p class="estado-agotado">Estado: Agotado</p>
                        <?php } else { ?>
                            <p class="estado-disponible">Estado: Disponible</p>
                        <?php } ?>
                    </div>

                    <?php if (!$registros['agotado']) { ?>
                        <form method="post" class="form-inline">
                            <input type="hidden" name="id" value="<?php echo $registros['id']; ?>">
                            <input type="hidden" name="name" value="<?php echo $registros['name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $registros['price']; ?>">
                            <label for="cantidad">Cantidad:</label>
                            <select name="cantidad" id="cantidad" class="cantidad form-control ml-auto">
                                <?php for ($i = 1; $i <= 15; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <button type="submit" class="btn btn-primary" name="agregarCarrito">Agregar al Carrito</button>
                        </form>
                    <?php } else { ?>
                        <p class="estado-agotado">Este producto está agotado y no puede ser agregado al carrito.</p>
                    <?php } ?>
                </div>

            </div>
        <?php } ?>
    </div>
</section>


<!-- Carrito -->
<div id="carrito" class="carrito animate__animated animate__fadeInRight">
    <h3>Tu Carrito</h3>
    <div class="carrito-items">
        <?php
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                echo "<div class='carrito-item'>";
                echo "<div class='item-info'>";
                echo "<p class='item-name'>" . htmlspecialchars($item['name']) . "</p>";
                echo "<p class='item-quantity'>Cantidad: {$item['quantity']}</p>";
                echo "</div>";
                echo "<div class='item-actions'>";
                echo "<p class='item-price'>Precio: USD$ {$item['price']}</p>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='eliminarItem' value='{$item['id']}'>";
                echo "<button type='submit' class='btn btn-sm btn-danger'>Eliminar</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>El carrito está vacío.</p>";
        }
        ?>
    </div>
    <?php if (!empty($_SESSION['carrito'])) : ?>
        <div class="carrito-total">
            <p>Total: USD $<?php echo number_format(calcularTotal(), 2); ?></p>
            <button class="mx-auto comprar btn-success" onclick="realizarCompra()">Realizar compra</button>
        </div>
    <?php endif; ?>
</div>


<!-- JavaScript y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<script>
    function toggleCarrito() {
        var carrito = document.getElementById("carrito");
        var overlay = document.querySelector(".carrito-overlay");
        carrito.style.display = carrito.style.display === "block" ? "none" : "block";
        overlay.style.display = overlay.style.display === "block" ? "none" : "block";
    }

    function cerrarCarrito() {
        var carrito = document.getElementById("carrito");
        var overlay = document.querySelector(".carrito-overlay");
        carrito.style.display = "none";
        overlay.style.display = "none";
    }

    function realizarCompra() {
        // Obtener la lista del carrito en formato de texto
        var listaCarrito = obtenerListaCarrito();

        // Obtener el total
        var total = "Total: $<?php echo number_format(calcularTotal(), 2); ?> USD";

        // Crear el mensaje para WhatsApp
        var mensajeWhatsApp = "Hola, quiero realizar la siguiente compra: " + listaCarrito + "" + total;

        // Crear el enlace de WhatsApp con el mensaje
        var enlaceWhatsApp = "https://wa.me/573203345393?text=" + encodeURIComponent(mensajeWhatsApp);

        // Redirigir a WhatsApp
        window.location.href = enlaceWhatsApp;
    }

    function obtenerListaCarrito() {
        var lista = "";
        <?php foreach ($_SESSION['carrito'] as $item): ?>
            lista += "<?php echo $item['quantity']; ?> <?php echo $item['name']; ?> ";
        <?php endforeach; ?>

        return lista;
    }

    function toggleAdminLogin() {
        var adminLoginForm = document.querySelector(".admin-login-form");
        adminLoginForm.style.display =
            adminLoginForm.style.display === "block" ? "none" : "block";
    }

    window.addEventListener('load', function () {
        document.querySelectorAll('.card-content form').forEach(function (form) {
            form.querySelector('#cantidad').value = 1;
        });
    });
</script>
</body>
</html>
