<?php
    class SqlstatementGetCommentImg extends Sqlstatement {
        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $this->_sql = "SELECT comment.comment, comment.comment_date FROM comment JOIN images ON comment.images = images.images";
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>