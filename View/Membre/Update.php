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

    <!--Container Main start-->
    <div class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="signup-form">
                        <form method="POST" class="mt-5 border p-4 bg-light shadow">
                            <h4 class="mb-8 text-secondary">Edit Member</h4>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label>Full-Name<span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $Membre->Return_Data(1); ?>" name="FullName" class="form-control" placeholder="Enter Full Name" required>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Date-Naissance<span class="text-danger">*</span></label>
                                    <input type="date" value="<?php echo $Membre->Return_Data(2); ?>" name="Date_Naissance" class="form-control" >
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Adresse<span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo $Membre->Return_Data(3); ?>" name="Adresse_Membre" class="form-control" placeholder="Enter Your Adresse" required>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Cin<span class="text-danger">*</span></label>
                                    <input type="text" name="Cin_Membre" value="<?php echo $Membre->Return_Data(5); ?>" class="form-control" placeholder="Enter Cin" required>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Telephone<span class="text-danger">*</span></label>
                                    <input type="number" name="Telephone" value="<?php echo $Membre->Return_Data(6); ?>" class="form-control" placeholder="Enter Phone Number" required>
                                </div> 

                                <div class="mb-3 col-md-6">
                                    <label>Ville<span class="text-danger">*</span></label>
                                    <input type="text" name="Ville_Membre" value="<?php echo $Membre->Return_Data(7); ?>" class="form-control" placeholder="Enter Your Ville" required>
                                </div> 

                                <div class="mb-3 col-md-6">
                                    <label>Genre<span class="text-danger">*</span></label>
                                    <select name="Genre" required class="form-control">
                                        <option value="<?php echo $Membre->Return_Data(4); ?>" selected> <?php echo $Membre->Return_Data(4); ?> </option>
                                        <option value="Chose Your Genre" disabled> Chose Your New Genre</option>
                                        <option value="Male"> Male </option>
                                        <option value="Female"> Female </option>
                                    </select>
                                </div>

                                <div class="mb-3 col-md-8">
                                    <?php $Membre->Edit_Membre(); ?>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <a href="index.php" class="btn btn-success float-start shadow"> <i class="bi bi-arrow-return-left"></i> </a>
                                    <button class="btn btn-primary float-end shadow" name="Edit"> <i class='bi bi-gear'></i> </button>
                                </div>
                            </div>
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
