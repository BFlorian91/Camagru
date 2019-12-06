<?php
    class CtrlEditUsername extends Ctrl{
        private $_action;

        public function __construct(){
            $this->_action = null;
        }

        public function start() {
            if (isLogged() == true) {
                if (isset($_POST['username'])) {
                    $username = htmlspecialchars($_POST['username']);
                    $this->_action = new ActionEditUsername($username);
                    $this->_action->editUsername();
                    if ($this->_action->getSuccess() == true) {
                        $this->_view = new EditUsername();
                        echo '<div class="text-center alert alert-success mr-5 ml-5" style="margin-top:150px;"><h5>Username has been changed to '.$_SESSION['user'].'</h5></div>';
                        $this->_view->buildpage();
                    }         
                } else {
                    $this->_view = new EditUsername();
                    $this->_view->buildPage();
                }
            }
        }

    }
?>