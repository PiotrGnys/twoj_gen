<?php
session_start();

if((!isset($_POST['login']))||(!isset($_POST['password'])))
{
	header('Location: index.php');
	exit();
}
require_once "connect.php";

$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);

if($polaczenie->connect_errno!=0)
{
	echo "Error: ".$polaczenie->connect_errno;
}
else
{
	$login = $_POST['login'];
	$password= $_POST['password'];
	
	$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	$password = htmlentities($password, ENT_QUOTES, "UTF-8");
	
	$sql="SELECT * FROM logowanie WHERE login = '$login' AND password = '$password'";
	
	if ($rezultat=@$polaczenie->query($sql))
	{
		$ilu_userow=$rezultat->num_rows;
		if($ilu_userow>0)
		{
			$_SESSION['zalogowany']=true;
			$wiersz = $rezultat->fetch_assoc();
			$user=$wiersz['login'];
			$_SESSION['imie']=$wiersz['imie'];
			
			unset($_SESSION['blad']);
			$rezultat->close();
			header('Location: zalogowano.php');
		}
		else{
			$_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło!</span>';
			header('Location: index.php');
		}
	}
	
	$polaczenie->close();
}
	?>
