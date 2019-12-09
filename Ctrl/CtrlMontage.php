<?php
    class CtrlMontage extends Ctrl {

        private $_action;
        private $_actionUpload;
        public function __construct() {
            $this->_action = null;
            $this->_actionUpload = null;
        }

        public function start() {
            if (isLogged() == true) {
                $this->_action = new ActionMontage();
                $this->_actionUpload = new ActionUpload();
                if ($_POST['takePhoto'])
                    $this->_action->getImg();
                elseif ($_POST['uploadPhoto'])
                    $this->_actionUpload->getImg();
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
