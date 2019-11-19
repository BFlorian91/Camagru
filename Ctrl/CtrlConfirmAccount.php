<?php
    class CtrlConfirmAccount extends Ctrl {
        private $_action;
    
        public function __construct() {
        }

        public function start() {
            if (isset($_GET['key']) && isset($_GET['username'])) {
                $this->_view = new ConfirmAccount();
                $key = $_GET['key'];
                $username = urldecode($_GET['username']);
                $this->_view = new ConfirmAccount();
                $this->_action = new ActionConfirmAccount($key, $username);
                if ($this->_action->checkIfAlreadyConfirm() == 0) {
                    $this->_action->confirmAccount();
                    echo '<p style="magin-top: 150px;"> Your account has been confirmed </p>';
                    $this->_view->buildPage();                
                } else {
                    echo '<p style="magin-top: 150px;"> Your account is alreadyconfirmed </p>';
                }
            }

        }
    }
?>