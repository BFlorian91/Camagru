<?php 
    class RegisterRecord {
        private $username;
        private $password;
        private $email;

        public function __construct($username, $password, $email) {
            $this->setDataUser($username, $password, $email);
        }

        public function setUsername($name) {
            $this->username = $name;
        }
        
        public function getUsername() {
            return $this->username;
        }

        public function setPassword($pass) {
            $options = [
                'cost' => 12,
            ];
            $this->password = password_hash($pass, PASSWORD_BCRYPT, $options);
        }

        public function getPassword() {
            return $this->password;
        }

        public function setEmail($emailUser) {
            $this->email = $emailUser;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setDataUser($username, $email, $password) {
            $this->username = $this->setUsername($username);
            $this->password = $this->setPassword($password);
            $this->email = $this->setEmail($email);
        }
 
    }
?>