<?php
    class CtrlGallery extends Ctrl{
        public function __construct() {
            $this->_view = new Gallery();
        }
        
        public function start() {
            $this->_view->buildPage();
        }
    }
?>