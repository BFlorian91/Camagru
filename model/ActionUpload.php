<?php

    class ActionUpload {

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
            if(isset($_FILES['imgUpload'])){
                $errors= array();
                $file_name = $_FILES['imgUpload']['name'];
                $file_size =$_FILES['imgUpload']['size'];
                $file_tmp =$_FILES['imgUpload']['tmp_name'];
                $file_type=$_FILES['imgUpload']['type'];
                $file_ext=strtolower(end(explode('.',$_FILES['imgUpload']['name'])));
                print_r($file_name);
                
                $extensions= array("jpeg","jpg","png");
                
                if(in_array($file_ext,$extensions) === false){
                   $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }
                
                if($file_size > 2097152){
                   $errors[] = 'File size must be excately 2 MB';
                }
                
                if(empty($errors) == true){
                   move_uploaded_file($file_tmp, "lib/img/" . $file_name);
                   echo "Success";
                }else{
                   print_r($errors);
                }
             }
            }
      
            // $base64_string = $_FILES['imgUpload'];
            // $ifp = fopen($this->_outputfile, 'wb' ); 
            // $data = explode( ',', $base64_string );
            // fwrite( $ifp, base64_decode( $data[1] ) );
            // fclose( $ifp ); 
    }