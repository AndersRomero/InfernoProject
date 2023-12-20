<?php include 'templates/header.php';

include '../conexion.php';




if(isset($_GET['txtID'])){
    // RECUPERAR datos  dicho registro con el ID correspondiente
    $txtID= (isset($_GET['txtID']) ? $_GET['txtID'] : "");
    $sentencia=$conexion->prepare("SELECT * FROM proxy WHERE id=:id ");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro= $sentencia->fetch(PDO::FETCH_LAZY);

    $name=$registro['name'];
    $image=$registro['image'];
    $description=$registro['description'];
    $price=$registro['price'];


    , image, description, price
}

?>



<div class="card">
    <div class="card-header">
        <h3>Editar Proxy</h3>
    </div>
    <div class="card-body">
        <form action="crear.php" enctype="multipart/form-data" method="POST">

            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input type="text"class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">

            </div>

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

<?php include 'templates/footer.php'; ?>
