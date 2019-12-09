<?php

class ActionUpload
{

   private $_dir;
   private $_extAllowed;
   private $_outputfile;

   public function __construct()
   {
      $this->_dir = "lib/img/";
      $this->_extAllowed = array('jpg', 'jpeg', 'png', 'gif');
      $this->_outputfile = null;
   }

   public function getImg()
   {
      if (isset($_FILES['imgUpload'])) {
         $errors = array();
         // $file_name = $_FILES['imgUpload']['name'];
         $file_size = $_FILES['imgUpload']['size'];
         $file_tmp = $_FILES['imgUpload']['tmp_name'];
         // $file_type = $_FILES['imgUpload']['type'];
         $file_ext = strtolower(end(explode('.', $_FILES['imgUpload']['name'])));

         $extensions = array("jpeg", "jpg", "png", "gif");

         if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG, PNG or GIF file.";
         }

         if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
         }

         if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "lib/img/" . $_SESSION['user'] . '_' . date("Y-m-d H:i:s") . '.' . $file_ext);
            echo "Success";
         } else {
            print_r($errors);
         }
      }
   }
}
