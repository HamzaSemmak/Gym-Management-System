<?php
    require_once("../Config/Home.php");
    require_once("../Config/Type-Abonnement.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Files CSS -->
    <link rel="stylesheet" href="../asset/Css/bootstrap.min.css">
    <link rel="stylesheet" href="./Css/Home.css">
    <!-- Fontawesopme icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Gym Management System</title>
</head>
<body id="body-pd">
    <header class="header bg-light" id="header">
        <div class="header_toggle text-black"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div><span>Dashboard</span></div>
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
                    <a href="Home.php" class="nav_link active"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a>
                    <a href="./Membre/index.php" class="nav_link"> 
                        <i class="bi bi-people"></i>
                        <span class="nav_name">Member</span> 
                    </a>
                    <a href="./Trainers/index.php" class="nav_link"> 
                        <i class="bi bi-person-circle"></i>
                        <span class="nav_name">Trainers</span> 
                    </a>
                    <a href="./Packages-/index.php" class="nav_link"> 
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
    <!--Container Main start-->
    <div class="bg-white">
        <div class="p-1">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-header bg-primary text-white">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="col">
                                        <h3 class="disolay-3"> <?php echo $Home->count_Membre(); ?>  </h3>
                                        <h6>Membre</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a href="./Membre/index.php" class="text-black">
                                    View Details <ion-icon name="log-in"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-header bg-primary text-white">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <i class="bi bi-box2-fill"></i>
                                    </div>
                                    <div class="col">
                                        <h3 class="disolay-3"> <?php echo $Home->Count_Packages() ?> </h3>
                                        <h6>Packages</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a href="./Packages-/index.php" class="text-black">
                                    View Details <ion-icon name="log-in"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-header bg-primary text-white">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <i class="bi bi-person-circle"></i>
                                    </div>
                                    <div class="col">
                                        <h3 class="disolay-3"> <?php echo $Home->Count_Trainers() ?> </h3>
                                        <h6>Trainer</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a href="./Trainers/index.php" class="text-black">
                                    View Details <ion-icon name="log-in"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-header bg-primary text-white">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <i class="bi bi-file-earmark-person-fill"></i>
                                    </div>
                                    <div class="col">
                                        <h3 class="disolay-3"> GYM </h3>
                                        <h6>About-us</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <a href="../Error.php" class="text-black">
                                    View Details <ion-icon name="log-in"></ion-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <div class="bg-white p-5 mt-4">
            <?php
                if(isset($_SESSION['Start'])) {
                    echo $_SESSION['Start'];
                    unset($_SESSION['Start']);
                }
            ?>
            <div class="row">
                <div class="col-8 shadow">
                    <div class="row bg-light">
                        <nav class="col-12 bg-primary p-2 text-center">
                            <a class="navbar-brand fw-bolder text-white h5">System Abonnement</a>
                        </nav>
                        <div class="col h6 mt-2">
                            <form action="" method="POST" class="mt-5">
                                <div class="row">
                                    <div class="mb-3 col-md-5">
                                        <label>Type-Abonnement <span class="text-danger">*</span></label>
                                        <select name="Type_Abonnement" class="form-control text-center">
                                            <option disabled> Choose your Abonnement</option>
                                            <option value="1 Month => 150 DHS"> 1 Month => 150 DHS </option>
                                            <option value="2 Month => 250 DHS"> 2 Month => 250 DHS </option>
                                            <option value="3 Month => 800 DHS"> 3 Month => 800 DHS </option>
                                            <option value="6 Month => 750 DHS"> 6 Month => 750 DHS </option>
                                            <option value="1 Year => 1400 DHS"> 1 Year => 1400 DHS </option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3 col-md-5">
                                        <label>Date-Debut<span class="text-danger">*</span></label>
                                        <input type="Date" name="Date_Debut" class="form-control" required>
                                    </div>

                                    <div class="mb-3 col-md-5">
                                        <label>Date_fin<span class="text-danger">*</span></label>
                                        <input type="Date" name="Date_fin" class="form-control" required>
                                    </div>

                                    <div class="mb-3 col-md-5">
                                        <label>N°Membre<span class="text-danger">*</span></label>
                                        <select name="Num_Membre" class="form-control text-center" required>
                                            <option disabled selected>  Choose N°Membre </option>
                                            <?php $Type_Abonnement->Remplir_Box(); ?>
                                        </select>
                                    </div>

                                    <div class="mt-2">
                                        <?php $Type_Abonnement->Create(); ?>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <button class="btn btn-primary float-end shadow" name="Create"> <i class="bi bi-plus-lg"></i> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <div class="col h-25 d-inline-block shadow">
                    <div class="row bg-light">
                        <nav class="col-12 bg-primary p-2 text-center">
                            <a class="navbar-brand fw-bolder text-white h5">Check Abonnement </a>
                        </nav>
                        <div class="col h6 p-5">
                            <form method="POST">
                                <label>Fullname<span class="text-danger">*</span></label>
                                <select name="Fullname" class="form-control text-center" required>
                                    <option disabled selected>  Choose N°Membre </option>
                                    <?php $Type_Abonnement->GetName() ?>
                                </select>
                                <br>
                                <label>Date-Debut<span class="text-danger">*</span></label>
                                <input type="Date" name="Date_Debut" class="form-control" required>
                                <br>
                                <label>Date_fin<span class="text-danger">*</span></label>
                                <input type="Date" name="Date_fin" class="form-control" required>
                                <br>
                                <button name="Search" class="btn btn-primary d-flex">
                                    <i class="bi bi-search"></i>
                                </button>

                                <div class="mt-2">
                                    <?php $Type_Abonnement->Search(); ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Files Js  -->
    <script src="../asset/Js/jquery-3.6.0.min.js"></script>
    <script src="../asset/Js/Pooper.min.js"></script>
    <script src="../asset/Js/bootstrap.min.js"></script>
    <script src="./Js/Home.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>
