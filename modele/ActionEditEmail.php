<?php
    class ActionEditEmail {
        private $_linktodb;
        private $_record;
        private $_sqlstatementEditEmail;
        private $_success;

        public function __construct($email) {
            $this->_linktodb = new ConnectToBdd();
            $this->_linktodb->connectToDb();
            $this->_record = new DataUserRecord(null, null, $email);
            $this->_sqlstatementEditEmail = new SqlstatementEditEmail($this->_linktodb, $this->_record);
            $this->_success = null;
        }

        public function getSuccess() {
            return $this->_success;
        }

        public function editEmail() {
            $this->_sqlstatementEditEmail->prepare();
            $this->_sqlstatementEditEmail->execute();
            $this->_success = $this->_sqlstatementEditEmail->getExecuteSuccess();            
        }
    }
?>