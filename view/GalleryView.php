<?php

  class Gallery extends View {

    private $_images;

    public function __construct($images) {
      $this->_images = $images;
    }
    public function bodyPage()
    { ?>
      <div class="container">
        <h1 class="text-center">Home</h1>
          <?php
            echo '<form method="post">
              <img src="'.$this->_images.'">              
                <button class="like">Like</button>
                <textarea name="commentary" cols="100" rows="5" placeholder="had a comment"></textarea>
                <button type="submit" class="btn btn-primmary">Send</button>
              </form>';
          ?>
      </div>
    <?php
    }
  }