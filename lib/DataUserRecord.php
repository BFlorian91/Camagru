<?php 
    class DataUserRecord {
        private $_username;
        private $_password;
        private $_email;

        public function __construct($username, $password, $email) {
            $this->setDataUser($username, $password, $email);
        }

        public function setUsername($name) {
            $this->_username = $name;
        }
        
        public function getUsername() {
            return $this->_username;
        }

        public function setPassword($pass) {
            $options = [
                'cost' => 12,
            ];
            $this->password = password_hash($pass, PASSWORD_BCRYPT, $options);
        }

        public function getPassword() {
            return $this->_password;
        }

        public function setEmail($emailUser) {
            $this->_email = $emailUser;
        }

        public function getEmail() {
            return $this->_email;
        }

        public function setDataUser($username, $email, $password) {
            $this->_username = $this->setUsername($username);
            $this->_password = $this->setPassword($password);
            $this->_email = $this->setEmail($email);
        }
 
    }
?>