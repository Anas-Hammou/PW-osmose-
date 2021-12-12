<?php 
ob_start();
    if(!isset($_SESSION)){
        session_start();
    }
	if (isset($_SESSION["username"]))
	{
        if ($_SESSION['confirme'] == 1)
	    {
            if ($_SESSION["role_user"] == "Utilisateur")
                header("location:login.php") ; 
            else if ($_SESSION["role_user"] == "Administrateur"){

                $id_user = "";
                $nom_user = "" ;
                $prenom_user = ""; 
                $email_user = "";
                $tel_user = "";
                $adresse_user = "" ;
                $username = "" ;
                $password_user = "" ;
                $role_user = "" ;
                $verifpassword_user = "";
                $confirmation_key = "";
                $confirme = "";
                $error = "";
                $succes = ""

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Utilisateurs</title>

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
        function ValidateIDUser(){
			var id = document.getElementById("id_user"); 
			var error = document.getElementById("IDUser_error");
			if (id.options != ""){
				document.getElementById("erreur").innerHTML = "";
				error.value= 0;
			}else 
				error.value= 1;
		}

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
        
        function ValidateUsernameUser(){
			var username = document.getElementById("username").value; 
			var error = document.getElementById("UsernameUser_error");

			if (username == ""){
				error.value= 1;
			}
			else 
			{
				error.value= 0;
			}
		}

		function ValidateRoleUser(){
			var role = document.getElementById("role_user"); 
			var error = document.getElementById("RoleUser_error");
			if (status.options != ""){
				error.value= 0;
			}else 
				error.value= 1;
		}

		function ValidateAll(){
			ValidateIDUser();
            ValidateNomUser();
            ValidatePrenomUser();
            ValidateEmailUser();
            ValidateTelUser();
            ValidateAdresseUser();
            ValidateUsernameUser();
            ValidateRoleUser();
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
           

           

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

          

            <?php require 'nav-item.php'; ?>


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
                    <h1 class="h3 mb-4 text-gray-800">Utilisateurs</h1>
                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Gestion des utilisateurs</h6>
                        </div>
                        <div class="card-body">
						<?php
							// ================= Rechercher Un Utilisateur ==================================
								include '../config.php' ; 
								include 'rechercherUtilisateur.php' ;

							// ==================== REINITIALISER ==========================
								if (isset($_REQUEST['reinitialiser']))
								{
									$id_user = "";
									$nom_user = "" ;
									$prenom_user = ""; 
									$email_user = "";
									$tel_user = "";
									$adresse_user = "" ;
									$username = "" ;
									$password_user = "" ;
									$role_user = "" ;
                                    $error = "";
                                    $succes = "";
								}
							?>

						<table>
                            <td style="  vertical-align:top ; ">
                                <table style="margin-right: 20px ; ">
                                    <form action="" method="POST">
                                        <tr>
											<th>
												<select value="sortselect" name="sortselect" class="input_U" style="width: 125px;">
													<option value="tri_id">ID</option>
													<option value="tri_nom" >Nom</option>
													<option value="tri_username" >Username</option>
												</select>
												<input type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" name="trier_utilisateurs" value="Trier">
											</th>
										</tr>
                                    </form>
                                </table>
                            </td>
                            <tr>
                                <table style="margin-right: 20px ; ">
                                    <form action="" method="POST">
									<!-- =================== ATTRIBUTS & BOUTONS =================== -->
                                    <hr>

										<tr>
											<th class="m-0 font-weight-bold text-dark">ID : </th>
                                            <th class="m-0 font-weight-bold text-dark">
                                                
                                                <input type="text" class="input_U" name="id_user" id="id_user" onchange="ValidateIDUser();" >

                                            </th>
                                            <td><input type="hidden" id="IDUser_error" name="IDUser_error" value ="0"/></td>
										</tr>
										<tr>
											<th class="m-0 font-weight-bold text-dark">Nom  : </td>
											<th><input class = "input_U" type="text" name="nom_user" id = "nom_user" oninput="ValidateNomUser();" value="<?php echo $nom_user ; ?>"></th>
                                            <td><input type="hidden" id="NomUser_error" name="NomUser_error" value ="0"/></td>
										</tr>
										<tr>
											<th class="m-0 font-weight-bold text-dark">Prénom : </td>
											<th><input class = "input_U" type="text" name="prenom_user" id="prenom_user" oninput="ValidatePrenomUser();" value="<?php echo $prenom_user ; ?>"></th>
                                            <td><input type="hidden" id="PrenomUser_error" name="PrenomUser_error" value ="0"/></td>
										</tr>
										<tr>
											<th class="m-0 font-weight-bold text-dark">Email : </th>
											<th><input class = "input_U" type="text" name="email_user" id="email_user" oninput="ValidateEmailUser();" value="<?php echo $email_user ; ?>"></th>
                                            <td><input type="hidden" id="EmailUser_error" name="EmailUser_error" value ="0"/></td>
										</tr>
										<tr>
											<th class="m-0 font-weight-bold text-dark">Téléphone : </th>
											<th><input class = "input_U" type="number" name="tel_user" id="tel_user" onblur="ValidateTelUser();" value="<?php echo $tel_user ; ?>"></th>
                                            <td><input type="hidden" id="TelUser_error" name="TelUser_error" value ="0"/></td>
										</tr>
										<tr>
											<th class="m-0 font-weight-bold text-dark">Adresse : </th>
											<th><input class = "input_U" type="text" name="adresse_user" id="adresse_user" oninput="ValidateAdresseUser();" value="<?php echo $adresse_user ; ?>"></th>
                                            <td><input type="hidden" id="AdresseUser_error" name="AdresseUser_error" value ="0"/></td>
										</tr>
										<tr>
											<th class="m-0 font-weight-bold text-dark">Username : </th>
                                            <th><input class = "input_U" type="text" name="username" id="username" oninput="ValidateUsernameUser();" value="<?php echo $username ; ?>"></th>
                                            <td><input type="hidden" id="UsernameUser_error" name="UsernameUser_error" value ="0"/></td>
										</tr>
										<tr>
											<th class="m-0 font-weight-bold text-dark">Type du compte : </th>
											<th class="m-0 font-weight-bold text-dark">
												<select class="input_U" id="role_user" name = "role_user" onchange="ValidateRoleUser();">
														<option <?=$role_user=='Administrateur'?'selected="selected"':'';?> value="Administrateur" selected>Administrateur</option>
														<option <?=$role_user=='Utilisateur'?'selected="selected"':'';?> value="Utilisateur">Utilisateur</option>
												</select>
											</th>
                                            <td><input type="hidden" id="RoleUser_error" name="RoleUser_error" value ="0"/></td>
										</tr>
                                        <tr>
											<th class="m-0 font-weight-bold text-dark">Etat du compte : </th>
											<th class="m-0 font-weight-bold text-dark">
												<select class="input_U" id="confirme" name = "confirme">
														<option <?=$confirme=='0'?'selected="selected"':'';?> value="0" selected>Non Activé</option>
														<option <?=$confirme=='1'?'selected="selected"':'';?> value="1">Activé</option>
												</select>
											</th>
										</tr>
										<tr>
                                            <th><input class = "input_U" type="hidden" name="password_user" value="<?php echo $password_user ; ?>"></th>
											<th><input class = "input_U" type="hidden" name="verifpassword_user" value="<?php echo $password_user ; ?>"></th>
											<th><input class = "input" type="hidden" name="confirmation_key" value="<?php echo $confirmation_key ; ?>"></th>
										</tr>
                                </table>
                            </tr>
                            <td>
                                <table style="vertical-align:top ; "> 
                                    <br>    
                                    
                                    <tr>
                                        <th><input class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style = "padding:10px 30px 10px 30px;" type="submit" name="ajouter_utilisateur" onclick ="ValidateAll();" value="Ajouter Utilisateur"></th>
                                        <th><input class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style = "padding:10px 30px 10px 30px;" type="submit" name="modifier_utilisateur" onclick ="ValidateAll();" value="Modifier Utilisateur"></th>
                                        <th><input class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style = "padding:10px 30px 10px 30px;" type="submit" name="supprimer_utilisateur" value="Supprimer Utilisateur"></th>
                                        <th><input class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style = "padding:10px 30px 10px 30px;" type="submit" name="rechercher_utilisateur" value="Rechercher Utilisateur"></th>
                                        <th><input class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style = "padding:10px 30px 10px 30px;" type="submit" name="reinitialiser" value="Réinitialiser" ></th>
                                    </tr>
                                </form>     
                                </table>	
                            </td>
                            <hr>
                            <td>
                            <?php } 
                                include_once '../config.php' ; 
                                include 'ajouterUtilisateur.php' ;
                                include 'modifierUtilisateur.php' ;
                                include 'supprimerUtilisateur.php' ;
                                include 'afficherUtilisateur.php' ;	
                                    }
						}	
                        ?>
                    <p id="erreur" name = "error" style="color:red; font-weight:bold; font-size:14px;"><?php echo $error ?></p>
                    <p id="succes" name = "succes" style="color:green; font-weight:bold; font-size:14px;"><?php echo $succes ?></p>
                </td>
                        </table>
                        </div>
						
                    </div>
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
<?php
ob_end_flush();
                    ?>
