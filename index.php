<?php
    // require_once 'connectToBdd.php';
    // require_once 'Ctrl.php';
    // require_once 'CtrlSignIn.php';

    // $ctrl = Ctrl::chooseCtrl();
    // $ctrl->start();
    // echo $ctrl->getView();

    require_once 'view/View.php';
    require_once 'view/EditAccount.php';

    $view = new EditAccount();
    echo $view->buildPage();
?>