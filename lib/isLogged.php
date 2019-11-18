<?php
    function isLogged() {
        session_start();
        if (isset($_SESSION['name'])) {
            return true;
        } else {
            return false;
        }
    }
?>