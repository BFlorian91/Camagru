<?php
    class CtrlEditEmail extends Ctrl{
        private $_action;

        public function __construct() {
            $this->_action = null;
        }

        public function start() {
            if (isLogged() == true) {
                if (isset($_POST['email'])) {
                    $email = htmlspecialchars($_POST['email']);
                    $this->_action = new ActionEditEmail($email);
                    $this->_action->editEmail();
                    if ($this->_action->getSuccess() == true) {
                        echo "<p style='margin-top:150px;'>Email has been changed</p>";
                        
                    }
                } else {
                    $this->_view = new EditEmail();
                    $this->_view->buildPage();
                }
            }
        }
    }
?>