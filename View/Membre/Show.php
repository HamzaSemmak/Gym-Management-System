<?php require_once("../../Config/Membre.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Files CSS -->
    <link rel="stylesheet" href="../../asset/Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/Home.css">
    <link rel="stylesheet" href="../Css/Index-Menber.css">
    <!-- Fontawesopme icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Gym Management System/Member</title>
</head>
<body id="body-pd">
    <header class="header bg-light" id="header">
        <div class="header_toggle text-black"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div><span>Member</span></div>
        <div class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
            Administrator
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo">
                    <i class='bx bx-layer nav_logo-icon'></i> 
                    <span class="nav_logo-name">GOLD GYM</span> 
                </a>
                <div class="nav_list"> 
                    <a href="../Home.php" class="nav_link"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a>
                    <a href="#" class="nav_link active" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> 
                        <i class="bi bi-people"></i>
                        <span class="nav_name">Member</span> 
                    </a>
                    <a href="../Trainers/index.php" class="nav_link"> 
                        <i class="bi bi-person-circle"></i>
                        <span class="nav_name">Trainers</span> 
                    </a>
                    <a href="../Packages-/index.php" class="nav_link"> 
                        <i class="bi bi-box2-fill"></i>
                        <span class="nav_name">Packages</span> 
                    </a>
                </div>
            </div> 
            <a href="./Auth/Login.php" class="nav_link"> 
                <i class='bx bx-log-out nav_icon'></i> 
                <span class="nav_name">
                    Log-out
                </span> 
            </a>
        </nav>
    </div>

    <!--Container Main start shadow-->
    <div class="bg-white">
        <div class="container">
			<div class="row">
				<div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
					<div class="profile-card card rounded-lg shadow p-4 p-xl-5 mb-4 text-center position-relative overflow-hidden">
						<div class="banner"></div>
						<img src="../../asset/img/undraw_male_avatar_323b.png" width="45%" height="45%" alt="" class="img-circle mx-auto mb-3">
						<h3 class="mb-4"> <?php echo $Membre->Show_Member(1) ?> </h3>
                        <hr class="badge-primary mt-0">
						<div class="text-left mb-4">
							<p class="mb-2"> <i class="bi bi-123 float-start"></i> <?php echo $Membre->Show_Member(0) ?>  </p>
                            <p class="mb-2"> <i class="bi bi-calendar-date float-start"></i> <?php echo $Membre->Show_Member(2) ?> </p>
                            <p class="mb-2"> <i class="bi bi-house float-start"></i>  <?php echo $Membre->Show_Member(3) ?> </p>
                            <p class="mb-2"> <i class="bi bi-gender-trans float-start"></i> <?php echo $Membre->Show_Member(4) ?> </p>
                            <p class="mb-2"> <i class="bi bi-person-badge float-start"></i> <?php echo $Membre->Show_Member(5) ?> </p>
                            <p class="mb-2"> <i class="bi bi-phone float-start"></i> <?php echo $Membre->Show_Member(6) ?> </p>
                            <p class="mb-2"> <i class="bi bi-geo-alt-fill float-start"></i> <?php echo $Membre->Show_Member(7) ?> </p>
                            <br>
                            <p class="mb-2"> <?php echo $Membre->Show_Member(8) ?> </p>
						</div>
                        <a href="index.php" class="btn btn-primary float-start"> <i class="bi bi-arrow-return-left"></i> </a>                        
					</div>
				</div>
			</div>
		</div>
    </div>
    
    


    <!-- Bootstrap Files Js  -->
    <script src="../../asset/Js/jquery-3.6.0.min.js"></script>
    <script src="../../asset/Js/Pooper.min.js"></script>
    <script src="../../asset/Js/bootstrap.min.js"></script>
    <script src="../Js/Home.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>
