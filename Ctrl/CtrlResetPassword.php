<?php
    class CtrlResetPassword extends Ctrl{
        private $_action;
        private $_smail;
        private $_email;
        private $_username;
        private $_password;

        public function __construct() {
            $this->_smail = null;
            $this->_email = '';
            $this->_username = '';
            $this->_password = '';
        }

        public function start() {
            if (isset($_GET['username']) && !empty($_GET['username'])) {
                if (isset($_POST['password']) && isset($_POST['confirmPassword'])) {
                    $this->_action = new ActionResetPassword($_GET['username'], $_POST['password'], null);
                    $this->_action->resetpassword();
                } else {
                    $this->_view = new ResetPassword();
                    $this->_view->buildpage();
                }
            }
            if (isset($_POST['email'])) {
            $this->_email = $_POST['email'];
            //$this->_action->resetpassword();
            $this->_action = new ActionResetPassword(null,null, $this->_email);
            $this->_username = $this->_action->getUsername();
            $this->_action->setUsername($this->_username);
            $this->_action->sendEmailReset($this->_username);

            die('stop');
            if ($this->_action->getSuccess() == true) {
                    die('your password is now reset');
                } else {
                    die('it seem the request has failed');
                }
            } else {
                if (!isset($_GET['username'])) {
                    $this->_view = new EmailToResetPassword();
                    $this->_view->buildpage();
                }
  
            //$this->_view = new ResetPassword();
            //$this->_view->buildPage();
            }
        }
    }
?>