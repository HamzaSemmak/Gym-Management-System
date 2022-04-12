<?php
    require_once("Config_DB.php");

    class Login extends Config_Database {
        
        public function Login() {
            if(isset($_REQUEST['Login'])) {
                $A = $_POST['Email'] ;
                $B = $_POST['Password'];
                $Query = "SELECT * FROM Utulisateur WHERE Email='$A' AND MotDePasse='$B' limit 1 ";
                $Result = mysqli_query($this->con , $Query);
                $row = mysqli_fetch_array($Result);
                if(mysqli_num_rows($Result) == 1) {
                    header("location: ../Home.php?Email=".$A);
                }
                else {
                    echo "Error : email or password is incorrect please check again";
                }
                mysqli_close($this->con);
            } 
        } 
    }
    $Login = new Login();
?>
