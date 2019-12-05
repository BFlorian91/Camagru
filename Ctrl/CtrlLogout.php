<?php
    class CtrlLogout extends Ctrl{ 
        private $_actionLogout;

        public function __construct() {
            $this->_actionLogout = new ActionLogout();
        }

        public function start() {
            $this->_actionLogout->logout();
            if ($this->_actionLogout == true) { 
                echo "<h5 class='text-center alert alert-danger mr-5 ml-5'style='margin-top: 150px'> You have been disconnected  !</h4>";
                $this->_view = new Signin();
                $this->_view->buildpage();
            }
            
        }
    }
?>