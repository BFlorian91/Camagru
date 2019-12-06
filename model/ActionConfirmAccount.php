<?php
    class ActionConfirmAccount {
        private $_record;
        private $_linktobdd;
        private $_issuccess;
        private $_sqlCheckAlreadyConfirm;
        private $_sqlConfirmAccount;
        private $_rowCount;
        private $_data;

        public function __construct($key, $username) {
            $this->_record = new DataUserRecord($username);
            $this->_linktobdd = new ConnectToBdd();
            $this->_linktobdd->connectToDb();
            $this->_sqlCheckAlreadyConfirm = new SqlstatementCheckAlreadyConfirm($key,$this->_linktobdd, $this->_record);
            $this->_sqlConfirmAccount = new SqlstatementConfirmAccount($key, $this->_linktobdd, $this->_record);
            $this->_data = [];
        }

        public function checkIfAlreadyConfirm() {
            $this->_sqlCheckAlreadyConfirm->prepare();
            $this->_sqlCheckAlreadyConfirm->execute();
            $this->_issuccess = $this->_sqlCheckAlreadyConfirm->getExecuteSuccess();
            $this->_rowCount = $this->_sqlCheckAlreadyConfirm->getRowCount();
            $this->_sqlCheckAlreadyConfirm->fetch();
            $this->_data = $this->_sqlCheckAlreadyConfirm->getDataArray();
            if ($this->_data['confirme'] == '0') {
                $this->_rowCount = 0;
            }
            return $this->_rowCount;
        }

        public function getSuccess() {
            return $this->_issuccess;
        }

        public function confirmAccount() {
            $this->_sqlConfirmAccount->prepare();
            $this->_sqlConfirmAccount->execute();
            $this->_issuccess = $this->_sqlConfirmAccount->getExecuteSuccess();
          }
    }
?>