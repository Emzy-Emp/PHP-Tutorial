<?php 
    class DBConn{
        private $server = "localhost";
        private $username = "root";
        private $password = null;
        private $db_name = "tutorial_project";
        private $port = "4306";
        private $conn;

        public function __construct()
        {
            try{
                $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db_name, $this->port);
            }catch (Exception $e){
                echo "connection Failed: ".$e->getMessage();
            }
        }
        /// This functino executes database Query and returns the result
        public function executeQuery(string $query){
            return $this->conn->query($query);
        }
    }
?>