<?php
    require_once("Config_DB.php");

    class Home extends Config_Database {

        public function count_Membre() {
            $Query = $this->con->prepare("SELECT count(*) FROM Membre");
            $Query->execute();
            $Result = $Query->get_result();
            $row = $Result->fetch_assoc();
            return $row['count(*)'];
        }

        public function Count_Packages() {
            $Query = $this->con->prepare("SELECT count(*) FROM Package");
            $Query->execute();
            $Result = $Query->get_result();
            $row = $Result->fetch_assoc();
            return $row['count(*)'];
        }

        public function Count_Trainers() {
            $Query = $this->con->prepare("SELECT count(*) FROM Trainers");
            $Query->execute();
            $Result = $Query->get_result();
            $row = $Result->fetch_assoc();
            return $row['count(*)'];
        }
    }
    
    $Home = new Home();
?>