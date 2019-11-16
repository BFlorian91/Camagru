<?php 
    class DataUserRecord {
        private $_username;
        private $_hashPassword;
        private $_password;
        private $_email;

        public function __construct($username, $password, $email = null) {
            if ($email != null) {
                $this->setDataUser($username, $password, $email);
            } else {
                $this->setDataUser($username, $password);
            }
        }

        public function getPassword() {
            return $this->_password;
        }
        public function setPassword($pass) {
            $this->_password = $pass;
        }

        public function setUsername($name) {
            $this->_username = $name;
        }
        
        public function getUsername() {
            return $this->_username;
        }

        public function setHashPassword($pass) {
            $options = [
                'cost' => 12,
            ];
            $this->_hashPassword = password_hash($pass, PASSWORD_BCRYPT, $options);
        }

        public function getHashPassword() {
            return $this->_hashPassword;
        }

        public function setEmail($emailUser) {
            $this->_email = $emailUser;
        }

        public function getEmail() {
            return $this->_email;
        }

        public function setDataUser($username, $password, $email = null) {
            $this->setPassword($password);
            $this->setUsername($username);
            $this->setHashPassword($password);
            if ($email != null) {
                $this->setEmail($email);
            }
        }
 
    }
?>