<?php
    class ActionEditPassword {
        private $_linktodb;
        private $_record;
        private $_sqlStatementEditPassword;
        private $_success;

        public function __construct ($password) {
            $this->_linktodb = new ConnectToBdd();
            $this->_record = new DataUserRecord($password);
            $this->_linktodb->connectToDb();
            $this->_success = null;
            $this->_sqlStatementEditPassword = new SqlStatementEditPassword($this->_linktodb, $this->_record);
        }

        public function getSuccess() {
            return $this->_success;
        }

        public function editPassword() {
            $this->_sqlStatementEditPassword->prepare();
            $this->_sqlStatementEditPassword->execute();
            $this->_success = $this->_sqlStatementEditPassword->getExecuteSuccess();
        }

    }
?>