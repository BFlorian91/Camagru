<?php
    class ActionGallery {
        private $_record;
        private $_linkToDb;
        private $_data;
        private $_rowCount;
        private $_sqlStatementGetAllImage;

        public function __construct() {
            $this->_record = new DataUserRecord();
            $this->_linkToDb = new ConnectToBdd();
            $this->_linkToDb->connectToDb();
            $this->_data = null;
            $this->_rowCount = null;
        }

        public function getAllImagesSuccess() {
            return $this->_sqlStatementGetAllImage->getExecuteSuccess();
        }

        public function getData() {
            return $this->_data;
        }

        public function getAllImage() {
            $this->_sqlStatementGetAllImage = new SqlstatementGetAllImages($this->_linkToDb, $this->_record);
            $this->_sqlStatementGetAllImage->prepare();
            $this->_sqlStatementGetAllImage->execute();
            $this->_rowCount = $this->_sqlStatementGetAllImage->getRowCount();
            if ($this->_rowCount > 0 && $this->_sqlStatementGetAllImage->getExecuteSuccess() == true) {
                $this->_sqlStatementGetAllImage->fetchAll();
                $this->_data = $this->_sqlStatementGetAllImage->getDataArray();
            }
        }
    }
?>