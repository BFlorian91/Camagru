<?php
    class CtrlMontage extends Ctrl {
        private $montage;
        public function __construct() {
            $this->montage = new MontagePage();
        }

        public function start() {
            $this->_view = $this->montage->buildPage();
        }
    }

?>