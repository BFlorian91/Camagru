<?php
    class ActionResetPassword {
        private $_linkToDb;
        private $_record;
        private $_success;
        private $_sqlStatementResetPassword;

        public function __contruct($email) {
            $this->_linkToDb = new ConnectToBdd();
            $this->_linkToDb->connectToDb();
            $this->_record = DataUserRecord(null, null, $email);
            $this->_sqlStatementResetPassword = new SqlStatementResetPassword($this->_linkToDb, $this->_record);
            $this->_success = null;
        }

        public function getSuccess() {
            return $this->_success;
        }

        public function resetpassword() {
            $this->_sqlStatementResetPassword->prepare();
            $this->_sqlStatementResetPassword->bindParam();
            $this->_success = $this->_sqlStatementResetPassword->execute();
        }


    }
?>