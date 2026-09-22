<?php
 
  require_once "funciones.php";
  require_once "datos.php";


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

    </section>



    <!-- ==================================================
         CATÁLOGO DE PRODUCTOS
         ================================================== -->

    <section class="grid-productos">

        <?php foreach ($productos as $producto) {  ?>

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