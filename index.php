<?php 
    require_once 'lib/debug.php';
    require_once 'view/View.php';
    require_once 'view/SigninView.php';
    require_once 'view/SignupView.php';
    require_once 'view/EditAccountView.php';
    require_once 'view/MontagePageView.php';
    require_once 'view/GalleryView.php';
    require_once 'connectToBdd.php';
    require_once 'lib/DataUserRecord.php';
    require_once 'lib/SendMail.php';
    require_once 'lib/SqlStatement/Sqlstatement.php';
    require_once 'lib/SqlStatement/SqlStatementCheckBeforeSignUp.php';
    require_once 'lib/SqlStatement/SqlstatementSignUp.php';
    require_once 'lib/SqlStatement/SqlstatementSignIn.php';
    require_once 'modele/ActionSignUp.php';
    require_once 'modele/ActionSignIn.php';
    require_once 'Ctrl/Ctrl.php';
    require_once 'Ctrl/CtrlSignUp.php';
    require_once 'Ctrl/CtrlSignIn.php';
    require_once 'Ctrl/CtrlGallery.php';
    require_once 'Ctrl/CtrlMontage.php';

    $ctrl = Ctrl::chooseCtrl();
    $ctrl->start();
    echo $ctrl->getView();
?>