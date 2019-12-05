<?php
    class SendMail{
        private $_message;
        private $_header;
        private $_email;
        private $_username;
        private $_key;
        private $_record;
        private $_object;

        public function __construct($record) {
            $this->_record = $record;
            $this->_email = $this->_record->getEmail();
            $this->_username = $this->_record->getUsername();
            $this->_key = $this->_record->getConfirmkey();
            $this->_object = '';
           // $this->setConfirmAccountMessage();
            //$this->setHeader();
        }

        public function getObject() {
            return $this->_object;
        }

        public function setObject($obj) {
            $this->_object = $obj;
        }

        public function getMessage() {
            return $this->_message;
        }

        public function setMessage($msg) {
            $this->_message = $msg;
        }

        public function setConfirmAccountMessage() {
             $this->_message = 'http://localhost:8888/index.php?page=confirm&username='.urlencode($this->_username).'&key='.$this->_key.'"Veuillez clickez sur ce lien pour confirmez Votre compte';
        }

        public function setHeader() {
            $eol = "\r\n";
            $this->_header .= "MIME-Version: 1.0" . $eol;
            $this->_header = "From:Bod<thibaultdev682@gmail.com>" . '\n';
            $this->_header .= "Content-Type:text/html; charset='utf-8'" . '\n';
            $this->_header .= "Content-Transfer-Encoding: 8bit";
        }

        public function sendmail() {
            if (mail($this->_email, $this->_object, $this->_message, $this->_header)) {
                echo '<p style="margin-top:100px;"> email is sent</p>';
            } else {
                echo '<p style="margin-top:100px;"> email is not sent</p>';
            }
        }
    }
?>