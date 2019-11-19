<?php
    class CtrlUnSubEmail {
        private $_action;

        public function __construct() {
            $this->_action = null;
        }

        public function start() {
            if (isLogged() == true) {
                if (isset($_POST['switchNotificationMail'])) {
                    $this->_action = new ActionUnSubEmail();
                    $this->_action->unSubEmail();
                } else {
                    $this->_view = new EditAccount();
                    $this->_view->buildPage();
                }
            }

        }
    }

?>