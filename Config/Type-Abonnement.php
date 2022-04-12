<?php
    require_once('Config_DB.php');
    session_start();
    class Type_Abonnement extends Config_Database {

        public function Remplir_Box() {
            $cmd = $this->con->prepare("SELECT * FROM Membre;");
            $cmd->execute();
            $Result = $cmd->get_result();
            while($row = $Result->fetch_assoc()) {
                echo "<option value=" . $row['Num_Membre'] . ">" . $row['Num_Membre'] . "</option>";
            }
        }

        public function GetName() {
            $cmd = $this->con->prepare("SELECT Fullname FROM Membre;");
            $cmd->execute();
            $Result = $cmd->get_result();
            while($row = $Result->fetch_assoc()) {
                echo "<option value=" . $row['Fullname'] . ">" . $row['Fullname'] . "</option>";
            }
        }


        public function Create() {
            if(isset($_POST['Create'])) {
                $Num_Type_Abonnement = "";
                $Type_Abonnement = $_POST['Type_Abonnement'];
                $Date_Debut = $_POST['Date_Debut'];
                $Date_fin =$_POST['Date_fin'];
                $Num_Membre = $_POST['Num_Membre'];
                $Query = "INSERT INTO Type_Abonnement VALUES('$Num_Type_Abonnement' , '$Type_Abonnement' , '$Date_Debut' ,   '$Date_fin' , '$Num_Membre') ";
                if(mysqli_query($this->con , $Query)) {
                    $_SESSION['Start'] = "<p class='alert alert-success'> Abonnement added successfly. </p>";
                    echo "<script> window.location.href='Home.php'; </script>";
                }
                else {
                    echo "<p class='alert alert-danger'> Error could not add this Abonnement, Please check data </p>";
                }
            }
        }

        public function Search() {
            if(isset($_REQUEST['Search'])) {
                $A = $_POST['Fullname'] ;
                $Date_Debut = $_POST['Date_Debut'];
                $Date_fin = $_POST['Date_fin'];
                $Query = "SELECT * FROM Type_Abonnement INNER JOIN  Membre on Type_Abonnement.Num_Membre = Membre.Num_Membre WHERE Fullname = '$A' and Date_fin BETWEEN '$Date_Debut' AND '$Date_fin' ";
                $Result = mysqli_query($this->con , $Query);
                $row = mysqli_fetch_array($Result);
                if(mysqli_num_rows($Result) == 1) {
                    ?>
                        <p class="alert alert-success"> This Membre Has been payed this Month  </p>
                    <?php
                }
                else{
                    echo "<div class='alert alert-danger text-center'> This membre has to paye this month </div>";
                }
            }
        }

    }

    $Type_Abonnement = new Type_Abonnement();
?>