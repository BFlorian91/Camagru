<?php
    class CtrlMontage extends Ctrl {
        private $montage;
        
        public function __construct() {
            $this->montage = new MontagePage();
            debug($_POST);
            debug($_POST);
            debug($_POST);
            debug($_POST);
            debug($_POST);
            debug($_POST);
            debug($_POST);
        }

        public function start() {
            $this->_view = $this->montage->buildPage();
        }
    }

?>