<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <h1>Tienda Natural</h1>
    <p>La siguiente lista muestra los productos actualmente en stock</p>
    <section>
    <div class="container">
        <div class="row">

        <a href="./listar.php">VOLVER</a>
        
        <?php
        // 1) Conexion
        $conexion = mysqli_connect("127.0.0.1", "root", "");
        mysqli_select_db($conexion, "tienda_natural");

        // 2) Preparar la orden SQL
        // Sintaxis SQL SELECT
        // SELECT * FROM nombre_tabla
        // => Selecciona todos los campos de la siguiente tabla
        // SELECT campos_tabla FROM nombre_tabla
        // => Selecciona los siguientes campos de la siguiente tabla
        $consulta="SELECT * FROM productos";

        // 3) Ejecutar la orden y obtenemos los registros
        $datos= mysqli_query($conexion, $consulta);

        // 4) el while recorre todos los registros y genera una CARD PARA CADA UNA
        
        while ($reg = mysqli_fetch_array($datos)) {?>
            <div class="card col-sm-12 col-md-6 col-lg-3">
                <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>" alt="" max-width="100%" max-height="100%">
                    <h3 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['producto']) ?></h3>
                    <span>$ <?php echo $reg['precio']; ?></span>
                </a>
                <a href="#" class="btn btn-success">Añadir al carrito</a>
            </div>

        <?php } ?>

        </div>
    </div>
    </section>
    <footer>
        <div class="contenedor">
            <nav class="sitio">
                <ul>
                    <li id="title">NUESTRO SITIO </li>
                    <li><a href="#">¿Como comprar?</a></li>
                    <li><a href="#">Terminos y condiciones</a></li>
                    <li><a href="#">Preguntas Frecuentes</a></li>
                </ul>
            </nav>
    
            <nav class="contacto">
                <ul>
                    <li id="title">CONTACTO</li>
                    <li>Tel: (223) 4637893 | (011) 6467890</li>
                    <li>E-mail: tiendanatural@gmail.com.ar | natural@gmail.com</li>
                    <li>Dirección: Rivadavia 3050, Mar del Plata.</li>
                </ul>
            </nav>
            
        </div>
        <p class="p">Tienda Natural 2023</p>
    
    </footer>
</body>

</html>