<?php

  class Signin extends View {

    public function bodyPage()
    {
     ?>
     <div class="container w-25" style="margin-top: 150px;">
      <form method="POST" class="row justify-center flex-column">
        <div class="form-group">
          <label name="userName">Username / Email</label>
          <input type="text" class="form-control"
            placeholder="Enter username or email">
        </div>
        <div class="form-group">
          <label name="password">Password</label>
          <input type="password" class="form-control" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
     </div>
<?php 
    }
  }