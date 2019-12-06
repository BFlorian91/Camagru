<?php
    class CtrlEditPassword extends Ctrl{
        private $_action;

        public function __construct() {
            $this->_action = null;
        }
        public function start() {
            if (isLogged() === true) {
                if (isset($_POST['password']) && isset($_POST['confirmPassword'])) {
                    $password = htmlspecialchars($_POST['password']);
                    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
                    $this->_action = new ActionEditPassword($password, $confirmPassword);
                    $this->_view = new EditPassword();
                    $this->_view->buildpage();
                    if ($this->_action->checkSecu() == true) {
                        $this->_action->editPassword();
                        if ($this->_action->getSuccess() == true) {
                            echo '<div class="text-center alert alert-success mr-5 ml-5" style="margin-top:150px;"><h5>Your Password has been changed</h5></div>';
                        }
                    }
                }
                else {
                    $this->_view = new EditPassword();
                    $this->_view->buildPage();
                }
            }
        }

    }
?>