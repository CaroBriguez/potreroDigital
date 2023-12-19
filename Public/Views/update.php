<?php
$conexion=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($conexion,"tienda_natural");

$id = $_GET['id'];

$consulta = "SELECT * FROM productos WHERE id=$id";

$repuesta=mysqli_query ($conexion, $consulta);

$datos=mysqli_fetch_array($repuesta);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tienda Natural</title>
    </head>
    <body>
        <?php

        $producto=$datos["producto"];
        $categoria=$datos["categoria"];
        $precio=$datos["precio"];
        ?>

        <h2>Modificar Producto</h2>
        <p>Ingrese los nuevos datos del producto.</p>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Categoria del Producto</label>
            <input type="text" name="categoria" placeholder="Categoria" value="<?php echo "$categoria"; ?>">
<br><br>
            <label>Productos</label>
            <input type="text" name="producto" placeholder="Producto" value="<?php echo "$producto"; ?>">
<br><br>
            <label>Precio</label>
            <input type="text" name="precio" placeholder="Precio" value="<?php echo "$precio"; ?>">
<br><br>
            <input type="submit" name="guardar_cambios" value="Guardar Cambios">
            <button type="submit" name="Cancelar" formaction="listar.php">Cancelar</button>
        </form>
        <?php
    
        if(array_key_exists('guardar_cambios',$_POST)){
            $producto=$_POST['producto'];
            $categoria=$_POST['categoria'];
            $precio=$_POST['precio'];
            
            $consulta = "UPDATE productos SET producto='$producto', categoria='$categoria', precio='$precio'  WHERE id=$id";
            
            mysqli_query($conexion,$consulta);
            
            header('location: listar.php');
        } ?>

    </body>
</html>
