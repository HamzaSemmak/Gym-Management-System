<?php
    require_once('Config_DB.php');
    session_start();
    class Packages extends Config_Database {
        public function Name_Trainer(int $N) {
            $cmd = $this->con->prepare("SELECT * FROM Trainers WHERE Num_Trainer='$N' ");
            $cmd->execute();
            $Result = $cmd->get_result();
            while($row = $Result->fetch_assoc()) { 
                echo $row['Fullname'];
            }
        }

        public function Ville_Et() {
            $cmd = $this->con->prepare(" SELECT * FROM Trainers");
            $cmd->execute();
            $Result = $cmd->get_result();
            $row = $Result->fetch_assoc();
            echo $row["Fullname"];
        }

        public function Remplir_Box() {
            $cmd = $this->con->prepare("SELECT * FROM Membre;");
            $cmd->execute();
            $Result = $cmd->get_result();
            while($row = $Result->fetch_assoc()) {
                echo "<option value=" . $row['Num_Membre'] . ">" . $row['Num_Membre'] . "</option>";
            }
        }

        public function Remplir_Box2() {
            $cmd = $this->con->prepare("SELECT * FROM Trainers;");
            $cmd->execute();
            $Result = $cmd->get_result();
            while($row = $Result->fetch_assoc()) {
                echo "<option value=" . $row['Num_Trainer'] . ">" . $row['Num_Trainer'] . "</option>";
            }
        }

        public function Package_Lists() {
            $cmd = $this->con->prepare("SELECT * FROM Package");
            $cmd->execute();
            $Result = $cmd->get_result();
            while($row = $Result->fetch_assoc()) { 
                //
                $Query = $this->con->prepare("SELECT count(*) FROM Acheter_Package WHERE Num_Package='" . $row['Num_Package'] . "' ");
                $Query->execute();
                $Result1 = $Query->get_result();
                $row1 = $Result1->fetch_assoc();
                //
                ?>
                    <div class="col-4
                    ">
                        <div class="card border shadow">
                            <img src="../../asset/Img/Fitness-Cym-Picture.png" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title h5 fw-bolder text-center"> <?php echo $row['Title'] ?> </div>
                                    <div class="card-text">
                                        <p class="mb-2"> <i class="bi bi-123 float-start">&nbsp;&nbsp;&nbsp;</i> <?php echo $row['Num_Package'] ?> </p>
                                        <p class="mb-2"> <i class="bi bi-person-bounding-box float-start">&nbsp;&nbsp;&nbsp;</i> <?php $this->Name_Trainer($row['Num_Trainer']) ?> </p>
                                        <p class="mb-2"> <i class="bi bi-chat-left-fill float-start"></i>&nbsp;&nbsp;&nbsp; <?php echo $row['Description'] ?> </p>
                                        <p class="mb-2"> <i class="bi bi-cash float-start"></i>&nbsp;&nbsp;&nbsp; <?php echo $row['Traif'] . " DHS" ?> </p>
                                        <p class="mb-2"> <i class="bi bi-alarm float-start"></i>&nbsp;&nbsp;&nbsp; <?php echo $row['Durée_Trainaing'] . "- Hours" ?> </p>

                                        <p class="mb-2"> <i class="bi bi-people"></i> </i>&nbsp;&nbsp;&nbsp; <?php echo $row1['count(*)'] . "- Member" ?> </p>
                                    </div>
                                <div class="card-footer">
                                <?php
                                    echo "<a href='Delete.php?DeleteID=" . $row['Num_Package'] . "' class='btn btn-danger'><i class='bi bi-trash'></i></a> " ;
                                    echo "<a href='Update.php?EditID=" . $row['Num_Package'] . "' class='btn btn-success'><i class='bi bi-gear'></i></a> " ;
                                    echo "<div class='float-end'> ";
                                    echo "<a href='BuyPackage/Show.php?ShowID=" . $row['Num_Package'] . "' class='btn btn-warning text-white'> <i class='bi bi-box-arrow-in-right text-white'></i> &nbsp; Join </a> " ;
                                    echo "</div>";
                                ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php
            }
        }

        public function Delete_Membre() {
            $ID = $_GET['DeleteID'];
            if(isset($_REQUEST['DeleteID'])) {
                $Delete = "DELETE FROM Package WHERE Num_Package='$ID' ";
                if(mysqli_query($this->con , $Delete)) {
                    echo "<script> window.location.href='index.php'; </script>";
                }
                else {
                    echo "<div class='alert alert-danger'> Error : could not Delete -> " . mysqli_error($this->con) . "div>";
                }
            }
            mysqli_close($this->con);
        }
        
        public function Create() {
            if(isset($_REQUEST['Create'])) {
                $Num_Package = "";
                $Num_Trainers = mysqli_real_escape_string($this->con,$_POST['Num_Trainer']);
                $Title = mysqli_real_escape_string($this->con,$_POST['Title']);
                $Description = mysqli_real_escape_string($this->con,$_POST['Description']);
                $Traif = mysqli_real_escape_string($this->con,$_POST['Traif']);
                $Durée_Trainaing = mysqli_real_escape_string($this->con,$_POST['Durée_Trainaing']);
                $Query = "INSERT INTO Package VALUES('$Num_Package' , '$Num_Trainers' , '$Title' , '$Description' , '$Traif' , '$Durée_Trainaing') ";
                if(mysqli_query($this->con , $Query)) {
                    $_SESSION['Start'] = "<p class='alert alert-success'> Package added successfly. </p>";
                    echo "<script> window.location.href='index.php'; </script>";
                }
                else {
                    echo "<p class='alert alert-danger'> Error could not add this Member, Please check data </p>";
                }
            }
        }

        public function Return_Data_Show(int $N) {
            if(isset($_GET['EditID'])) {
                $ID = $_GET['EditID'];
                $cmd = " SELECT * FROM Package WHERE Num_Package='$ID' ";
                $result = mysqli_query($this->con, $cmd);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        return $row[$N];
                    }
                }
            }
            mysqli_close($this->con);
        }

        public function Edit_Packages() {
            if(isset($_POST['Edit'])) {
                $ID = $_GET['EditID'];
                $Num_Trainers = mysqli_real_escape_string($this->con,$_POST['Num_Trainer']);
                $Title = mysqli_real_escape_string($this->con,$_POST['Title']);
                $Description = mysqli_real_escape_string($this->con,$_POST['Description']);
                $Traif = mysqli_real_escape_string($this->con,$_POST['Traif']);
                $Durée_Trainaing = mysqli_real_escape_string($this->con,$_POST['Durée_Trainaing']);
                $Query = "UPDATE Package SET  Num_Trainer='$Num_Trainers' , Title='$Title' , Description='$Description' , Traif='$Traif' , Durée_Trainaing='$Durée_Trainaing' WHERE Num_Package='$ID' ";
                if(mysqli_query($this->con , $Query)) {
                    $_SESSION['Edit'] = "<p class='alert alert-success'> Packages Updated successfly. </p>";
                    echo "<script> window.location.href='index.php'; </script>";
                }
                else {
                    echo "<p class='alert alert-danger'> ERROR: Could not able to Update </p>";
                }
                mysqli_close($this->con);
            }
        } 
        
        
        public function Remplir_Package() {
            if(isset($_REQUEST['Join'])) {
                $Num_Package = $_GET['ShowID'];
                $Num_Membre = $_POST['FullName'];
                $Date_Join = date('Y-m-d H:i:s');
                $Query = "INSERT INTO Acheter_Package VALUES('$Num_Package' , '$Num_Membre' , '$Date_Join') ";
                if(mysqli_query($this->con , $Query)) {
                    $_SESSION['Join'] = "<p class='alert alert-success'> Membere added succesfly to Packages </p>";
                    echo "<script> window.location.href='../index.php'; </script>";
                }
                else {
                    echo "<p class='alert alert-danger'> ERROR: Could not able to this Member </p>";
                }
                mysqli_close($this->con);
            }
        }
    }

    
    $Packages = new Packages();
?>