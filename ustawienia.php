<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
	header('Location: index.php');
	exit();
}
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
	<link rel="stylesheet" href="css/style_tg.css" type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital@1&display=swap" rel="stylesheet">
	<meta charset="utf-8"/>
	<title>Twój Gen - Rejestracja</title>
	<meta name="description" content="Zalogowano do Lab Manager - Twój Gen"/>
	<meta name="keywords" content="logowanie, twój, gen, łódź, laboratorium genetyczne"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	
</head>


<body>
<div id="container">
	<div id="topbar">
<div id="logo"><img src="img/MedeorGeneticsHeart_noMargin.png" style="width:30%;"></div>
<div class="topmenu"><a href="logout.php" style>[ Wyloguj się ]</a></div>
<div class="topmenu"><?php
	echo "Witaj, ".$_SESSION['imie'].'!';
	?></div>
<div class="topmenu"><a href="ustawienia.php">USTAWIENIA</a></div>
<div class="topmenu"><a href="raporty.php">RAPORTY</a></div>
<div class="topmenu"><a href="badania.php">BADANIA</a></div>
<div class="topmenu"><a href="sprzedaz.php">SPRZEDAŻ</a></div>
<div class="topmenu"><a href="rejestracja.php">REJESTRACJA</a></div>
<div style="clear: both;"></div>
	</div>
<div id="content">to jest strona USTAWIEŃ</div>
	<div id="footer">
Twój Gen - all rights reserved &copy;
	</div>
</div>

	

</body>

</html>