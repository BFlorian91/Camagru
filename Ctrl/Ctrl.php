<?php
    class Ctrl {
        public static function chooseCtrl() {
            $ctrl = '';
            switch ($_GET['page']) {
                case 'signup':
                    $ctrl = new CtrlSignup();
                    break;
                case 'signin':
                    $ctrl = new CtrlSignin();
                    break;
                default:
                    header("HTTP/1.0 404 Not Found");
                    break;
            }
            return $ctrl;
        }
        
        protected $htmlelement;
        protected $setStyle;
        protected $view;
        
        public function __construct() {
            $this->setStyle = '';
            $this->view = null;
        }

        public function getView() {
            return $this->view;
        }
        
        public function setCssStyle($cssSrc) {
            $this->setStyle = $cssSrc;
        }

        public function getStyle() {
            return $this->setStyle;
        }
    }

?>