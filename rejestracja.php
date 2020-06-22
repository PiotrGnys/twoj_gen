<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
	header('Location: index.php');
	exit();
}
	if(isset($_POST['nazwisko'])){
		$wszystko_ok=true;
		$imie=$_POST['imie'];
		$nazwisko=$_POST['nazwisko'];
		$PESEL=$_POST['PESEL'];
		$plec=$_POST['plec'];
		$data_urodzenia=$_POST['data_urodzenia'];
		$ulica=$_POST['ulica'];
		$kod_pocztowy=$_POST['kod_pocztowy'];
		$miejscowosc=$_POST['miejscowosc'];
		$numer_badania=$_POST['numer_badania'];
		
		if((strlen($imie)<2) || (strlen($imie)>30)){
			$wszystko_ok=false;
			$_SESSION['e_imie']="Imię musi posiadać do 2 do 30 znaków!";
		}
		
		if(ctype_alnum($imie)==false){
			$wszystko_ok=false;
			$_SESSION['e_imie']="Imię nie może zawierać znaków specjalnych!";
		}
		
		if(ctype_alnum($nazwisko)==false){
			$wszystko_ok=false;
			$_SESSION['e_nazwisko']="Nazwisko nie może zawierać znaków specjalnych!";
		}
		
		if((strlen($PESEL)<=10) || (strlen($PESEL)>=12)){
			$wszystko_ok=false;
			$_SESSION['e_PESEL']="Nieprawidłowy numer PESEL!";
		}
		
		if(ctype_alnum($ulica)==false){
			$wszystko_ok=false;
			$_SESSION['e_ulica']="To pole może zawierać tylko alfanumeryczne znaki!";
		}
		
		if(ctype_alnum($miejscowosc)==false){
			$wszystko_ok=false;
			$_SESSION['e_miejscowosc']="To pole może zawierać tylko alfanumeryczne znaki!";
		}
		
		if($wszystko_ok==true){
			
			require_once "connect.php";

$polaczenie = mysqli_connect($host,$db_user,$db_password, $db_name);

if (!isset($polaczenie)) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
}
else
{

	$ins="INSERT INTO pacjenci (ID, Imie, Nazwisko, PESEL, Płeć, Data urodzenia, Ulica, Kod pocztowy, Miejscowość, Numer badania) VALUES (NULL,'$imie','$nazwisko','$PESEL','$plec','$data_urodzenia','$ulica','$kod_pocztowy','$miejscowosc','$numer_badania')";
	if(isset($ins)) {
     header('Location: zarejestrowano.php');
	mysqli_close($polaczenie);
	}
else{
	echo "Błąd nie udało się dodać nowego rekordu";
}
}
		}
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
<div id="content">

<form method="post" >
<table width=50% align="center">
<tr height="100">
		<td>Imię:<br/>
		<input type="text" name="imie"></input><br/>
		<?php
		if(isset($_SESSION['e_imie'])){
			echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
			unset($_SESSION['e_imie']);
		}
		?></td>
		<td>Nazwisko:<br/>
		<input type="text" name="nazwisko"></input><br/>
		<?php
		if(isset($_SESSION['e_imie'])){
			echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
			unset($_SESSION['e_imie']);
		}
		?></td>
		<td>PESEL:<br/>
		<input type="text" name="PESEL"></input><br/>
		<?php
		if(isset($_SESSION['e_PESEL'])){
			echo '<div class="error">'.$_SESSION['e_PESEL'].'</div>';
			unset($_SESSION['e_PESEL']);
		}
		?></td>
		<td>Płeć:<br/>
		<input type="text" name="plec"></input><br/></td>
</tr>
<tr height="100">
		<td>Data urodzenia:<br/>
		<input type="text" name="data_urodzenia"></input><br/></td>
		<td>Ulica:<br/>
		<input type="text" name="ulica"></input><br/>
		<?php
		if(isset($_SESSION['e_ulica'])){
			echo '<div class="error">'.$_SESSION['e_ulica'].'</div>';
			unset($_SESSION['e_ulica']);
		}
		?></td>
		<td>Kod pocztowy:<br/>
		<input type="text" name="kod_pocztowy"></input><br/></td>
		<td>Miejscowość:<br/>
		<input type="text" name="miejscowosc"></input><br/>
		<?php
		if(isset($_SESSION['e_miejscowosc'])){
			echo '<div class="error">'.$_SESSION['e_miejscowosc'].'</div>';
			unset($_SESSION['e_miejscowosc']);
		}
		?></td>
</tr>
<tr height="100">
		<td>Numer badania:<br/>
		<input type="text" name="numer_badania"></input><br/>
		<?php
		if(isset($_SESSION['e_miejscowosc'])){
			echo '<div class="error">'.$_SESSION['e_miejscowosc'].'</div>';
			unset($_SESSION['e_miejscowosc']);
		}
		?></td></td>
</tr>
<tr height="100" >		
<br/><br/>
		<td colspan="4" align="center"><input type="submit" value="Zapisz"></input></td>
</tr>
</table>
</form>

</div>
	<div id="footer">
Twój Gen - all rights reserved &copy;
	</div>
</div>

	

</body>

</html>