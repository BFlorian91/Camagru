<?php
    class CtrlEditAccount extends Ctrl{
    
        public function __construct() {

        }

        public function start() {
            $this->_view = new EditAccount();
            $this->_view->buildPage();
        }
    }
?>