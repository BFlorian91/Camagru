<?php
    class Ctrl {
        public static function chooseCtrl() {
            $ctrl = '';
            switch ($_GET['page']) {
                case 'signup':
                    $ctrl = new CtrlSignUp();
                    break;
                case 'signin':
                    $ctrl = new CtrlSignIn();
                    break;
                case 'gallery':
                    $ctrl = new CtrlGallery();
                    break;
                case 'montage':
                    $ctrl = new CtrlMontage();
                    break;
                case 'confirm':
                    $ctrl = new CtrlConfirmAccount();
                    break;
                default:
                    header("HTTP/1.0 404 Not Found");
                    break;
            }
            return $ctrl;
        }
        
        protected $_htmlelement;
        protected $_setStyle;
        protected $_view;
        
        public function __construct() {
            $this->_setStyle = '';
            $this->_view = null;
        }

        public function getView() {
            return $this->_view;
        }
        
        public function setCssStyle($cssSrc) {
            $this->_setStyle = $cssSrc;
        }

        public function getStyle() {
            return $this->_setStyle;
        }
    }

?>