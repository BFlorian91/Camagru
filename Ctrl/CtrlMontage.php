<?php
    class CtrlMontage extends Ctrl {

        public function __construct() {
            $this->_view = new MontagePage();
        }

        public function start() {
            $this->_view->buildPage();
        }
    }

?>