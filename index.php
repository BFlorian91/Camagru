<?php 
    require_once 'lib/debug.php';
    require_once 'view/View.php';
    require_once 'view/Signup.php';
    require_once 'view/EditAccount.php';
    require_once 'connectToBdd.php';
    require_once 'lib/DataUserRecord.php';
    require_once 'lib/SqlStatement/Sqlstatement.php';
    require_once 'lib/SqlStatement/SqlstatementSignUp.php';
    require_once 'modele/ActionSignUp.php';
    require_once 'Ctrl/Ctrl.php';
    require_once 'Ctrl/CtrlSignUp.php';

    $ctrl = Ctrl::chooseCtrl();
    $ctrl->start();
    echo $ctrl->getView();
?>