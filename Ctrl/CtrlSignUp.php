<?php
    class CtrlSignUp extends Ctrl{

        private $_action;

        public function __construct() {
            $this->_action = null;
            $this->_view = new Signup();        
        }

        public function start() {
            if (isset($_POST['username']) || isset($_POST['email']) || isset($_POST['password'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                $email = htmlspecialchars($_POST['email']);
                //check more on the password !
                $this->_action = new ActionSignUp($username, $password, $email);
                if ($this->_action->checkSecu() == true) {
                    $this->_action->signUp();
                if ($this->_action->getSuccess() == true) {
                    echo '<div class="text-center alert alert-success mr-5 ml-5" style="margin-top:150px;"><h5>Check your mail to confirm your account </h5></div>';
                } else {
                    echo '<div class="text-center alert alert-danger mr-5 ml-5" style="margin-top:150px;"><h5>invalid data</h5></div>';
                }
             }
            }
            $this->_view->buildPage();
        }
    }
?>