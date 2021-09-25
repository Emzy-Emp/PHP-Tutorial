<?php 
    include('DBConn.php');
    include('Models/User.php');
    class Procedures{

        private $dbconn;

        /// Function to insert User into the User db
        public function addUser(User $user){
            $this->dbconn  = new DBConn();
            $query = "insert into users (name, email, mobile, address) values ('{$user->getName()}', 
            '{$user->getEmail()}', '{$user->getMobile()}', '{$user->getAddress()}')";
            if($sql = $this->dbconn->executeQuery($query)){
                return "1";
            }else{
                return "0";
            }
        }

        public function getUsers(){
            $data = null;
            $this->dbconn  = new DBConn();
            $query = "select  * from users";
            if($sql = $this->dbconn->executeQuery($query)){
                while($row = mysqli_fetch_assoc($sql)){
                    $data[] = $row;
                }
            }

            return $data;
        }

        public function deleteUser(string $id){
            $this->dbconn  = new DBConn();
            $query = "Delete from users where id={$id}";
            if($sql = $this->dbconn->executeQuery($query))
                return "1";
            else
                return "0";
        }

        public function getUser(string $id){
            $data = null;
            $this->dbconn  = new DBConn();
            $query = "select  * from users where id = '$id'";
            if($sql = $this->dbconn->executeQuery($query)){
                while($row = mysqli_fetch_assoc($sql)){
                    $data = $row;
                }
            }

            return $data;
        }

        public function editUser(User $user){
            $this->dbconn  = new DBConn();
            $id = $user->getId();
            $name = $user->getName();
            $email = $user->getEmail();
            $mobile = $user->getMobile();
            $address = $user->getAddress();
            $query = "update users set name ='{$name}', email = '{$email}', mobile = '{$mobile}', address = '{$address}' WHERE id = {$id}";

            if($sql = $this->dbconn->executeQuery($query))
                return "1";
            else 
                return "0";
        }
    }
?>