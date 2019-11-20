<?php
    class CtrlMontage extends Ctrl {
        private $_montage;
        private $_action;       
        public function __construct() {
            $this->_montage = null;
            $this->_action = null;
        }

        public function start() {
             $this->_action = new ActionMontage();
             $this->_action->getImg();
             if ($this->_action->getSuccess() == true) {
             }
           
                $this->_montage = new MontagePage();
                $this->_view = $this->_montage->buildPage();
        }
    }
