<?php

  class ActionMontage {

    private $_img;
    private $_username;
    private $_outputfile;
    private $_sqlStatementAddImgToDb;
    private $_linkToDb;
    private $_data;
    private $_record;

    public function __construct()
    {
      $this->_linkToDb = new ConnectToBdd();
      $this->_linkToDb->connectToDb();
      $this->_sqlStatementAddImgToDb = null;
      $this->_img = null;
      $this->_record = null;
      $this->_username = htmlspecialchars($_SESSION['user']);
      $this->_outputfile = null;
      $this->_data = [];
    }

    public function getOutputFile() {
      return $this->_outputfile;
    }

    public function getAddToDbSuccess() {
      return $this->_sqlStatementAddImgToDb->getExecuteSuccess();
    }

    public function getImg()
    {
      $this->_outputfile = './lib/img/' . $_SESSION['username'] . str_replace(" ", "_", date("Y-m-d H:i:s")) . '.png';
      
      $base64_string = $_POST['img'];
      $ifp = fopen($this->_outputfile, 'wb' ); 
      $data = explode( ',', $base64_string );
      fwrite( $ifp, base64_decode( $data[1] ) );
      fclose( $ifp ); 
    }

    public function addImgToDb() {
      array_push($this->_data, $this->_outputfile, $this->_username, 0);
      $this->_sqlStatementAddImgToDb = new SqlstatementAddImgToDb($this->_linkToDb, $this->_record, $this->_data);
      $this->_sqlStatementAddImgToDb->prepare();
      $this->_sqlStatementAddImgToDb->bindParam();
      $this->_sqlStatementAddImgToDb->execute();
    }
  }