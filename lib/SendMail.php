<?php
    class SendMail{
        private $_message;
        private $_header;
        private $_email;
        private $_username;
        private $_key;

        public function __construct($record) {
            $this->_email = $record->getEmail();
            $this->_username = $record->getUsername();
            $this->_key = $record->getConfirmkey();
            $this->setConfirmAccountMessage();
            $this->setHeader();
        }

        public function getMessage() {
            return $this->_message;
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
            if (mail($this->_email, "Confirmation de votre compte", $this->_message, $this->_header)) {
                echo '<p style="margin-top:100px;"> email is sent</p>';
            } else {
                echo '<p style="margin-top:100px;"> email is not sent</p>';
            }
        }
    }
?>