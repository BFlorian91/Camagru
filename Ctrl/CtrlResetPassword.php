<?php
    class CtrlResetPassword extends Ctrl{
        private $_action;

        public function __construct() {
            $this->_action = null; 
        }

        public function start() {
            if (isset($_POST['email'])) {
                $this->_action = new ActionResetPassword();
                $this->_action->resetpassword();
                if ($this->_action->getSuccess() == true) {
                    die('your password is now reset');
                } else {
                    die('it seem the request has failed');
                }
            } else {
                $this->_view = new ResetPassword();
                $this->_view->buildPage();
            }
        }
    }
?>