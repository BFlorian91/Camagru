<?php
    class ActionIsUserUnSubEmail {
        private $_sqlStatementIsUserUnSub;
        private $_record;
        private $_linkToDb;
        private $_data;
        

        public function __construct($username) {
            $this->_record = new DataUserRecord($username, null, null);
            $this->_linkToDb = new ConnectToBdd();
            $this->_linkToDb->connectToDb();
            $this->_sqlStatementIsUserUnSub = new SqlstatementIsUserUnSubEmail($this->_linkToDb, $this->_record);
            $this->_data = [];
        }

        public function isUserUnSub() {
            $this->_sqlStatementIsUserUnSub->prepare();
            $this->_sqlStatementIsUserUnSub->bindParam();
            $this->_sqlStatementIsUserUnSub->execute();
            $this->_sqlStatementIsUserUnSub->fetch();
            $this->_data = $this->_sqlStatementIsUserUnSub->getDataArray();
            if ($this->_data['subemail'] == 0) { 
                return true;
            } else {
                return false;
            }
        }
    }
?>