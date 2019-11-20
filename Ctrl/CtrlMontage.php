<?php
    class CtrlMontage extends Ctrl {
        private $montage;
        
        public function __construct() {
            $this->montage = new MontagePage();

        }

        public function start() {
            if (isset($_POST) && !empty($_POST)) {
                debug($_POST);
            } else {
                $this->_view = $this->montage->buildPage();
            }
        }
    }

?>