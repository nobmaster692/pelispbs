<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stilos.css?uuid=<?php echo uniqid();?>">
    <link rel="icon" type="image/x-icon" href="descarga.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
 
        <div class="menu">
         <form action="" method="post">
            <nav class="nav">
              <h1><a href="index.php">PelisPbs</a></h1>
              <div>
                <input id="buscartexto" type="text" placeholder="Buscar Pelicula" name="txt_buscar" required>
                <ion-icon id="buscar" class="ion-icon" name="search"></ion-icon>
            </div>

            <!--<ul class="nav">
               <li><a id="user"><ion-icon name="person-outline"></ion-icon>Usuario</a>
                <ul>
                    <li id="registrar"><a>Ingresar</a></li>
                    <li><a href="https://wa.me/+593959623374" target="blank">Contactar</a></li>
                    <li id="cerrar"><a href="cerrar.php">Cerrar</a></li>
                </ul>
            </li>

        </ul>-->
    </nav>
</form>
</div>

</body>
</html>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="script.js"></script>
<?php 
if (!isset($_SESSION['user'])) {
    ?>
    <script>
        cerrar.style.display='none';
    </script>
    <?php
}else if (isset($_SESSION['user'])) {  
    ?>
    <script>
        cerrar.style.display='block';
        registrar.style.display='none';
    </script>
    <?php
}
?>