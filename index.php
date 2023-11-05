<?php session_start();  include_once 'conexion.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<link rel="stylesheet" href="stilos.css?uuid=<?php echo uniqid();?>">
    <link rel="icon" type="image/x-icon" href="descarga.png">
    <title>PelisPbs</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
    <?php include 'encabezado.php' ?>
    <div class="generos">
        <nav>
            <ul id="lista">
                <?php
                $busqueda;
                $base_de_datos = new conexion();
                $generos = $base_de_datos->query("select distinct genero from peliculas order by genero");
                $datosg = $generos->fetchAll(PDO::FETCH_OBJ);
                foreach($datosg as $key){
                    echo "<li>$key->genero</li>";
                }
                echo "<li>Series</li>";
                ?>
            </ul>
        </nav>
    </div>

    <div>
      
    </div>

    <div class="container">
        <?php
        if(!empty($_REQUEST["nume"])){ $_REQUEST["nume"] = $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '0';}
        if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "0";}

        $pagina = $_REQUEST['nume'];
        $registros=15;
        $p = $_REQUEST['nume']*$registros;

        if(isset($_GET['genero'])){
            $genero = $_GET['genero'];
            if($genero=='Series'){
                header('location:series.php');
            }
            $busqueda="select * from peliculas where genero='$genero' order by nombre";
        }else if(isset($_GET['buscar'])){
            $buscar=$_GET['buscar'];
            $busqueda="select * from peliculas where nombre ilike('$buscar%') order by nombre";
        }else{
            $busqueda="select * from peliculas order by nombre limit $registros offset $p";
        }
        $base_de_datos = new conexion(); 
        $sql = $base_de_datos->query($busqueda);

        $num_registros=$base_de_datos->query("select * from peliculas")->rowCount();

        $datos = $sql->fetchAll(PDO::FETCH_OBJ);
        if ($datos == null) {
            echo "<h1>No se hayaron resultados</h1>";
        }else{
            foreach ($datos as $key) {
                ?>
                <div class="card">
                    <figure>
                        <img src="<?php echo $key->imagen ?>">
                    </figure>
                    <div class="contenido">
                        <h3><?php echo $key->nombre ?></h3>
                        <a href="pelicula.php?dato=<?php echo $key->carpeta."/".$key->video ?>&name=<?php echo $key->nombre ?>">Ver</a>
                    </div>
                </div>
                <?php  
            }
        }

        $pagina = ceil($num_registros/$registros);
        ?>

    </div>


    <div class="inicio">
        <dialog class="modal" id="registro">
         <section >
            <div class="form-box">
                <div class="form-value">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <div>
                            <h2>Inicio de sesion</h2>
                            <div class="inputbox">
                                <ion-icon name="mail-outline"></ion-icon>
                                <input type="email" placeholder="Correo" name="txt_email" required>
                            </div>
                            <div class="inputbox">
                                <ion-icon name="lock-closed-outline"></ion-icon>
                                <input type="password" placeholder="clave" name="txt_clave" required>
                            </div>
                            <div class="forget">
                                <label><input type="checkbox">Remember me  <a href="#">Forget Password</a></label>
                            </div>
                            <input class="button" type="submit" name="btn_ingresar" value="Ingresar">
                            <div class="register">
                                <p>No tienes cuenta <a href="https://wa.me/+593959623374" target="blank">Contacta con el proveedor</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <button id="close" class="cerraricon"><ion-icon  name="close-outline"></ion-icon></button>
        </section>
    </dialog>  
</div>


<?php 

if (!isset($_GET['genero'])) {
    ?>
    <div class="paginacion"  >
     <div class="paginas">
        <nav class="pg">
            <ul >
                <li id="li0"><a id="a" href='index.php'>Inicio</a></li>            
                <?php
                for ($i=1; $i <$pagina ; $i++) {
                    echo "<li id='li$i'><a href='index.php?nume=$i'>$i</a></li>";
                }
                $pg=$_REQUEST['nume'];
                ?>
            </ul>

            <style type="text/css">
                .paginas .pg #li<?php echo $pg; ?> a{
                    background: black;
                    color: white;
                }
            </style>
        </nav>
    </div>
</div>
<?php
}
?>

<!--<div class="publicidad">
    <script type="text/javascript">
        atOptions = {
            'key' : 'fce71c3b81a4cd2503352db45c1d152b',
            'format' : 'iframe',
            'height' : 250,
            'width' : 300,
            'params' : {}
        };
        document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.profitabledisplaynetwork.com/fce71c3b81a4cd2503352db45c1d152b/invoke.js"></scr' + 'ipt>');
    </script>
    <script type="text/javascript">
        atOptions = {
            'key' : '9384fd3629bf9b95550f3205d06d3785',
            'format' : 'iframe',
            'height' : 60,
            'width' : 468,
            'params' : {}
        };
        document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.profitabledisplaynetwork.com/9384fd3629bf9b95550f3205d06d3785/invoke.js"></scr' + 'ipt>');
    </script>
    <script type="text/javascript">
        atOptions = {
            'key' : '06057e1b05bb4738c7c20dbc1066801e',
            'format' : 'iframe',
            'height' : 50,
            'width' : 320,
            'params' : {}
        };
        document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.profitabledisplaynetwork.com/06057e1b05bb4738c7c20dbc1066801e/invoke.js"></scr' + 'ipt>');
    </script>-->
</div>

</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="script.js"></script>
</html>

<?php

if(isset($_POST['btn_ingresar'])){
    $clavebd='';
    $usuariobd='';
    $correodb='';
    $correo=$_POST['txt_email'];
    $clave = $_POST['txt_clave'];
    $login = $base_de_datos->query("select * from usuario where correo='$correo' and clave='$clave'");
    $dt = $login->fetchAll(PDO::FETCH_OBJ);
    foreach ($dt as $key) {
        $clavebd = $key->clave;
        $correodb = $key->correo;
        $usuariobd = $key->usuario;
    }
    if($correo==$correodb && $clave==$clavebd)  {
        $_SESSION['user']=$usuariobd;
        ?>  
        <script>
            document.getElementById('user').innerHTML='<?php echo $_SESSION['user'] ?>';
        </script>
        <?php
    }else{
        echo "<script>alert('Usuario o contraseña incorrecto');</script>";
    }
}
?>
<script>
    document.getElementById('user').innerHTML='<?php echo '<ion-icon name="person-outline"></ion-icon>'.$_SESSION['user'] ?>';
</script>