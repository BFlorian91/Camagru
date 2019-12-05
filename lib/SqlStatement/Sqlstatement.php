<?php
    class Sqlstatement {
        protected $_sql;
        protected $_record;
        private $_pdo;
        protected $_pdoStatement;
        protected $_successMsg;
        private $_errorMsg;
        private $_dataArray;
        private $_executeSuccess;
        private $_rowCount;
        // _pdo need to have a method call getpdo
        public function __construct($linkToDb, $record) {
            $this->_sql = '';
            $this->_record = $record;
            $this->_pdo = $linkToDb->getPdo();
            $this->_pdoStatement = null;
            $this->_successMsg = '';
            $this->_errorMsg = '';
            $this->_dataArray = null; // initialiser au moment du fetch
            $this->_executeSuccess = null;
            $this->_rowCount = null;
        }

        public function getSuccessMsg() {
            return $this->_successMsg;
        }

        public function setSuccessMsg($msg) {
            $this->_successMsg = $msg;
        }

        public function getErrorMsg() {
            return $this->_errorMsg;
        }

        public function setErrorMsg($msg) {
            $this->_errorMsg = $msg;
        }

        public function getDataArray() {
            return $this->_dataArray;
        }
        public function getExecuteSuccess() {
            return $this->_executeSuccess;
        }
        
        public function getRowCount() {
            return $this->_rowCount;
        }

        public function prepare() {
            $this->_pdoStatement = $this->_pdo->prepare($this->_sql);
        }
        public function execute() {
            $this->_executeSuccess = $this->_pdoStatement->execute();
            $this->_rowCount = $this->_pdoStatement->rowCount();
            $errorMsg = $this->_pdoStatement->errorInfo();
            $this->_errorMsg = "there is an error ".$errorMsg[2];
        }
        
        public function fetch() {
            $this->_dataArray = $this->_pdoStatement->fetch(PDO::FETCH_ASSOC);
        }
    }
?>