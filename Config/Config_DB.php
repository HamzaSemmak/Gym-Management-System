<?php
    class Config_Database {
        public $con;
        
        public function __construct()
        {
            $this->con = new mysqli('localhost' , 'root' , '' , 'Gestion_Salle_Sport') or die($this->con);
        }
    }
?>