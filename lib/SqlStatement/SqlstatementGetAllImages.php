<?php
    class SqlstatementGetAllImages extends Sqlstatement{

        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $this->_sql = "SELECT * from images";
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>