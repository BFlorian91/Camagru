<?php

    class ActionUpload {

        private $_dir;

        public function __construct()
        {
            $this->_dir = "img/";
        }
       
        public function check() 
        {
           switch ($_FILES['imgUpload']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
            }

            if ($_FILES['imgUpload']['size'] > 5000000) {
                throw new RuntimeException('Exceeded filesize limit.');
            }
        }
        public function getImg()
        {
            $img = $_POST['imgUpload'];
            $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
            $upload = 1;
            if ($check !== false) {
                echo "It's an image +1";
                $upload = 1;
            } else {
                echo "It's not a valid image";
                $upload = 0;
            }
            if ($_FILES["imgUpload"]["size"] > 500000) {
                echo "sorry image is to large...";
                $upload = 0;
            }
        }
    }