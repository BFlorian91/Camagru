<?php
    class ActionLikeImg {
        private $_record;
        private $_linkToDb;
        private $_data;
        private $_sqlStatementAddLikeImg;
        private $_sqlStatementGetLikeImg;
        private $_rowcount;
        private $_resultGetImg;
        private $_like;
        
        public function __construct($images, $like = null) {
            $this->_linkToDb = new ConnectToBdd();
            $this->_record = new DataUserRecord();
            $this->_linkToDb->connectToDb();
            $this->_data = [];
            $this->_rowcount = null;
            $this->_resultGetImg = null;
            $this->setData($images);
        }
        
        public function setLike($like) {
            $this->_like = $like + 1;
            array_push($this->_data, $this->_like);
        }

        public function setData($images) {
            array_push($this->_data, $images);
        }

        public function getData() {
            return $this->_data;
        }

        public function getGetLikeimgSuccess() {
            return $this->_sqlStatementGetLikeImg->getExecuteSuccess();
        }

        public function getAddLikeSuccess() {
            return $this->_sqlStatementAddLikeImg->getExecuteSuccess();
        }

        public function getResultGetLike() {
            return $this->_resultGetImg['likes'];
        }

        public function getLikeImg() {
            $this->_sqlStatementGetLikeImg = new SqlstatementGetLikeImg($this->_linkToDb, $this->_record, $this->_data);
            $this->_sqlStatementGetLikeImg->prepare();
            $this->_sqlStatementGetLikeImg->bindParam();
            $this->_sqlStatementGetLikeImg->execute();
            $this->_rowcount = $this->_sqlStatementGetLikeImg->getRowCount();
            $this->_sqlStatementGetLikeImg->fetch();
            if ($this->_sqlStatementGetLikeImg->getExecuteSuccess() == true && $this->_rowcount > 0) {
                $this->_resultGetImg = $this->_sqlStatementGetLikeImg->getDataArray();
            }
        }

        public function addLikeImg() {
            $this->_sqlStatementAddLikeImg = new SqlstatementAddLikeImg($this->_linkToDb, $this->_record, $this->_data);
            $this->_sqlStatementAddLikeImg->prepare();
            $this->_sqlStatementAddLikeImg->bindParam();
            $this->_sqlStatementAddLikeImg->execute();
            $this->_sqlStatementAddLikeImg->getExecuteSuccess();
        }
    }
?>