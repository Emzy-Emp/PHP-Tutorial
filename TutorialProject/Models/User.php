<?php 
    class User{
        private $id;
        private $name;
        private $email;
        private $mobile;
        private $address;
        private $accessControl;

        //setters
        public function setId(string $id){
            $this->id = $id;
        }

        public function setName(string $name){
            $this->name = $name;
        }

        public function setEmail(string $email){
            $this->email = $email;
        }

        public function setMobile(string $mobile){
            $this->mobile = $mobile;
        }
        public function setAddress(string $address){
            $this->address = $address;
        }
        public function setAccessControl(string $accessControl){
            $this->accessControl = $accessControl;
        }


        //Getters
        public function getId()
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getMobile()
        {
            return $this->mobile;
        }

        public function getAddress()
        {
            return $this->address;
        }

        public function getAccessControl()
        {
            return $this->accessControl;
        }
    }
?>