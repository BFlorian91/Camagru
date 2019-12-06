<?php
    class ActionEditUsername {
        private $_linkToDb;
        private $_record;
        private $_sqlStatementEditUsername;
        private $_sqlstatementCheckBeforeEditUsername;
        private $_getRow;
        private $_success;

        public function __construct($username) {
            $this->_linkToDb = new ConnectToBdd();
            $this->_linkToDb->connectToDb();
            $this->_record = new DataUserRecord($username, null, null);
            $this->_sqlStatementEditUsername = new SqlstatementEditUsername($this->_linkToDb, $this->_record);
            $this->_sqlstatementCheckBeforeEditUsername = new SqlstatementCheckBeforeEditUsername($this->_linkToDb, $this->_record);
            $this->_success = null;
            $this->_getRow = null;
        }

        public function getSuccess() {
            return $this->_sqlStatementEditUsername->getExecuteSuccess();
        }
        public function editUsername() {
            $this->_sqlstatementCheckBeforeEditUsername->prepare();
            $this->_sqlstatementCheckBeforeEditUsername->bindParam();
            $this->_sqlstatementCheckBeforeEditUsername->execute();
            $this->_getRow = $this->_sqlstatementCheckBeforeEditUsername->getRowCount();
            if ($this->_getRow == 0) {
                $this->_sqlStatementEditUsername->prepare();
                $this->_sqlStatementEditUsername->bindParam();
                $this->_sqlStatementEditUsername->execute();
                if ($this->_sqlStatementEditUsername->getExecuteSuccess() == true) {
                    $_SESSION['user'] = htmlspecialchars($this->_record->getUsername());
                }
            }
        }
    }
?>