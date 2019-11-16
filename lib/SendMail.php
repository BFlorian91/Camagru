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
            $this->setMessage();
            $this->setHeader();
        }

        public function getMessage() {
            return $this->_message;
        }

        public function setMessage() {
             $this->_message = '<html>
                     <body>
                         <div align="center">
                             <a href="http://localhost:8888/index.php?page=confirm.php?username='.urlencode($this->_username).'&key'.$this->_key.'">Confirmez Votre compte</a>
                         </div>
                     </body>
                 </html>';
        }

        public function setHeader() {
            $eol = "\r\n";
            $separator = md5(time());
            $this->_header = "From: name <noreply@bod.com>" . $eol;
            $this->_header .= "MIME-Version: 1.0" . $eol;
            $this->_header .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
            $this->_header .= "Content-Transfer-Encoding: 7bit" . $eol;
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