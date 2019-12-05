<?php
    class ActionSignUp {
        private $_recordDataUser;
        private $_connectToBdd;
        private $_sqlSignUpStatement;
        private $_sqlCheckBeforeSignUp;
        private $_success;
        private $_rowCount;
        private $_sendemail;
        private $_username;
        private $_key;

        public function __construct($username, $password, $email) {
            $this->setData($username, $password, $email);
        }
    
        public function getSuccess() {
            return $this->_success;
        }
         
        public function signUp() {
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
                    $this->_username = $this->_recordDataUser->getUsername();
                    $this->_key = $this->_recordDataUser->getConfirmkey();
                    debug($this->_username);
                    debug($this->_key);
                    $this->_sendemail->setMessage('http://localhost:8888/index.php?page=confirm&username='.urlencode($this->_username).'&key='.$this->_key.'"Veuillez clickez sur ce lien pour confirmez Votre compte');
                    $this->_sendemail->setObject('Confirmation de votre compte !');
                    $this->_sendemail->setHeader();
                    $this->_sendemail->sendmail();
                }
            }
        }

        public function setData($username, $password, $email) {
            $this->_recordDataUser = new DataUserRecord($username, $password, $email);
            $this->_connectToBdd = new ConnectToBdd();
            $this->_connectToBdd->connectToDb();
            $this->_sqlSignUpStatement = new SqlstatementSignUp($this->_connectToBdd, $this->_recordDataUser);
            $this->_sqlCheckBeforeSignUp = new SqlStatementCheckBeforeSignUp($this->_connectToBdd, $this->_recordDataUser);
            $this->_success = '';
            $this->_username = '';
            $this->_key = '';
            $this->_rowCount = null;
        }
        
    }
?>