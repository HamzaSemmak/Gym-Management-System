<?php require_once("../../Config/Trainers.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Files CSS -->
    <link rel="stylesheet" href="../../asset/Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/Home.css">
    <link rel="stylesheet" href="../Css//Index-Trainers.css">
    <!-- Fontawesopme icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Gym Management System/Trainers</title>
</head>
<body id="body-pd">
    <header class="header bg-light" id="header">
        <div class="header_toggle text-black"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div><span>Trainers</span></div>
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
                    <a href="#" class="nav_link active"> 
                        <i class="bi bi-person-circle"></i>
                        <span class="nav_name">Trainers</span> 
                    </a>
                    <a href="../Packages-/index.php" class="nav_link"> 
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

    <!--Container Main start-->
    <div class="bg-white p-5">
        <div class="row">
            <div class="col-8 shadow">
                <div class="row">
                    <nav class="col-12 bg-light p-2 rounded text-center">
                        <a class="navbar-brand fw-bolder h5">Trainers-List</a>
                    </nav>
                    <div class="col h6">
                        <nav class="navbar">
                            <div class="container-fluid">
                                <a class="navbar-brand"> <i class="bi bi-people"></i> </a>
                                <form class="d-flex" method="POST">
                                    <button class="btn btn-primary" name="Trainers_List"> <i class="bi bi-arrow-repeat"></i> </button> 
                                    &nbsp; &nbsp;
                                    <a href="Create.php" class="btn btn-success" > <i class="bi bi-plus-lg"></i> </a>
                                </form>
                            </div>
                        </nav>
                        <br>
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
                            ?>
                        </div>
                        <table class="table table-hover table-rounded table-borderless text-center">
                            <thead class="bg-light">
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Date-Naissance</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <?php $Trainers->Trainers_List(); ?>
                        </table>
                    </div>
                </div>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-3 h-25 d-inline-block shadow">
                <div class="row">
                    <div class="col-12 bg-light p-2 rounded text-center">
                        <a class="navbar-brand fw-bolder h5">Search</a>
                    </div>
                    <div class="col p-3"> 
                        <form method="POST">
                            <input type="text" name="Fullname" class="form-control text-center" placeholder="Full-Name" required>
                            <br>
                            <button name="Search" class="btn btn-primary d-flex">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
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
