<?php
    class ActionEditUsername {
        private $_linkToDb;
        private $_record;
        private $_sqlStatementEditUsername;
        private $_success;

        public function __construct($username, $email) {
            $this->_linkToDb = new ConnectToBdd();
            $this->_linkToDb->connectToDb();
            $this->_record = new DataUserRecord($username, null, $email);
            $this->_sqlStatementEditUsername = new SqlstatementEditUsername($this->_linkToDb, $this->_record);
            $this->_success = null;
        }

        public function getSuccess() {
            return $this->_success;
        }

        public function editUsername() {
            $this->_sqlStatementEditUsername->prepare();
            $this->_sqlStatementEditUsername->bindParam();
            $this->_sqlStatementEditUsername->execute();
            $this->_success = $this->_sqlStatementEditUsername->getExecuteSuccess();
        }
    }
?>