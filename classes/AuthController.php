<?php 

    class AuthController extends Auth {
        private $login;
        private $password;

        public function __construct($login, $password) {
            $this->login = $login;
            $this->password = $password;
        }

        public function authUser() {
            $userExist = false;
            if($this->getUser($this->login, $this->password) == true) {
                return $userExist = true;
            }
            else {
                $this->signupUser();
                return $userExist;
            }
        }

        private function signupUser() {
            
            if($this->inputEmty() == false) {
                $this->setUser($this->login, $this->password);
                $this->authUser();
            }
            else {
                header("Location: ../index.php?error=inputempty");
            }
        }
        
        private function inputEmty() {
            $isEmpty;
            if(empty($this->login) || empty($this->password)) {
                $isEmpty = true;
            }
            else {
                $isEmpty = false;
            }
            return false;
        }
    }