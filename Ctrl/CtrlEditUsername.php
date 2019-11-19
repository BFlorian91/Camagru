<?php
    class CtrlEditUsername extends Ctrl{
        private $_action;

        public function __construct(){
            $this->_action = null;
        }

        public function start() {
            if (isLogged() == true) {
                if (isset($_POST['email']) && isset($_POST['username'])) {
                    $username = htmlspecialchars($_POST['username']);
                    $email = htmlspecialchars($_POST['email']);
                    $this->_action = new ActionEditUsername($username, $email);
                    $this->_action->editUsername();
                    if ($this->_action->getSuccess() == true) {
                        echo "<p style='margin-top:150px;'>Username has been changed</p>";
                    }         
                } else {
                    $this->_view = new EditUsername();
                    $this->_view->buildPage();
                }
            }
        }

    }
?>