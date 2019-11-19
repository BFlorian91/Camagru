<?php
    class CtrlEditPassword extends Ctrl{
        private $_action;

        public function __construct() {
            $this->_action = null;
        }
//session start dans le islogged 
        public function start() {
            if (isLogged() === true) {
                if (isset($_POST['password'])) {
                    $password = htmlspecialchars($_POST['password']);
                    $this->_action = new ActionEditPassword($password);
                    $this->_action->editPassword();
                    if ($this->_action->getSuccess() == true) {
                        echo "<p style='margin-top:150px;'>Password has been changed</p>";
                    }
                } else {
                    $this->_view = new EditPassword();
                    $this->_view->buildPage();
                }
            }
        }

    }
?>