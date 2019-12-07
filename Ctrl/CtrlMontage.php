<?php
    class CtrlMontage extends Ctrl {

        private $_action;       
        public function __construct() {
            $this->_action = null;
        }

        public function start() {
            if (isLogged()) {
                $this->_action = new ActionMontage();
                $this->_action->getImg();
                $this->_action->addImgToDb();
                $this->_view = new MontagePage();
                $this->_view->buildPage();
            } else {
                $this->_view = new Signin();
                echo "<div class='text-center alert alert-danger mr-5 ml-5' style='margin-top:150px;'><h5>You need to be logged before doing a montage</h5></div>";
                $this->_view->buildpage();
            }
        }
    }
