<?php

  class EditEmail extends View {
    public function bodyPage()
    { ?>
      <div class="container w-25 mt-4">
      <form method="POST" class="row justify-center flex-column">
        <div class="form-group">
          <label>Email address</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
            placeholder="Enter new email">
            <button class="btn mt-2 btn-primary" type="submit">Submit</button>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <?php 
     }
  }