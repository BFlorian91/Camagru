<?php
    class ActionEditPassword {
        private $_linktodb;
        private $_record;
        private $_sqlStatementEditPassword;
        private $_success;

        public function __construct ($password, $confirmPassword) {
            $this->_linktodb = new ConnectToBdd();
            $this->_record = new DataUserRecord(null, $password, null, $confirmPassword);
            $this->_linktodb->connectToDb();
            $this->_success = null;
            $this->_sqlStatementEditPassword = new SqlStatementEditPassword($this->_linktodb, $this->_record);
        }

        public function getSuccess() {
            return $this->_sqlStatementEditPassword->getExecuteSuccess();
        }

        public function checkSecu() {
            if ($this->_record->checkSecu() == false) {
                return false;
            }
            return true;
        }

        public function editPassword() {
            $this->_sqlStatementEditPassword->prepare();
            $this->_sqlStatementEditPassword->bindParam();
            $this->_sqlStatementEditPassword->execute();
            $this->_sqlStatementEditPassword->getExecuteSuccess();
        }

    }
?>