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
      echo 'test: ' . $_POST['img'];
      // $this->_success = true;
    }
  }