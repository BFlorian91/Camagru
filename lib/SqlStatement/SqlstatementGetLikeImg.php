<?php
    class SqlstatementGetLikeImg extends Sqlstatement{

        private $_data;
        public function __construct($linkToDb, $record, $data) {
            parent::__construct($linkToDb, $record);
            $this->_data = $data;
            $this->_sql = "SELECT * FROM images WHERE images=:images";
        }

        public function getSql() {
            return $this->_sql;
        }

        public function bindParam() {
            $this->_pdoStatement->bindParam(':images', $this->_data[0]);
        }
    }
?>