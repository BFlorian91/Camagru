<?php 
    class DataUserRecord {
        private $_username;
        private $_hashPassword;
        private $_password;
        private $_email;
        private $_confirmkey;
        private $_confirm;

        public function __construct($username = null, $password = null, $email = null) {
            $this->setDataUser($username, $password, $email);
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

        public function getConfirmkey() {
            return $this->_confirmkey; 
        }

        public function getConfirm() {
            return $this->_confirm;
        }

        public function setConfirm($values) { 
            $this->_confirm = $values;
        }

        public function setConfirmkey() {
            $keylength = 15;
            $key = '';
            for ($i=1; $i < $keylength ; $i++) { 
                $key .= mt_rand(0,9);
            }
            $this->_confirmkey = $key; 
        }
        public function setDataUser($username = null, $password = null, $email = null) {
            $this->setConfirmkey();
            if ($password != null) {
                $this->setPassword($password);
                $this->setHashPassword($password);
            }
            if ($username != null) {
                $this->setUsername($username);
            }
            if ($email != null) {
                $this->setEmail($email);
            }
        }
    }
?>