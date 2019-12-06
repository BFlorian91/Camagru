<?php
    class CtrlConfirmAccount extends Ctrl {
        private $_action;
    
        public function __construct() {
            $this->_action = null;
        }

        public function start() {
            if (isset($_GET['key']) && isset($_GET['username'])) {
                $this->_view = new ConfirmAccount();
                $key = $_GET['key'];
                $username = urldecode($_GET['username']);
                $this->_action = new ActionConfirmAccount($key, $username);
                if ($this->_action->checkIfAlreadyConfirm() == 0) {
                    $this->_action->confirmAccount();
                    $this->_view = new ConfirmAccount();
                    $this->_view->buildPage();
                    if ($this->_action->getSuccess() == true) {
                        $this->_view = new Signin();
                        $this->_view->buildpage();
                    }      
                } else {
                    $this->_view = new Signin();
                    echo '<div class="text-center alert alert-danger mr-5 ml-5" style="margin-top:150px;"><h5>Your account is already confirmed you can now signin</h5></div>';
                    $this->_view->buildpage();
                }
            }

        }
    }
?>