<?php
    class CtrlGallery extends Ctrl{

        private $_action;
        private $_images;
        public function __construct() {
            $this->_action = null;
            $this->_images = null;
        }
        
        public function start() {
            $this->_action = new ActionGallery();
            $this->_action->getAllImage();
            $this->_images = $this->_action->getData()['images'];
            $this->_view = new Gallery($this->_images);
            $this->_view->buildPage();
        }
    }
?>