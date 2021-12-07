<?php 
ob_start();
    if(!isset($_SESSION)){
		session_start();
	}
	if (!isset($_SESSION["username"]))
	{
		header('Location:login.php');
	}else
	{
        if ($_SESSION["role_user"] == "Utilisateur")
            header("Location:../FrontViews/compteUtilisateur.php") ;
        else
        {
            include_once '../Model/Utilisateur.php';
            include_once '../Controller/UtilisateurC.php';

            $utilisateurC = new UtilisateurC(); 
            $utilisateur = $utilisateurC->rechercher_UtilisateurUsername($_SESSION['username']);

            $id_user = $utilisateur['id_user'] ; 
            $nom_user = $utilisateur['nom_user'] ; 
            $prenom_user = $utilisateur['prenom_user'] ; 
            $email_user = $utilisateur['email_user'] ; 
            $tel_user = $utilisateur['tel_user'] ;  
            $adresse_user = $utilisateur['adresse_user'] ; 
            $username = $utilisateur['username'] ; 
            $password_user = $utilisateur['password_user'] ; 
            $role_user = $utilisateur['role_user'] ;  
            $confirmation_key = $utilisateur['confirmation_key'] ;  
            $confirme = $utilisateur['confirme'] ;  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mon Compte</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .input_U{
            height: 35px;
            width: 235px;
        }
        h5{
            padding: 10px 15px 10px 15px;
        }
    </style>
    <script>
        function ValidateNomUser(){
			var nom = document.getElementById("nom_user").value; 
			var error = document.getElementById("NomUser_error");

            var pattern = /^[a-zA-Z\s]+$/;
			if (nom == ""){
				error.value= 1;
			}
			if (nom.match(pattern)){
				error.value= 0;
			}else 
			{
				error.value= 2;
			}
		}

        function ValidatePrenomUser(){
			var prenom = document.getElementById("prenom_user").value; 
			var error = document.getElementById("PrenomUser_error");

			var pattern = /^[a-zA-Z\s]+$/;
			if (prenom == ""){
				error.value= 1;
			}
			if (prenom.match(pattern)){
				error.value= 0;
			}else 
			{
				error.value= 2;
			}
		}

        function ValidateEmailUser()
        {
            var mail = document.getElementById("email_user").value ; 
            var error = document.getElementById("EmailUser_error");
            if (mail == "")
            {
                error.value= 1;
            }else{
                var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/
                if (mail.match(pattern)){
                    error.value= 0;
                }else{
                    error.value= 2;
                }
            }
        }

        function ValidateTelUser()
        {
            var tel = document.getElementById("tel_user").value ; 
            var error = document.getElementById("TelUser_error");
            if (tel == "")
            {
                error.value= 1;
            }else if (tel.length == 8)
            {
                error.value= 0;
            }else{
                error.value= 2;
            } 
        }

        function ValidateAdresseUser(){
			var adresse = document.getElementById("adresse_user").value; 
			var error = document.getElementById("AdresseUser_error");

			if (adresse == ""){
				error.value= 1;
			}
			else 
			{
				error.value= 0;
			}
		}

		function ValidateAll1(){
            ValidateNomUser();
            ValidatePrenomUser();
            ValidateEmailUser();
            ValidateTelUser();
            ValidateAdresseUser();
		}
	</script>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="utilisateurs.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Utilisateurs</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item active" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="compteAdministrateur.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content --><!-- Partie Compte Administrateur -->

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Profil</h1>
                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Informations sur mon compte</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <table>
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 17px; ">Nom</h5>
                                        </td>
                                        <td>
                                            <input name = "nom_user" id = "nom_user" class="input_U" type="text" oninput="ValidateNomUser();" value="<?php echo $nom_user ?>">
                                        </td>
                                        <td><input type="hidden" id="NomUser_error" name="NomUser_error" value ="0"/></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 17px; ">Prénom</h5>
                                        </td>
                                        <td>
                                            <input name = "prenom_user" id = "prenom_user" class="input_U" type="text" oninput="ValidatePrenomUser();" value="<?php echo $prenom_user ?>">
                                        </td>
                                        <td><input type="hidden" id="PrenomUser_error" name="PrenomUser_error" value ="0"/></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 17px; ">Nom d'utilisateur</h5>
                                        </td>
                                        <td>
                                            <input name = "username" class="input_U" type="text" value="<?php echo $username; ?>" readonly>
                                            <p style="font-size: 9px; color:gray; position:relative; margin-top:1px;">*Cette donnée ne peut pas être modifiée.</p>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 17px; ">Adresse e-mail</h5>
                                        </td>
                                        <td>
                                            <input name = "email_user" id = "email_user" class="input_U" type="text" oninput="ValidateEmailUser();" value="<?php echo $email_user; ?>">
                                        </td>
                                        <td><input type="hidden" id="EmailUser_error" name="EmailUser_error" value ="0"/></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 17px; ">Numéro de téléphone</h5>
                                        </td>
                                        <td>
                                            <input name = "tel_user" id = "tel_user" class="input_U" type="text" onblur="ValidateTelUser();" value="<?php echo $tel_user; ?>">
                                        </td>
                                        <td><input type="hidden" id="TelUser_error" name="TelUser_error" value ="0"/></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 17px; ">Adresse</h5>
                                        </td>
                                        <td>
                                            <input name = "adresse_user" id = "adresse_user" class="input_U" type="text" oninput="ValidateAdresseUser();" value="<?php echo $adresse_user; ?>">
                                        </td>
                                        <td><input type="hidden" id="AdresseUser_error" name="AdresseUser_error" value ="0"/></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 17px; ">Type du compte</h5>
                                        </td>
                                        <td>
                                            <input name = "role_user" class="input_U" type="text" value="<?php echo $role_user; ?>" readonly>
                                            <p style="font-size: 9px; color:gray; position:relative; margin-top:1px;">*Cette donnée ne peut pas être modifiée.</p>
                                        </td>
                                    </tr>
                                    <tr><td><input type="hidden" name="id_user" id="id_user" value="<?php echo $id_user; ?>" readonly></td></tr>
                                </table>
                                <input class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style = "padding:10px 30px 10px 30px;" type="submit" name="modifier_utilisateur_2" onclick ="ValidateAll1();" value="Modifier" formaction="modifierUtilisateur.php">
                            </form>
                            <br>
                            <?php
                            if (!(is_numeric($_SESSION['modifier_1']))) { ?>
                                <p id="erreur1" name = "error1" style="color:red; font-weight:bold; font-size:14px;"><?php echo $_SESSION["modifier_1"]; ?></p>
                            <?php $_SESSION['modifier_1'] = 0; 
                                }else if ($_SESSION['modifier_1'] == 1){ ?>
                                <p id="succes1" name = "succes1" style="color:green; font-weight:bold; font-size:14px;">Votre compte a été modifié avec succès !</p>
                            <?php $_SESSION['modifier_1'] = 0 ; 
                            } ?>
                        </div>
                    </div>
                    
                    <br>
                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Changer mon mot de passe</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <table>
                                    <input name = "username" class="input_U" type="hidden" value="<?php echo $username; ?>">
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 17px; ">Ancien mot de passe</h5>
                                        </td>
                                        <td>
                                            <input name = "ancien_mdp" id = "ancien_mdp" class="input_U" type="password" placeholder="Ancien mot de passe">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 17px; ">Nouveau mot de passe</h5>
                                        </td>
                                        <td>
                                            <input name = "nouveau_mdp" id = "nouveau_mdp" class="input_U" type="password" placeholder="Nouveau mot de passe">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 17px; ">Confirmer mot de passe</h5>
                                        </td>
                                        <td>
                                            <input name = "confirmer_nv_mdp" id = "confirmer_nv_mdp" class="input_U" type="password"    placeholder="Nouveau mot de passe">
                                        </td>
                                    </tr>
                                </table>
                                <input class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style = "padding:10px 30px 10px 30px;" type="submit" name="modifier_utilisateur_3" value="Modifier" formaction="modifierUtilisateur.php">
                            </form>
                            <?php
                            if (!(is_numeric($_SESSION['modifier_2']))) { ?>
                                <p id="erreur2" name = "error2" style="color:red; font-weight:bold; font-size:14px;"><?php echo $_SESSION["modifier_2"]; ?></p>
                            <?php $_SESSION['modifier_2'] = 0; 
                                }else if ($_SESSION['modifier_2'] == 1){ ?>
                                <p id="succes2" name = "succes2" style="color:green; font-weight:bold; font-size:14px;">Votre mot de passe a été modifié avec succès !</p>
                            <?php $_SESSION['modifier_2'] = 0 ; 
                            } ?>
                        </div>
                    </div>
                    <br>
                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Désactiver Mon compte</h6>
                        </div>
                        <div class="card-body">
                            <p>Vous pouvez désactiver votre compte à tout moment. Le jour où vous aurez envie de le réactiver, 
                                vous n'aurez qu'à consulter vos mails, chercher le mail de réactivation du compte et appuyer sur 
                                le lien qu'il contiendra. 
                            </p>
                            <a id="desactiver" href="desactiver_compte.php?username=<?php echo $_SESSION['username']?>" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Désactiver Mon Compte</span>
                            </a>
                        </div>
                    </div>
                    <?php } 
                        include_once 'modifierUtilisateur.php';
    }
                        ob_end_flush();
                    ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>