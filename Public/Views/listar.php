<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Style.css">
    <link rel="icon" href="../img/Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Almacen Natural</title>
</head>
<body>
    <!-- Header, Barra de Navegación -->
    <header class="container-fluid" > 
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#inicio">
                <img src="../img/Logo.png" alt="logo" class="logo" width="100%" height="60">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"  aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                        <li  class="nav-item dropdown border-end border-2">
                            <a class="nav-link" role="button" aria-expanded="false" id="inicio" href="./index.html">INICIO</a></li>
                        <li class="nav-item dropdown border-start border-end border-2">
                            <a class="nav-link" role="button" aria-expanded="false" href="./Productos.html">PRODUCTOS</a></li>
                        <li class="nav-item dropdown border-start border-end border-2">
                            <a class="nav-link" role="button" aria-expanded="false" href="./Public/Views/regalos.html" >REGALOS</a></li>
                        <li class="nav-item dropdown border-start">
                            <a class="nav-link" role="button" aria-expanded="false" href="./Public/Views/contacto.html">CONTACTO</a></li>
                    </ul>
                    <form>
                        <label for="buscar">
                            <input class="search" type="text" id="buscar" placeholder="Buscar...">
                        </label>
                        <button type="submit" class="boton-anadir">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <!-- USUARIO-->
    <h1>Bienvenido <?php echo $usuario="admin" ?> </h1>
    <section>
    <div class="container">
        <div class="row">


        <?php
        // 1) Conexion
        $conexion = mysqli_connect("127.0.0.1", "root", "");
        mysqli_select_db($conexion, "tienda_natural");

        $consulta="SELECT * FROM productos";

        // 3) Ejecutar la orden y obtenemos los registros
        $datos= mysqli_query($conexion, $consulta);

        // 4) el while recorre todos los registros y genera una CARD PARA CADA UNA
    ?>
        <a href="./productos.php">VER PRODUCTOS</a>
        <a href="./filterBucal.php">FILTRAR POR BUCAL</a>
        <a href="./filterBotellas.php">FILTRAR BOTELLAS</a>
        <a href="./filterCapilar.php">FILTRAR CAPILAR</a>
        <a href="./filterVarios.php">FILTRAR VARIOS</a>

        <?php print "<pre>\n";?>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">CATEGORIA</th>
                        <th scope="col">PRODUCTO</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">IMAGEN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($reg = mysqli_fetch_array($datos)) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $reg['id'] . "</th>";
                        echo "<td>" . $reg['categoria'] . "</td>";
                        echo "<td>" . $reg['producto'] . "</td>";
                        echo "<td>" . $reg['precio'] . "</td>";
                        echo "<td><img src='data:image/jpg;base64," . base64_encode($reg['imagen']) . "' alt='' style='max-width:100px; max-height:100px;'></td>";
                        echo "</tr>";
                    }?>
                </tbody>
            </table>

    <!-- Link de JS de Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>