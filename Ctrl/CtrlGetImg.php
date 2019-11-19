<?php
    class CtrlGetImg extends Ctrl{
        private $_action;
        private $_success;

        public function __construct() {
            $this->_action = null;
        }
        
        public function start() {
            if (isset($_POST)) {
                $this->_action = new ActionGetImg();
                $this->_action->getImg();
                $this->_success = $this->_action->getSuccess();
                if ($this->_success == true) {
                    echo "<p style='margin-top:150px'> request is good </p>";
                }
            } else {
                $this->_view = new GetImg();
                $this->_view->buildPage();
            }
        }
    }
?>