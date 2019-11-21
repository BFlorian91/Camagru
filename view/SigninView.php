<?php

  class Signin extends View {

    public function bodyPage()
    {
     ?>
     <div class="container w-25" style="margin-top: 150px;">
      <form method="POST" class="row justify-center flex-column">
        <div class="form-group">
          <label >Username / Email</label>
          <input type="text" class="form-control" name="username"
            placeholder="Enter username or email">
        </div>
        <div class="form-group">
          <label name="password">Password</label>
          <input type="password" class="form-control" placeholder="Enter password" name="password">
        </div>
        <div class="form-group">
          <a href="#">Forget password ?</a>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
     </div>
<?php 
    }
  }