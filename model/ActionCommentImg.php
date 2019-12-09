<?php
    class ActionCommentImg {
        private $_linkToDb;
        private $_record;
        private $_data;
        private $_comment;
        private $_getAllComment;
        private $_rowCount;
        private $_sqlStatementGetComment;
        private $_sqlStatementAddComment;
        private $_images;

        public function __construct ($comment, $images) {
            $this->_linkToDb = new ConnectToBdd();
            $this->_linkToDb->connectToDb();
            $this->_record = new DataUserRecord();
            $this->_comment = $comment;
            $this->_images = $images;
            $this->_data = [];
            $this->setData($this->_comment, $this->_images);
            $this->_getAllComment = null;
            $this->_sqlStatementGetComment = new SqlstatementGetCommentImg($this->_linkToDb, $this->_record);
        }

        public function getCommentSuccess() {
            return $this->_sqlStatementGetComment->getExecuteSuccess();
        }

        public function addCommentSuccess() {
            return $this->_sqlStatementAddComment->getExecuteSuccess();
        }

        public function setData($comment, $images) {
            array_push($this->_data,$images, $comment, date("Y-m-d H:i:s"));
        }

        public function getData() {
            return $this->_data;
        }

        public function getGetAllComment() {
            return $this->_getAllComment;
        }

        public function getRowCount() {
            return $this->_rowCount;
        }

        public function addComment() {
            $this->_sqlStatementAddComment = new SqlStatementAddCommentImg($this->_linkToDb, $this->_record, $this->_data);
            $this->_sqlStatementAddComment->prepare();
            $this->_sqlStatementAddComment->bindParam();
            $this->_sqlStatementAddComment->execute();
        }

        public function getCommment() {
            $this->_sqlStatementGetComment->prepare();
            $this->_sqlStatementGetComment->execute();
            $this->_rowCount = $this->_sqlStatementGetComment->getRowCount();
            if ($this->_sqlStatementGetComment->getExecuteSuccess() == true && $this->_rowCount > 0) {
                $this->_sqlStatementGetComment->fetchAll();
                $this->_getAllComment = $this->_sqlStatementGetComment->getDataArray();
            }
        }
    }
?>