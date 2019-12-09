<?php

  class Gallery extends View {
    private $_data;
    public function __construct($data) {
      $this->_data = $data;
    }
    public function bodyPage()
    { ?>
      <div class="container">
        <h1 class="text-center">Home</h1>
          <?php
          foreach ($this->_data as $key => $value) {
            echo '<form method="post">
            <img name="'.$value['images'].' "src="'.$value['images'].'">              
              <button type="submit" name="like">Like</button>
                  <p>'. $value['likes'].'<p>
                  <p>'.$value['username'].'</p>
                  <p>'.$value['comment'].'</p>
                  <p>'.$value['comment_date'].'</p>
              <textarea name="comment" cols="100" rows="5" placeholder="had a comment"></textarea>
              <button type="submit" class="btn btn-primmary">Send</button>
            </form>';
          }
          ?>
      </div>
    <?php
    }
  }