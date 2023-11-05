	<?php include 'encabezado.php';
	session_start();
	$video = $_REQUEST['rt'].$_REQUEST['cap'].'.mp4';
	$total = $_REQUEST['totalcp'];

	$cap = $_REQUEST['cap'];
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Serie ver</title>
	</head>
	<body>
		<div class="pelicula">
			<video controls autoplay>
				
				<source src="<?php echo $video; ?>" type="video/mp4">
					
				</video>
			</div>

			<div class="controles">
				<div class="c">
					<nav class="nav">
						<div class="btnc">
							<a href="<?php echo 'series_ver.php?rt='.$_REQUEST['rt'].'&cap='.($_REQUEST['cap']-1).'&totalcp='.$_REQUEST['totalcp']; ?>">Anterior</a>
						</div>
						<?php
						if($cap<$total){
							?>
							<div class="btnc">
								<a href="<?php echo 'series_ver.php?rt='.$_REQUEST['rt'].'&cap='.($_REQUEST['cap']+1).'&totalcp='.$_REQUEST['totalcp']; ?>">Siguiente</a>
							</div>
							<?php
						}
						?>
					</nav>
				</div>
			</div>

			<div class="capitulos">
				<div class="caps">
					<?php 
					for ($i=1; $i < $total+1 ; $i++) { 
						?>
						<a id='cp<?php echo $i ?>' href="<?php echo 'series_ver.php?rt='.$_REQUEST['rt'].'&cap='.$i.'&totalcp='.$_REQUEST['totalcp']; ?>">Capitulo <?php echo $i ?></a>
						<?php
						$cpid=$_REQUEST['cap'];
					}
					?>
				</div>
				<style type="text/css">
					.caps #cp<?php echo $cpid; ?>{
						background: black;
						color: white;
					}
				</style>
			</div>

		</body>
		</html>