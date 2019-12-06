<?php
    class ActionLogout {
        private $_success;

        public function __construct() {
            $this->_success = null;
        }

        public function getSuccess() {
            return $this->_success;
        }

        public function logout() {
            if (isLogged() == true) {
                session_unset();
                session_destroy();
                $this->_success = true;
            } else {
                $this->_success = false;
            }
        }
    }
?>