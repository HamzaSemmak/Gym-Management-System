<?php require_once("../../Config/Packages.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Files CSS -->
    <link rel="stylesheet" href="../../asset/Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/Home.css">
    <link rel="stylesheet" href="../Css/Index-Packages.css">
    <!-- Fontawesopme icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Gym Management System/Packages</title>
</head>
<body id="body-pd">
    <header class="header bg-light" id="header">
        <div class="header_toggle text-black"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div><span>Packages</span></div>
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
                    <a href="../Membre/index.php" class="nav_link"> 
                        <i class="bi bi-people"></i>
                        <span class="nav_name">Member</span> 
                    </a>
                    <a href="../Trainers/index.php" class="nav_link"> 
                        <i class="bi bi-person-circle"></i>
                        <span class="nav_name">Trainers</span> 
                    </a>
                    <a href="../Packages-/index.php" class="nav_link active"> 
                        <i class="bi bi-box2-fill"></i>
                        <span class="nav_name">Packages</span> 
                    </a>
                </div>
            </div> 
            <a href="../Auth/Login.php" class="nav_link"> 
                <i class='bx bx-log-out nav_icon'></i> 
                <span class="nav_name">
                    Log-out
                </span> 
            </a>
        </nav>
    </div>
    <div class="p-2">
            <?php 
            if(isset($_SESSION['Start'])) {
                echo $_SESSION['Start'];
                unset($_SESSION['Start']);
            }
            else if(isset($_SESSION['Edit'])) {
                echo $_SESSION['Edit'];
                unset($_SESSION['Edit']);
            }
            else if(isset($_SESSION['Join'])) {
                echo $_SESSION['Join'];
                unset($_SESSION['Join']);
            }
        ?>
    </div>
    <!--Container Main start-->
    <div class="bg-white p-3">
        <div class="row">
            <div class="col-8 shadow">
                <div class="row">
                    <nav class="navbar col-12 bg-light p-2 rounded">
                        <a class="navbar-brand fw-bolder h5"> Packages </a>
                        <a href="" class="d-flex"> <i class="bi bi-box2-fill"></i> </a>
                    </nav>
                    <div class="col h6 p-2">
                        <div class="container">
                            <div class="row">
                                    <?php $Packages->Package_Lists(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-3 h-50 d-inline-block shadow">
                <div class="row">
                    <div class="col-12 bg-light navbar p-2 rounded">
                        <a class="navbar-brand fw-bolder h5">Add Packages</a>
                        <a class="d-flex"> <i class="bi bi-plus-lg"></i> </a>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col p-3"> 
                            <div class="row text-center">
                                <div class="mb-3 col">
                                    <label>Title<span class="text-danger">*</span></label>
                                    <input type="text" name="Title" class="form-control text-center" placeholder="Enter Full Name" required>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="mb-3 col">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea name="Description" class="form-control" required>

                                    </textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label>Amount <span class="text-danger">*</span></label>
                                    <input type="number" name="Traif" class="form-control text-center" placeholder="Amount" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label>Term (Durée) <span class="text-danger">*</span></label>
                                    <input type="number" name="Durée_Trainaing" class="form-control text-center" placeholder="Term" required>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="mb-3 col">
                                    <label>Numero Trainer<span class="text-danger">*</span></label>
                                    <select name="Num_Trainer" class="form-control text-center" required>
                                        <option value="" disabled selected> Choose Numero Trainers</option>
                                        <?php $Packages->Remplir_Box2() ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <p class="text-center">
                                <?php $Packages->Create(); ?>    
                            </p>
                            <div class="row">
                                <div class="col mb-3 float-end">
                                    <button class="btn btn-primary float-end shadow" name="Create"> <i class="bi bi-plus-lg"></i> </button>
                                </div>
                            </div>
                        </div>
                    </form>
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
