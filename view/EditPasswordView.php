<?php

  class EditPassword extends View {
    public function bodyPage()
    { ?>
     <div class="container w-25 mt-4">
      <form method="POST" class="row justify-center flex-column">
        <div class="form-group">
          <label name="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter a new password">
        </div>
        <div class="form-group">
          <label name="confirmPassword">Confirm Password</label>
          <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm your password">
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
     </div>
<?php
    }
  }