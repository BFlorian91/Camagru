<?php 
    require_once 'lib/debug.php';
    require_once 'view/View.php';
    require_once 'view/SigninView.php';
    require_once 'view/SignupView.php';
    require_once 'view/EditAccountView.php';
    require_once 'view/ConfirmAccountView.php';
    require_once 'view/MontagePageView.php';
    require_once 'view/GalleryView.php';
    require_once 'view/EditEmailView.php';
    require_once 'view/EditPasswordView.php';
    require_once 'view/EditUsernameView.php';
    require_once 'connectToBdd.php';
    require_once 'lib/DataUserRecord.php';
    require_once 'lib/isLogged.php';
    require_once 'lib/SendMail.php';
    require_once 'lib/SqlStatement/Sqlstatement.php';
    require_once 'lib/SqlStatement/SqlStatementCheckBeforeSignUp.php';
    require_once 'lib/SqlStatement/SqlstatementSignUp.php';
    require_once 'lib/SqlStatement/SqlstatementSignIn.php';
    require_once 'lib/SqlStatement/SqlstatementCheckAlreadyConfirm.php';
    require_once 'lib/SqlStatement/SqlstatementConfirmAccount.php';
    require_once 'lib/SqlStatement/SqlstatementEditEmail.php';
    require_once 'lib/SqlStatement/SqlstatementCheckBeforeEditEmail.php';
    require_once 'lib/SqlStatement/SqlstatementEditPassword.php';
    require_once 'lib/SqlStatement/SqlstatementEditUsername.php';
    require_once 'lib/SqlStatement/SqlstatementCheckBeforeEditUsername.php';
    require_once 'lib/SqlStatement/SqlstatementUnSubEmail.php';
    require_once 'model/ActionSignUp.php';
    require_once 'model/ActionSignIn.php';
    require_once 'model/ActionConfirmAccount.php';
    require_once 'model/ActionEditEmail.php';
    require_once 'model/ActionEditPassword.php';
    require_once 'model/ActionEditUsername.php';
    require_once 'model/ActionUnSubEmail.php';
    require_once 'Ctrl/Ctrl.php';
    require_once 'Ctrl/CtrlSignUp.php';
    require_once 'Ctrl/CtrlSignIn.php';
    require_once 'Ctrl/CtrlGallery.php';
    require_once 'Ctrl/CtrlMontage.php';
    require_once 'Ctrl/CtrlConfirmAccount.php';
    require_once 'Ctrl/CtrlEditEmail.php';
    require_once 'Ctrl/CtrlEditPassword.php';
    require_once 'Ctrl/CtrlEditUsername.php';
    require_once 'Ctrl/CtrlUnSubEmail.php';
    $ctrl = Ctrl::chooseCtrl();
    $ctrl->start();
    echo $ctrl->getView();
?>