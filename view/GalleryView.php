<?php

  class Gallery extends View {

    private $_images;
    private $_likes;
    private $_comment;

    public function __construct($images, $likes = null, $comment = null) {
      $this->_images = $images;
      $this->_likes = $likes;
      $this->_comment = $comment;
    }
    public function bodyPage()
    { ?>
      <div class="container">
        <h1 class="text-center">Home</h1>
          <?php
            echo '<form method="post">
              <img src="'.$this->_images.'">              
                <button type="submit" name="like">Like</button>
                <p>'. $this->_likes.'<p>
                ';
                  foreach ($this->_comment as $key => $value) {
                    echo '<p>'.$value['comment'].'</p>';
                    echo '<p>'.$value['username'].'</p>';
                    echo '<p>'.$value['comment'].'</p>';
                  }
                echo '
                <textarea name="comment" cols="100" rows="5" placeholder="had a comment"></textarea>
                <button type="submit" class="btn btn-primmary">Send</button>
              </form>';
          ?>
      </div>
    <?php
    }
  }