<?php
				session_start();
                $_SESSION['email_user'] = $_GET['id'];
				$_SESSION['id_user'] = $_GET['username'];
                header('Location:evenement.php');

?>