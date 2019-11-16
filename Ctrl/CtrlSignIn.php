<?php

    class CtrlSignIn extends Ctrl{
        private $_action;

        public function __construct()
        {
            $this->_action = null;
            $this->_view = new Signin();
        }

        public function start() {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $this->_action = new ActionSignIn($username, $password);
                $this->_action->signIn();
                if ($this->_action->getSuccess()) {
                    echo $this->_action->getSuccessmsg();
                } else {
                    echo $this->_action->getErrorMsg();
                }
            }
            $this->_view->buildPage();
        }
    }
?>