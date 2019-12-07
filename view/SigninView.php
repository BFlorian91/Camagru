<?php

  class Signin extends View {

    public function bodyPage()
    {
     ?>
     <div class="container w-25 mt-4">
      <form method="POST" action="/index.php?page=signin" class="row justify-center flex-column">
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
          <a href="index.php?page=resetpassword">Forget password ?</a>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
     </div>
<?php 
    }
  }