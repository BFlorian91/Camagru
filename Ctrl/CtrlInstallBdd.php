<?php
    class CtrlInstallBdd extends Ctrl{

        private $_action;
        private $_installBddView;

        public function __construct() {
            $this->_action = new ActionInstallBdd();
            $this->_installBddView = new InstallBddView();
        }

        public function start() {
            if ($this->_action->getSuccess() == false) {
            $this->_action->initBdd();    
            }
            $this->_view = $this->_installBddView->buildPage();
        }        
    }
?>