<?php
    require_once 'connectToBdd.php';
    require_once 'Ctrl.php';
    require_once 'CtrlSignIn.php';

    $ctrl = Ctrl::chooseCtrl();
    $ctrl->start();
    echo $ctrl->getView();
?>