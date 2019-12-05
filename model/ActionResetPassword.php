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
        private $_password;
        private $_isUserSubEmail;

        public function __construct($username = null, $password = null, $email = null)  {
            $this->setData($username, $password, $email);
        }

        public function getSuccess() {
            return $this->_sqlStatementResetPassword->getSuccess();
        }

        public function setUsername($username) {
            $this->_username = $username;
        }

        public function setPassword($passwd) {
            $this->_password = $passwd;
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
            $this->_isUserSubEmail = new ActionIsUserUnSubEmail($this->_username);
            if ($this->_isUserSubEmail->isUserUnSub() == false) {
                $this->_smail = new SendMail($this->_record);   
                $this->_smail->setMessage('http://localhost:8888/index.php?page=resetpassword&username='.urlencode($this->_username).'"Veuillez clickez sur ce lien pour renitialiser votre mot de passe ');
                $this->_smail->setObject("Renitialisation de mot de passe ");
                $this->_smail->setHeader();
                $this->_smail->sendmail();
            } else {
                echo "<h1 style='margin-top:150px'>Your are unsub we cant send u an email</h1>";
            }

        }

        public function resetpassword() {
            $this->_sqlStatementResetPassword->prepare();
            $this->_sqlStatementResetPassword->bindParam();
            $this->_sqlStatementResetPassword->execute();
            if ($this->_sqlStatementResetPassword->getExecuteSuccess() == true) {
                echo "<div class='alert alert-success text-center mr-5 ml-5' style='margin-top: 150px;'><h5>Your password is now reset</h5></div>";
            } else {
                echo "<div class='alert alert-danger mr-5 ml-5' style='margin-top: 150px;'><h5>cannot reset your password</h5></div>";
            }
        }

        public function setData($username = null, $password = null, $email = null) {
            $this->_linkToDb = new ConnectToBdd();
            $this->_linkToDb->connectToDb();
            if ($username != null && $password != null) {
                $this->_record = new DataUserRecord($username, $password, null);
                $this->_sqlStatementResetPassword = new SqlStatementResetPassword($this->_linkToDb, $this->_record);
            } else {
                $this->_record = new DataUserRecord(null, null, $email);
            }
            $this->_sqlStatementGetUsername = new SqlstatementGetUsername($this->_linkToDb, $this->_record);
            $this->_smail = null;
            $this->_rowCount = null;
            $this->_data = [];
            $this->_isUserSubEmail = null;
        }

    }
?>