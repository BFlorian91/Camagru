<?php
    class CtrlLogout extends Ctrl{ 
        private $_actionLogout;

        public function __construct() {
            $this->_actionLogout = new ActionLogout();
        }

        public function start() {
            $this->_actionLogout->logout();
            if ($this->_actionLogout == true) { 
                echo "<h1 style='margin-top: 150px'> You have been disconnected  !</h1>";
            }
            
        }
    }
?>