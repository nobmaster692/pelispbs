<?php 
session_start();
$a = $_GET['dato'];
$nombre=$_GET['name'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pelispbs-<?php echo $nombre; ?></title>
	<link rel="stylesheet" type="text/css" href="stilos.css">
    <link rel="icon" type="image/x-icon" href="descarga.ico">
</head>
<body>
	<header>
        <div class="menu">
         <form action="" method="post">
          <nav class="nav">
           <form action="" method="post">
              <h1><a href="index.php">PelisPbs</a></h1>
          </nav>
      </form>
  </div>
</header>
<div class="pelicula">
   <video  controls autoplay>
  
        <source src="<?php echo $a; ?>" type="video/mp4">
      
        </video>
    </div>
</body>
</html>