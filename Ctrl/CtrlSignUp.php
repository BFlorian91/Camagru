<?php
    class CtrlSignUp extends Ctrl{

        private $_action;

        public function __construct() {
            $this->_action = null;
            $this->_view = new Signup();        
        }

        public function start() {
            if (isset($_POST['username']) || isset($_POST['email']) || isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $this->_action = new ActionSignUp($username, $email, $password);
                $this->_action->signUp();
                debug($this->_action->getSuccess());
                if ($this->_action->getSuccess()) {
                    die('ok');
                    die ('good user added succefully ');
                }
                else {
                    $this->_view = $this->view->buildPage();            
                }
            }
            $this->_view->buildPage();  
        }
    }
?>