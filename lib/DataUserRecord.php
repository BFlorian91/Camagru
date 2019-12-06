<?php 
    class DataUserRecord {
        private $_username;
        private $_hashPassword;
        private $_password;
        private $_email;
        private $_confirmkey;
        private $_confirm;
        private $_confirmPassword;

        public function __construct($username = null, $password = null, $email = null, $confirmPassword = null) {
            $this->setDataUser($username, $password, $email, $confirmPassword);
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

        public function checkSecu() {
            $password = $this->getPassword();
            $email = $this->getEmail();
            $confirmPassword = $this->getConfirmPassword();
            if ($email != null) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<div class="text-center alert alert-danger mr-5 ml-5" style="margin-top:150px;"><h5>must be a valide email</h5></div>';
                    return false;
                }
            }
            if (strlen($password) < 8) {
                echo '<div class="text-center alert alert-danger mr-5 ml-5" style="margin-top:150px;"><h5>Password must contain 8 characteres</h5></div>';
                return false;
            }
            if ($confirmPassword != null) {
                if ($confirmPassword != $password) {
                    echo '<div class="text-center alert alert-danger mr-5 ml-5" style="margin-top:150px;"><h5>Password and confirm password must match </h5></div>';
                    return false;   
                }
            }
            return true;
        }

        public function setConfirmPassword($confirmPassword) {
            $this->_confirmPassword = $confirmPassword;
        }

        public function getConfirmPassword() {
            return $this->_confirmPassword;
        }

        public function setDataUser($username = null, $password = null, $email = null, $confirmPassword = null) {
            if ($confirmPassword != null) {
                $this->setConfirmPassword($confirmPassword);
            }
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