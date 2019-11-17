<?php
    class CtrlConfirmAccount extends Ctrl {
        private $_action;
    
        public function __construct() {
        }

        public function start() {
            if (isset($_GET['_key']) && isset($_GET['_username'])) {
                $key = $_GET['_key'];
                $username = $_GET['_username'];
                $this->_view = new ConfirmView();
                $this->_view->buildPage();
                $this->_action = new ActionConfirmAccount($key, $username);
                if ($this->_action->checkIfAlreadyConfirm() == 0) {
                    $this->_action->confirmAccount();
                    echo '<p style="magin-top: 150px;"> Your account has been confirmed </p>';
                } else {
                    echo '<p style="magin-top: 150px;"> Your account is alreadyconfirmed </p>';
                }
            }
        }
    }
?>