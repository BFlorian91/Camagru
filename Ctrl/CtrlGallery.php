<?php
    class CtrlGallery extends Ctrl{
        private $gallery;
        public function __construct() {
            $this->gallery = new Gallery();
        }
        
        public function start() {
            $this->_view = $this->gallery->buildPage();
        }
    }
?>