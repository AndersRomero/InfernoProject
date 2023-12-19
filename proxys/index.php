<?php
include '../conexion.php';

$sentencia = $conexion->prepare("SELECT * FROM proxy");
$sentencia->execute();
$proxys = $sentencia->get_result()->fetch_all(MYSQLI_ASSOC);

include '../templates/header.php';
?>

<div class="card">
    <div class="card-header d-flex">
        <h3>Proxys</h3>
        <a type="button" class="btn btn-primary ml-auto" href="crear.php">Crear</a>
    </div>

    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($proxys as $registros){?>
                    <tr>
                    <td><?php echo $registros['id']?></td>
                    <td><?php echo $registros['name']?></td>
                    <td><?php echo $registros['image']?></td>
                    <td><?php echo $registros['description']?></td>
                    <td><?php echo $registros['price']?></td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include '../templates/footer.php';
?>
