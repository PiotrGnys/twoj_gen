<?php
session_start();

if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
{
	header('Location: zalogowano.php');
	exit();
	}
?>
<!DOCTYPE HTML>
<html lang="pl">

<head>
	<link rel="stylesheet" href="css/style_tg.css" type="text/css"/>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital@1&display=swap" rel="stylesheet">
	<meta charset="utf-8"/>
	<title>Twój Gen - logowanie</title>
	<meta name="description" content="Strona logowania do Lab Manager"/>
	<meta name="keywords" content="logowanie, twój, gen, łódź, laboratorium genetyczne"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	
</head>


<body>
<div id="container">
	<div id="srodek">
	<img src="img/MedeorGeneticsHeart_noMargin.png" align: center;></br><br/><br/>
	
	<form action="zaloguj.php" method="post" >
		LOGIN:<br/>
		<input type="text" name="login"></input><br/><br/>
		PASSWORD:<br/>
		<input type="password" name="password"></input>
		<br/><br/>
		<input type="submit" value="Zaloguj się"></input>
</form>
	
	<?php
	if(isset($_SESSION['blad']))
	{
	echo $_SESSION['blad'];
	}
	?>
	</div>

	<div id="footer"; align="center";>
Twój Gen - all rights reserved &copy;
	</div>
</div>

	

</body>

</html>