<?php
class CtrlGallery extends Ctrl {
    private $_actionGetImg;
    private $_images;
    private $_actionLikeImg;
    private $_actionCommentImg;
    private $_commentnumber;
    private $_like;
    private $_comment;
    public function __construct()
    {
        $this->_action = null;
        $this->_images = [];
        $this->_addLike = null;
        $this->_getLike = null;
        $this->_actionCommentImg = null;
        $this->_like = null;
        $this->_comment = null;
        $this->_commentnumber = null;
    }

    public function start()
    {
        $this->_actionGetImg = new ActionGallery();
        $this->_actionGetImg->getAllImage();
        $this->_images = $this->_actionGetImg->getData();
        $this->_actionCommentImg = new ActionCommentImg($_POST['comment'], $this->images);
        $this->_actionCommentImg->getCommment();
        $this->_comment = $this->_actionCommentImg->getGetAllComment();
        $this->_actionLikeImg = new ActionLikeImg($this->images, $this->_like);
        $this->_actionLikeImg->getLikeImg();
        $this->_like = $this->_actionLikeImg->getResultGetLike();
        if (isset($_POST['comment']) && !empty($_POST['comment'])) {
            if (isLogged() == true) {
                $this->_actionCommentImg->addComment();
                if ($this->_actionCommentImg->addCommentSuccess() == true) { }
            }
        }
        if (isLogged() == true) {
            if (isset($_POST['like'])) {
                $this->_actionLikeImg->setLike($this->_like);
                $this->_actionLikeImg->addLikeImg();
                if ($this->_actionLikeImg->getAddLikeSuccess() == true) {
                    $this->_actionLikeImg->getLikeImg();
                    $this->_actionLikeImg->getResultGetLike();
                }
            }

        }

        $this->_view = new Gallery($this->images, $this->_like, $this->_comment);
        $this->_view->buildPage();
    }
}
