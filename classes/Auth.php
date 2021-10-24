<?php 
    class Auth extends DB {
        protected function getUser($login, $password) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE login = ? and password = ?;');
            $stmt->execute(array($login, $password));
            $returned_row = $stmt->fetch(PDO::FETCH_ASSOC);
            $result;
            if($stmt->rowCount() > 0) {
                $_SESSION['user_id'] = $returned_row['id'];
                $result = true;
            }
            else {
                $result = false;
            }
            return $result;
        }

        protected function setUser($login, $password) {
            $stmt = $this->connect()->prepare('INSERT INTO users (login, password) VALUES (?, ?);');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute(array($login, $hashed_password));
        }
    }