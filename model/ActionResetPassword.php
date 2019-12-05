<?php
    class ActionResetPassword {
        private $_linkToDb;
        private $_record;
        private $_smail;
        private $_sqlStatementResetPassword;
        private $_sqlStatementGetUsername;
        private $_rowCount;
        private $_data;
        private $_username;

        public function __construct($email) {
            $this->_linkToDb = new ConnectToBdd();
            $this->_linkToDb->connectToDb();
            $this->_record = new DataUserRecord(null, null, $email);
            $this->_sqlStatementResetPassword = new SqlStatementResetPassword($this->_linkToDb, $this->_record);
            $this->_sqlStatementGetUsername = new SqlstatementGetUsername($this->_linkToDb, $this->_record);
            $this->_smail = null;
            $this->_rowCount = null;
            $this->_username = '';
            $this->_data = [];
        }

        public function getSuccess() {
            return $this->_success;
        }

        public function setUsername($username) {
            $this->_username = $username;
        }

        public function getUsername() {
            $this->_sqlStatementGetUsername->prepare();
            $this->_sqlStatementGetUsername->execute();
            $this->_rowCount = $this->_sqlStatementGetUsername->getRowCount();
            if ($this->_rowCount == 0) { 
                echo "<div class='alert alert-danger'>Email is incorrect</div>";
            } else {
                $this->_sqlStatementGetUsername->fetch();
                $this->_data = $this->_sqlStatementGetUsername->getDataArray();
                foreach ($this->_data as $key => $value) {
                    if ($key == 'username') {
                        $username = $value;
                    }
                }
                $this->_data = $username;
                return $this->_data;
            }
    }

        public function sendEmailReset() {
            $this->_smail = new SendMail($this->_record);   
            $this->_smail->setMessage('http://localhost:8888/index.php?page=resetpassword&username='.urlencode($this->_username).'"Veuillez clickez sur ce lien pour renitialiser votre mot de passe ');
            $this->_smail->setObject("Renitialisation de mot de passe ");
            $this->_smail->setHeader();
            $this->_smail->sendmail();
        }

        public function resetpassword() {
            $this->_sqlStatementResetPassword->prepare();
            $this->_sqlStatementResetPassword->bindParam();
            $this->_sqlStatementResetPassword->execute();
        }


    }
?>