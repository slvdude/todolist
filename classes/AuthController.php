<?php 

    class AuthController extends Auth {
        private $login;
        private $password;

        public function __construct($login, $password) {
            $this->login = $login;
            $this->password = $password;
        }

        public function signupUser() {
            $isRegd = false;
            if($this->inputEmpty() == false) {
                $this->setUser($this->login, $this->password);
                $isRegd = true;
            }
            return $isRegd;
        }

        public function authUser() {
            $userExist = $this->userExist($this->login, $this->password);
            if($userExist == true) {
                return $userExist;
            }
            else {
                $this->signupUser();
            }
        }
        
        private function inputEmpty() {
            $isEmpty;
            if(empty($this->login) || empty($this->password)) {
                $isEmpty = true;
            }
            else {
                $isEmpty = false;
            }
            return $isEmpty;
        }
    }