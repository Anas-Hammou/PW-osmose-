<?php 
ob_start();
if(!isset($_SESSION)){
	session_start();
}
if (isset($_SESSION["username"]))
{
	if ($_SESSION["role_user"] == "Utilisateur")
		header("Location:../FrontViews/front.php") ;
	else{

		if (session_destroy())
		{
			header ("location:login.php")  ; 
		}
	}
}else 
	header('Location:login.php');
ob_end_flush();

?>