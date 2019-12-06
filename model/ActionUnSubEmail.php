<?php
    class ActionUnSubEmail {
        private $_linkToDb;
        private $_record;
        private $_sqlStatementUnSubEmail;
        private $_success;

        public function __construct() {
            $this->_linkToDb = new ConnectToBdd();
            $this->_linkToDb->connectToDb();
            $this->_record = new DataUserRecord();
            $this->_success = null;
        }

        public function getSuccess() {
            return $this->_success;
        }


        public function unSubEmail() {
            $this->_sqlStatementUnSubEmail->prepare();
            $this->_sqlStatementUnSubEmail->execute();
        }

    }
?>