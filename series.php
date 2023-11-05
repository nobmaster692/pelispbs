<?php session_start(); include 'encabezado.php'; include_once 'conexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pelispbs</title>
	<link rel="stylesheet" type="text/css" href="stilos.css">
	<link rel="icon" type="image/x-icon" href="descarga.ico">
</head>
<body>
	<div class="container">
		<?php
		if (isset($_GET['serie'])) {
			$d = $_GET['serie'];
			$busqueda="select (tm.serie||' '||sr.temporada) as serie,(tm.carpeta||'/'||sr.temporada) as rt ,(tm.carpeta||'/'||sr.temporada||'/'||sr.imagen) as imagen from temp_series tm, series sr where tm.id_temp=sr.serie and tm.serie='$d' order by sr.temporada";
		}else{
			$busqueda ="select serie,(carpeta||'/'||imagen)as imagen from temp_series";
		}
		
		$base_de_datos = new conexion();
		$sql = $base_de_datos->query($busqueda);
		$datos = $sql->fetchAll(PDO::FETCH_OBJ);
		if ($datos == null) {
			echo "<h1>No se hayaron resultados</h1>";
		}else{
			foreach ($datos as $key) {
				if(isset($_GET['serie'])){
					$totalcp = count(glob("$key->rt/{*.mp4}",GLOB_BRACE));
					$link = "series_ver.php?rt=$key->rt/&cap=1&totalcp=$totalcp";

					

				}else{
					$link= "series.php?serie=$key->serie";
				}
				
			?>
			<div class="card">
				<figure>
					<img src="<?php echo $key->imagen; ?>">
				</figure>
				<div class="contenido">
					<h3><?php echo $key->serie ?></h3>
					<a href="<?php echo $link ?>">Ver</a>
				</div>
			</div>
			<?php  
		}
	}
	?>
</div>

</body>
</html>