<?php
    class ActionSignUp {
        private $_recordDataUser;
        private $_connectToBdd;
        private $_sqlSignUpStatement;
        private $_success;

        public function __construct($username, $email, $password) {
            $this->_recordDataUser = new DataUserRecord($username, $email, $password);
            $this->_connectToBdd = new ConnectToBdd();
            $this->_connectToBdd->connectToDb();
            $this->_sqlSignUpStatement = new SqlstatementSignUp($this->_connectToBdd, $this->_recordDataUser);
            $this->_success = '';
        }
    
        public function getSuccess() {
            return $this->_success;
        }
         
        public function signUp() {
            // faire un statement qui check si le user est deja present dans la bdd
            $this->_sqlSignUpStatement->prepare();
            $this->_sqlSignUpStatement->bindParam();
            $this->_sqlSignUpStatement->execute();
            $this->_success = $this->_sqlSignUpStatement->getExecuteSuccess();

        }
        
    }
?>