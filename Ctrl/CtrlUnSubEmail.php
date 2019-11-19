<?php
    class CtrlUnSubEmail extends Ctrl{
        private $_action;

        public function __construct() {
            $this->_action = null;
        }

        public function start() {
            if (isLogged() == true) {
                if (isset($_POST['switchNotificationMail'])) {
                    $this->_action = new ActionUnSubEmail();
                    $this->_action->unSubEmail();
                    if ($this->_action->getSuccess() == true) {
                        die('good email unsub');
                    } else {
                        die('problem with unsub email ');
                    }
                } else {
                    $this->_view = new EditAccount();
                    $this->_view->buildPage();
                }
            }

        }
    }

?>