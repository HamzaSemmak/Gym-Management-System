<?php
    require_once("Config_DB.php");
    session_start();
    class Membre extends Config_Database {
        
        public function Member_List() {
            if(isset($_POST['Member_List'])) {
                $cmd = $this->con->prepare("SELECT * FROM Membre");
                $cmd->execute();
                $Result = $cmd->get_result();
                while($row = $Result->fetch_assoc()) { 
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $row['Num_Membre'] . "</td>";
                    echo "<td>" . $row['FullName'] . "</td>";
                    echo "<td>" . $row['Date_Naissance'] . "</td>";
                    echo "<td>" . $row['Adresse_Membre'] . "</td>";
                    echo "<td>";
                    echo "<a href='Delete.php?DeleteID=" . $row['Num_Membre'] . "' class='btn btn-danger'><i class='bi bi-trash'></i></a> " ;
                    echo "<a href='Show.php?ShowID=" . $row['Num_Membre'] . "' class='btn btn-info'><i class='bi bi-eye'></i></a> " ;
                    echo "<a href='Update.php?EditID=" . $row['Num_Membre'] . "' class='btn btn-success'><i class='bi bi-gear'></i></a> " ;
                    echo "</td>";
                    echo "</tr>";
                    echo "</tbody>";
                }
            }
            else if(isset($_REQUEST['Search'])) {
                $A = $_POST['Fullname'] ;
                $Query = "SELECT * FROM Membre WHERE FullName='$A'";
                $Result = mysqli_query($this->con , $Query);
                $row = mysqli_fetch_array($Result);
                if(mysqli_num_rows($Result) == 1) {
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $row['Num_Membre'] . "</td>";
                    echo "<td>" . $row['FullName'] . "</td>";
                    echo "<td>" . $row['Date_Naissance'] . "</td>";
                    echo "<td>" . $row['Adresse_Membre'] . "</td>";
                    echo "<td>";
                    echo "<a href='Delete.php?DeleteID=" . $row['Num_Membre'] . "' class='btn btn-danger'><i class='bi bi-trash'></i></a> " ;
                    echo "<a href='Show.php?ShowID=" . $row['Num_Membre'] . "' class='btn btn-info'><i class='bi bi-eye'></i></a> " ;
                    echo "<a href='Update.php?EditID=" . $row['Num_Membre'] . "' class='btn btn-success'><i class='bi bi-gear'></i></a> " ;
                    echo "</td>";
                    echo "</tr>";
                    echo "</tbody>";
                }
                else{
                    echo "<div class='alert alert-danger text-center'> This Member dons't exist </div>";
                }
            }
            else {
                $cmd = $this->con->prepare("SELECT * FROM Membre");
                $cmd->execute();
                $Result = $cmd->get_result();
                while($row = $Result->fetch_assoc()) { 
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $row['Num_Membre'] . "</td>";
                    echo "<td>" . $row['FullName'] . "</td>";
                    echo "<td>" . $row['Date_Naissance'] . "</td>";
                    echo "<td>" . $row['Adresse_Membre'] . "</td>";
                    echo "<td>";
                    echo "<a href='Delete.php?DeleteID=" . $row['Num_Membre'] . "' class='btn btn-danger'><i class='bi bi-trash'></i></a> " ;
                    echo "<a href='Show.php?ShowID=" . $row['Num_Membre'] . "' class='btn btn-info'><i class='bi bi-eye'></i></a> " ;
                    echo "<a href='Update.php?EditID=" . $row['Num_Membre'] . "' class='btn btn-success'><i class='bi bi-gear'></i></a> " ;
                    echo "</td>";
                    echo "</tr>";
                    echo "</tbody>";
                }
            }
            mysqli_close($this->con);
        }

        public function Delete_Membre() {
            $ID = $_GET['DeleteID'];
            if(isset($_REQUEST['DeleteID'])) {
                $Delete = "DELETE FROM Membre WHERE Num_Membre='$ID' ";
                if(mysqli_query($this->con , $Delete)) {
                    echo "<script> window.location.href='index.php'; </script>";
                }
                else {
                    echo "<div class='alert alert-danger'> Error : could not Delete -> " . mysqli_error($this->con) . "div>";
                }
            }
            mysqli_close($this->con);
        }

        public function Create_Membre() {
            if(isset($_REQUEST['Create'])) {
                $ID = "";
                $FullName = mysqli_real_escape_string($this->con,$_POST['FullName']);
                $Date_Naissance = mysqli_real_escape_string($this->con,$_POST['Date_Naissance']);
                $Adresse_Membre = mysqli_real_escape_string($this->con,$_POST['Adresse_Membre']);
                $Genre = mysqli_real_escape_string($this->con,$_POST['Genre']);
                $Cin_Membre = mysqli_real_escape_string($this->con,$_POST['Cin_Membre']);
                $Telephone = mysqli_real_escape_string($this->con,$_POST['Telephone']);
                $Ville_Membre = mysqli_real_escape_string($this->con,$_POST['Ville_Membre']);
                $Dtae_Join = date('Y-m-d H:i:s');
                $Query = "INSERT INTO Membre VALUES('$ID' , '$FullName' , '$Date_Naissance' , '$Adresse_Membre' , '$Genre' , '$Cin_Membre' , '$Telephone' , '$Ville_Membre' , '$Dtae_Join')";
                if(mysqli_query($this->con , $Query)) {
                    $_SESSION['Start'] = "<p class='alert alert-success'> Member added successfly. </p>";
                    echo "<script> window.location.href='index.php'; </script>";
                }
                else {
                    echo "<p class='alert alert-danger'> Error could not add this Member, Please check data </p>";
                }
            }
            mysqli_close($this->con);
        }

        public function Return_Data(int $N) {
            if(isset($_GET['EditID'])) {
                $ID = $_GET['EditID'];
                $cmd = " SELECT * FROM Membre WHERE Num_Membre='$ID' ";
                $result = mysqli_query($this->con, $cmd);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        return $row[$N];
                    }
                }
            }
            mysqli_close($this->con);
        }

        public function Edit_Membre() {
            if(isset($_POST['Edit'])) {
                $ID = $_GET['EditID'];
                $FullName = $_POST['FullName'];
                $Date_Naissance = $_POST['Date_Naissance'];
                $Adresse_Membre = $_POST['Adresse_Membre'];
                $Genre = $_POST['Genre'];
                $Cin_Membre = $_POST['Cin_Membre'];
                $Telephone = $_POST['Telephone'];
                $Ville_Membre = $_POST['Ville_Membre'];
                $Query = "UPDATE Membre SET FullName='$FullName',Date_Naissance='$Date_Naissance',Adresse_Membre='$Adresse_Membre', Genre='$Genre', Cin_Membre='$Cin_Membre', Telephone='$Telephone', Ville_Membre='$Ville_Membre' WHERE Num_Membre='$ID' ";
                if(mysqli_query($this->con , $Query)) {
                    $_SESSION['Edit'] = "<p class='alert alert-success'> Member Updated successfly. </p>";
                    echo "<script> window.location.href='index.php'; </script>";
                }
                else {
                    echo "<p class='alert alert-danger'> ERROR: Could not able to Update </p>";
                }
                mysqli_close($this->con);
            }
        }

        public function Show_Member(int $N) {
            if(isset($_GET['ShowID'])) {
                $ID = $_GET['ShowID'];
                $cmd = " SELECT * FROM Membre WHERE Num_Membre='$ID' ";
                $result = mysqli_query($this->con, $cmd);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        return $row[$N];
                    }
                }
            }
            mysqli_close($this->con);
        }

    }
    $Membre = new Membre();
    
?>