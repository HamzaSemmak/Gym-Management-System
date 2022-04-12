<?php
    require_once("../../Config/Login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System/log-in</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../asset//Css/bootstrap.css">
    <link rel="stylesheet" href="../Css/Login.css">
</head>
<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="../../asset/Img/Fitness-Cym-Picture.png" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h2 class="p-4 text-primary"> Log-in </h2>
                    <form method="POST" action="">
                        <div class="form-outline mb-4">
                            <input type="email" name="Email" id="form1Example13" class="form-control form-control-lg" required/>
                            <label class="form-label" for="form1Example13">Email :</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" name="Password" id="form1Example23" class="form-control form-control-lg" required/>
                            <label class="form-label" for="form1Example23">Password</label>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                <label class="form-check-label" for="form1Example3"> Remember me </label>
                            </div>
                        </div> <br> <br>
                        <button type="submit" class="btn btn-primary float-end p-2" name="Login">Log-in</button>
                        <div class="text-danger h6 text-center">  <?php $Login->Login();?> </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- JS -->
    <script src="../../asset/Js/Pooper.min.js"></script>
    <script src="../../asset/Js/jquery-3.6.0.min.js"></script>
    <script src="../../asset/Js/bootstrap.min.js"></script>
    <script src="../Js/Login.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>