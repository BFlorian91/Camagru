<?php

  class EditUsername extends View {
    public function bodyPage()
    { ?>
      <div class="container w-25" style="margin-top: 150px;">
      <form method="POST" class="row justify-center flex-column">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username"
            placeholder="Enter new username">
            <button class="btn mt-2 btn-primary" type="submit">Submit</button>
        </div>
        <?php
    }
  }