<?php

  ?>
  <!DOCTYPE html>
  <html lang="en">
    <body>
     <h1>this is: </h1> 
    <p id="photo"><?php
    foreach ($_POST as $postlol) {
      echo $postlol;
    }
    ?>
    </p>
    </body>
  </html>