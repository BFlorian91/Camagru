<?php
    class ActionGetImg {
        private $_success;

        public function __construct() {
            $this->_success = null;
        }

        public function GetSuccess() {
            return $this->_success;
        }

        public function getImg() {
            foreach ($_POST as $post_var) {
                echo strtoupper($post_var) . "<br />";
            }
            $this->_success = true;
        }
    }

?>