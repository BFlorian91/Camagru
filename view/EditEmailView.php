<?php

  class EditEmail extends View {
    public function bodyPage()
    { ?>
      <div class="container w-25" style="margin-top: 150px;">
      <form method="POST" class="row justify-center flex-column">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
            placeholder="Enter new email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <?php 
     }
  }