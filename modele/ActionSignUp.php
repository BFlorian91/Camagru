<?php
    class ActionSignUp {
        private $_recordDataUser;
        private $_connectToBdd;
        private $_sqlSignUpStatement;
        private $_sqlCheckBeforeSignUp;
        private $_success;
        private $_rowCount;
        private $_sendemail;

        public function __construct($username, $password, $email) {
            $this->_recordDataUser = new DataUserRecord($username, $password, $email);
            $this->_connectToBdd = new ConnectToBdd();
            $this->_connectToBdd->connectToDb();
            $this->_sqlSignUpStatement = new SqlstatementSignUp($this->_connectToBdd, $this->_recordDataUser);
            $this->_sqlCheckBeforeSignUp = new SqlStatementCheckBeforeSignUp($this->_connectToBdd, $this->_recordDataUser);
            $this->_success = '';
            $this->_rowCount = null;
        }
    
        public function getSuccess() {
            return $this->_success;
        }
         
        public function signUp() {
            // faire un statement qui check si le user est deja present dans la bdd
            $this->_sqlCheckBeforeSignUp->prepare();
            $this->_sqlCheckBeforeSignUp->execute();
            $this->_rowCount = $this->_sqlCheckBeforeSignUp->getRowCount();
            if ($this->_rowCount == 0) {
                $this->_sqlSignUpStatement->prepare();
                $this->_sqlSignUpStatement->bindParam();
                $this->_sqlSignUpStatement->execute();
                $this->_success = $this->_sqlSignUpStatement->getExecuteSuccess();
                if ($this->_success == true) {
                    $this->_sendemail = new SendMail($this->_recordDataUser);
                    $this->_sendemail->sendmail();
                }
            }
        }
        
    }
?>