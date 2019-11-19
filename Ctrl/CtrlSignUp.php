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
                $this->_action = new ActionSignUp($username, $password, $email);
                $this->_action->signUp();
                if ($this->_action->getSuccess() == true) {
                    echo "<div style=".'margin-top:100px;'.">You are now register check your email to confirm your account</div>";

                } else {
                    echo "<div style=".'margin-top:100px;'.">invalid username or password</div>";
                }
            }
            $this->_view->buildPage();
        }
    }
?>