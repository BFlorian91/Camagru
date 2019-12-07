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
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                $this->_action = new ActionSignIn($username, $password);
                if ($this->_action->checkBeforeSignIn() == true) {
                    $this->_action->signIn();
                    if ($this->_action->getSuccess()) {
                        echo $this->_action->getSuccessmsg();
                    } else {
                        echo $this->_action->getErrorMsg();
                    }
                }
            }
            $this->_view->buildPage();
        }
    }
?>