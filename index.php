<?php
	include "projects/configs/www/includes/directory_functions.php";
?>
<html>
<head>
<META HTTP-EQUIV="content-type" CONTENT="text/html; charset=UTF-8">

<link href='//fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
<link type="text/css" rel="stylesheet" href="projects/configs/www/countries/templates/style.css"/>
<link rel="stylesheet" href="projects/configs/www/countries/templates/bootstrap.min.css">
<link rel="stylesheet" href="projects/configs/www/countries/templates/bootstrap-theme.min.css">
</head>
<title> AmRest Network Team Web Site </title>
<body>
	<div id="container">
		<img style="float:left;" src="projects/configs/www/countries/templates/logo.png" />
		<div class="title">
			Restaurants devices configurator
		</div>
	</div>

<form class="form" name="form" method="POST" action="process.php">
<div class="row">
	<div class="col-xs-6">
		<div style="margin:0 0 0 150px;" class="row">
		
			<div class="radio">
				<label class="radio">
					<input style="margin-top:10px;" type="radio" name="country" value="ru" />
						<img src="projects/configs/www/images/countries/ru.png"/> Russia
				</label>
				<label class="radio">
					<input style="margin-top:10px;" type="radio" name="country" value="pl">
						<img src="projects/configs/www/images/countries/pl.png"/> Poland
					</label> 
				<label class="radio">
					<input style="margin-top:10px;" type="radio" name="country" value="cz">
						<img src="projects/configs/www/images/countries/cz.png"/> Czech Republic
				</label> 
				<label class="radio">
					<input style="margin-top:10px;" type="radio" name="country" value="sk">
						<img src="projects/configs/www/images/countries/sk.png"/> Slovakia
				</label> 
				<label class="radio">
					<input style="margin-top:10px;" type="radio" name="country" value="bg">
						<img src="projects/configs/www/images/countries/bg.png"/><img src="projects/configs/www/images/countries/sr.png"/> Bulgaria/Serbia/Croatia
					</label> 
				<label class="radio">
					<input style="margin-top:10px;" type="radio" name="country" value="hu">
						<img src="projects/configs/www/images/countries/hu.png"/> Hungary
				</label>
				<label class="radio">
					<input style="margin-top:10px;" type="radio" name="country" value="de">
					<img src="projects/configs/www/images/countries/de.png"/> Germany
				</label>
				<label class="radio">
					<input style="margin-top:10px;" type="radio" name="country" value="es">
					<img src="projects/configs/www/images/countries/es.png"/> Spain
				</label>
			</div>
				<input type="image" src="projects/configs/www/images/toolbar/adm.png" style="margin-top: 10px;margin-left: 30px;" />
		</div>
		<div style="margin:0 0 0 150px;" class="row">
			<h3>Show configs:</h3>
			<ul>
				<li><a href="projects/configs/www/final/routers/">Cisco</a></li>
				<li><a href="projects/configs/www/final/szyfr/">SZFR's</a></li>
				<li><a href="projects/configs/www/final/vpngate/">VpnGate's</a></li>
				<li><a href="projects/configs/www/final/switches/">Switches</a></li>
				
			</ul>
		</div>
		
		<div style="margin:0 0 0 150px;" class="row">
		    </br>
		    <a href="projects/configs/www/images/media/Switch_StiB.pdf">Switch Manual</a>
		</div>
		
		<div style="margin:0 0 0 150px;" class="row">
		</br>
		    <a href="https://plhqlina01/tunnels/index_ru.php"><h4>Tunnels RU Database</h4></a>
		</div>
		
		<div style="margin:0 0 0 150px;" class="row">
		    </br>
		    <a href="https://plhqlina01/tunnels/"><h4>Tunnels Database</h4></a>
		</div>
	</div>
	<div class="">
		<img style="float:left;" height="500px" src="projects/configs/www/countries/templates/cisco.jpg" />
	</div>
</div>
    <hr />	
</form>	
</body>
</html>

