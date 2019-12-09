<?php
    class SqlStatementAddCommentImg extends Sqlstatement{
        private $_data;

        public function __construct($linkToDb, $record, $data) {
            parent::__construct($linkToDb, $record);
            $this->_data = $data;
            debug($this->_data);
            $this->_sql = "INSERT INTO comment(images,username, comment, comment_date) VALUES (:images, :username, :comment, :comment_date);";
        }

        public function bindParam() {
            $this->_pdoStatement->bindParam(':images', $this->_data[0]);
            $this->_pdoStatement->bindParam(':username', $_SESSION['user']);
            $this->_pdoStatement->bindParam(':comment', $this->_data[1]);
            $this->_pdoStatement->bindParam(':comment_date', $this->_data[2]);
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>