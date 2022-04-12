<?php
    require_once('Home.php');
    session_start();
    class Trainers extends Config_Database {

        public function Trainers_List() {
            if(isset($_POST['Trainers_List'])) {
                $cmd = $this->con->prepare("SELECT * FROM Trainers");
                $cmd->execute();
                $Result = $cmd->get_result();
                while($row = $Result->fetch_assoc()) { 
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $row['Num_Trainer'] . "</td>";
                    echo "<td>" . $row['Fullname'] . "</td>";
                    echo "<td>" . $row['Date_Naissance'] . "</td>";
                    echo "<td>" . $row['Adresse'] . "</td>";
                    echo "<td>";
                    echo "<a href='Delete.php?DeleteID=" . $row['Num_Trainer'] . "' class='btn btn-danger'><i class='bi bi-trash'></i></a> " ;
                    echo "<a href='Show.php?ShowID=" . $row['Num_Trainer'] . "' class='btn btn-info'><i class='bi bi-eye'></i></a> " ;
                    echo "<a href='Update.php?EditID=" . $row['Num_Trainer'] . "' class='btn btn-success'><i class='bi bi-gear'></i></a> " ;
                    echo "</td>";
                    echo "</tr>";
                    echo "</tbody>";
                }
            }
            else if(isset($_REQUEST['Search'])) {
                $A = $_POST['Fullname'] ;
                $Query = "SELECT * FROM Trainers WHERE Fullname='$A'";
                $Result = mysqli_query($this->con , $Query);
                $row = mysqli_fetch_array($Result);
                if(mysqli_num_rows($Result) == 1) {
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $row['Num_Trainer'] . "</td>";
                    echo "<td>" . $row['Fullname'] . "</td>";
                    echo "<td>" . $row['Date_Naissance'] . "</td>";
                    echo "<td>" . $row['Adresse'] . "</td>";
                    echo "<td>";
                    echo "<a href='Delete.php?DeleteID=" . $row['Num_Trainer'] . "' class='btn btn-danger'><i class='bi bi-trash'></i></a> " ;
                    echo "<a href='Show.php?ShowID=" . $row['Num_Trainer'] . "' class='btn btn-info'><i class='bi bi-eye'></i></a> " ;
                    echo "<a href='Update.php?EditID=" . $row['Num_Trainer'] . "' class='btn btn-success'><i class='bi bi-gear'></i></a> " ;
                    echo "</td>";
                    echo "</tr>";
                    echo "</tbody>";
                }
                else{
                    echo "<div class='alert alert-danger text-center'> This Trainers dons't exist </div>";
                }
            }
            else {
                $cmd = $this->con->prepare("SELECT * FROM Trainers");
                $cmd->execute();
                $Result = $cmd->get_result();
                while($row = $Result->fetch_assoc()) { 
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $row['Num_Trainer'] . "</td>";
                    echo "<td>" . $row['Fullname'] . "</td>";
                    echo "<td>" . $row['Date_Naissance'] . "</td>";
                    echo "<td>" . $row['Adresse'] . "</td>";
                    echo "<td>";
                    echo "<a href='Delete.php?DeleteID=" . $row['Num_Trainer'] . "' class='btn btn-danger'><i class='bi bi-trash'></i></a> " ;
                    echo "<a href='Show.php?ShowID=" . $row['Num_Trainer'] . "' class='btn btn-info'><i class='bi bi-eye'></i></a> " ;
                    echo "<a href='Update.php?EditID=" . $row['Num_Trainer'] . "' class='btn btn-success'><i class='bi bi-gear'></i></a> " ;
                    echo "</td>";
                    echo "</tr>";
                    echo "</tbody>";
                }
            }
            mysqli_close($this->con);
        }

        public function Create_Trainer() {
            if(isset($_REQUEST['Create'])) {
                $ID = "";
                $FullName = mysqli_real_escape_string($this->con,$_POST['Fullname']);
                $Date_Naissance = mysqli_real_escape_string($this->con,$_POST['Date_Naissance']);
                $Adresse = mysqli_real_escape_string($this->con,$_POST['Adresse']);
                $Email = mysqli_real_escape_string($this->con,$_POST['Email']);
                $Telephone = mysqli_real_escape_string($this->con,$_POST['Telephone']);
                $Genre = mysqli_real_escape_string($this->con,$_POST['Genre']);
                $Cin_Trainers = mysqli_real_escape_string($this->con,$_POST['Cin_Trainers']);
                $Ville_Trainers = mysqli_real_escape_string($this->con,$_POST['Ville_Trainers']);
                $Dtae_Join = date('Y-m-d H:i:s');
                //Valisdate 
                $cmd = $this->con->prepare("SELECT * FROM Trainers");
                $cmd->execute();
                $Result = $cmd->get_result();
                $row = $Result->fetch_assoc();
                //
                $Query = "INSERT INTO Trainers VALUES('$ID' , '$FullName' , '$Date_Naissance' , '$Adresse' , '$Email' , '$Telephone' , '$Genre' , '$Cin_Trainers' , '$Ville_Trainers' ,'$Dtae_Join')";
                if(mysqli_query($this->con , $Query)) {
                    if($Genre == "Chose Your Genre" or $Email == "") {
                        echo "<p class='text-danger text-center'> Error in Gender :  You have too check your gender</p>";
                    } 
                    else if($row['Email'] == $Email) {
                        echo "<p class='text-danger text-center'> Error in Email : Email already exists </p>";
                    }
                    else {
                        $_SESSION['Start'] = "<p class='alert alert-success'> Trainer added successfly. </p>";
                    echo "<script> window.location.href='index.php'; </script>";
                    }
                    
                }
                else {
                    echo "<p class='alert alert-danger'> Error </p>";
                }
            }
            mysqli_close($this->con);
        }

        public function Delete_Trainers() {
            $ID = $_GET['DeleteID'];
            if(isset($_REQUEST['DeleteID'])) {
                $Delete = "DELETE FROM Trainers WHERE Num_Trainer='$ID' ";
                if(mysqli_query($this->con , $Delete)) {
                    echo "<script> window.location.href='index.php'; </script>";
                }
                else {
                    echo "<div class='alert alert-danger'> Error : could not Delete -> " . mysqli_error($this->con) . "div>";
                }
            }
            mysqli_close($this->con);
        }

        public function Return_Data(int $N) {
            if(isset($_GET['EditID'])) {
                $ID = $_GET['EditID'];
                $cmd = " SELECT * FROM Trainers WHERE Num_Trainer='$ID' ";
                $result = mysqli_query($this->con, $cmd);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        return $row[$N];
                    }
                }
            }
            mysqli_close($this->con);
        }

        public function Edit_Trainers() {
            if(isset($_POST['Edit'])) {
                $ID = $_GET['EditID'];
                $FullName = mysqli_real_escape_string($this->con,$_POST['Fullname']);
                $Date_Naissance = mysqli_real_escape_string($this->con,$_POST['Date_Naissance']);
                $Adresse = mysqli_real_escape_string($this->con,$_POST['Adresse']);
                $Email = mysqli_real_escape_string($this->con,$_POST['Email']);
                $Telephone = mysqli_real_escape_string($this->con,$_POST['Telephone']);
                $Genre = mysqli_real_escape_string($this->con,$_POST['Genre']);
                $Cin_Trainers = mysqli_real_escape_string($this->con,$_POST['Cin_Trainers']);
                $Ville_Trainers = mysqli_real_escape_string($this->con,$_POST['Ville_Trainers']);
                $Query = "UPDATE Trainers SET FullName='$FullName',Email='$Email',Date_Naissance='$Date_Naissance',Adresse='$Adresse', Genre='$Genre', Cin_Trainers='$Cin_Trainers', Telephone='$Telephone', Ville_Trainers='$Ville_Trainers' WHERE Num_Trainer='$ID' ";
                if(mysqli_query($this->con , $Query)) {
                    $_SESSION['Edit'] = "<p class='alert alert-success'> Trainer Updated successfly. </p>";
                    echo "<script> window.location.href='index.php'; </script>";
                }
                else {
                    echo "<p class='alert alert-danger'> ERROR: Could not able to Update </p>";
                }
                mysqli_close($this->con);
            }
        }

        public function Show_Trainers(int $N) {
            if(isset($_GET['ShowID'])) {
                $ID = $_GET['ShowID'];
                $cmd = " SELECT * FROM Trainers WHERE Num_Trainer='$ID' ";
                $result = mysqli_query($this->con, $cmd);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        return $row[$N];
                    }
                }
            }
            mysqli_close($this->con);
        }
                /*
    Num_Trainer int primary key auto_increment,
    Fullname varchar(255),
    Date_Naissance date,
    Adresse varchar(255),
    Email varchar(255),
    Telephone int,
    Genre varchar(20),
    Cin_Trainers varchar(20) unique,
    Ville_Trainers varchar(100),*/

    }

    $Trainers = new Trainers();
?>