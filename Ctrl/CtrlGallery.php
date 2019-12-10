<?php
class CtrlGallery extends Ctrl {
    private $_actionGetImg;
    private $_images;
    private $_actionLikeImg;
    private $_actionCommentImg;
    private $_commentnumber;
    private $_like;
    private $_comment;
    private $_data;

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
        $this->_data = [];
    }

    public function start()
    {
        $this->_actionGetImg = new ActionGallery();
        $this->_actionGetImg->getAllImage();
        $this->_images = $this->_actionGetImg->getData();
        foreach ($this->_images as $key => $value) {
            $this->_actionCommentImg = new ActionCommentImg($_POST['comment'], $value['images']);
            $this->_actionLikeImg = new ActionLikeImg($value['images'], $this->_like);$this->_actionCommentImg->getCommment();
            $this->_comment = $this->_actionCommentImg->getGetAllComment();
            $this->_actionLikeImg->getLikeImg();
            $this->_like = $this->_actionLikeImg->getResultGetLike();
    
            if (isset($_POST['comment']) && !empty($_POST['comment'])) {
                if (isLogged() == true) {
                    $this->_actionCommentImg->addComment();
                    if ($this->_actionCommentImg->addCommentSuccess() == true) {
                        $this->_actionCommentImg->getCommment();
                        $this->_comment = $this->_actionCommentImg->getGetAllComment();
                     }
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
            $this->_data = [
                'username' => $value['username'],
                'images' => $value['images'],
                'likes' => $this->_like,
            ];
            foreach ($this->_comment as $values) {
                array_push($this->_data, ['comment' => $values['comment'], 'comment_date' => $values['comment_date']]);
            }
        }
        $this->_view = new Gallery($this->_data);
        $this->_view->buildPage();
    }
}
