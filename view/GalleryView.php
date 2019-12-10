<?php

class Gallery extends View
{
  private $_data;
  public function __construct($data)
  {
    $this->_data = $data;
  }
  public function bodyPage()
  { ?>
    <div class="container">
      <h1 class="text-center">Home</h1>
      <?php

          echo '<form method="post">
            <img name="' . $this->_data['images'] . ' "src="' . $this->_data['images'] . '">              
              <button type="submit" name="like">Like</button>
                  <p>' . $this->_data['likes'] . '<p>
                  <p>' . $this->_data['username'] . '</p>
                  ';
          foreach ($this->_data['commentAndDate'] as $value) {
            echo '<p>' . $value . '</p>';
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
