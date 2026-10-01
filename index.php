<?php
 
require_once "funciones.php";
require_once "datos.php";

$orden = leerCadena($_GET, "orden");

if ($orden === ""){
    $orden = "id";
}

$productosOrdenados = $productos;

if ($orden === "nombre") {
    usort(  $productosOrdenados , function (array $a, array $b): int {
        return $a["nombre"] <=> $b["nombre"];
    });    
} elseif ($orden === "precio") {
    usort(  $productosOrdenados , function (array $a, array $b): int {
        return $a["precio"] <=> $b["precio"];
    }); 
} else {     
    $orden = "id";
    usort(  $productosOrdenados , function (array $a, array $b): int {
        return $a["id"] <=> $b["id"];
    });
}


?>

<!DOCTYPE html>

<!--
    A partir de aquí tenemos principalmente HTML.

    PHP se ejecuta EN EL SERVIDOR.

    El navegador NO recibe este código PHP.
    El navegador recibirá únicamente el HTML generado.
-->
<html lang="es">

<head>

    <!-- Codificación de caracteres -->
    <meta charset="UTF-8">

    <!-- Adaptación a dispositivos móviles -->
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <!-- Título mostrado en la pestaña del navegador -->
    <title>DWES Store</title>

    <!-- Hoja de estilos CSS externa -->
    <link
        rel="stylesheet"
        href="estilos.css"
    >

</head>


<body>


<!-- ==================================================
     CABECERA DE LA PÁGINA
     ================================================== -->

<header class="cabecera">

    <div class="contenedor">

        <h1>DWES Store</h1>

        <p>Versión estática en HTML y CSS</p>


        <!--
            Menú de navegación.

            Cada enlace realizará una nueva petición
            HTTP al servidor.
        -->
        <nav class="navegacion">

            <a href="index.php">
                Inicio
            </a>

            <a href="buscar.php">
                Buscar
            </a>

            <a href="compra.php">
                Comprar
            </a>

        </nav>

    </div>

</header>



<!-- ==================================================
     CONTENIDO PRINCIPAL
     ================================================== -->

<main class="contenedor">


    <!-- Título de la sección -->
    <section class="panel">

        <h2>Catálogo</h2>
        <p>Orden actual: </p>
        <nav class="navegacion">
            <a href="index.php?orden=id">Por id</a>
            <a href="index.php?orden=nombre">Por nombre</a>
            <a href="index.php?orden=precio">Por precio</a>
        </nav>

    </section>



    <!-- ==================================================
         CATÁLOGO DE PRODUCTOS
         ================================================== -->

    <section class="grid-productos">

        <?php foreach ($productosOrdenados as $producto) {  ?>

            <article class= "producto"> 
                <h2>
                    <?= $producto["nombre"] ?>
                </h2>

                <p>
                    Categoria: 
                    <?= $producto["categoria"] ?>
                </p>

                 <p class="precio">
                    <?= 
                        formatearPrecio($producto["precio"]) 
                    ?>
                </p>
                <p>
                    Stock:
                    <?= 
                        $producto["stock"] 
                    ?>
                </p>
                <p class="estado <?= obtenerClaseEstado($producto["stock"]); ?>">
                    Estado:
                    <?= 
                        obtenerEstadoStock($producto["stock"]); 
                    ?>
                </p>

            </article>

        <?php } ?>


    </section>

</main>



<!-- ==================================================
     PIE DE PÁGINA
     ================================================== -->

<footer class="pie">

    <div class="contenedor">

        Proyecto de Desarrollo Web en Entorno Servidor

    </div>

</footer>


</body>

</html>