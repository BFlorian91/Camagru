<?php

  class ActionMontage {

    private $img;
    private $_success;
    public function __construct()
    {
      $this->img = null;
      $this->_success = null;  
    }

    public function getSuccess() {
      return $this->_success;
    }

    public function getImg()
    {
      $output_file = './img\/' . $_SESSION['username'] . str_replace(" ", "_", date("Y-m-d H:i:s")) . '.png';
      
      $base64_string = $_POST['img'];
        // open the output file for writing
        $ifp = fopen( $output_file, 'wb' ); 
    
        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );
        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[1] ) );
    
        // clean up the file resource
        fclose( $ifp ); 
    
        return $output_file; 
    }
  }