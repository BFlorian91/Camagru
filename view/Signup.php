<?php

  class Signup extends View {

    public function bodyPage()
    {
     ?>
     <div class="container w-25" style="margin-top: 150px;">
      <form method="POST" class="row justify-center flex-column">
        <div class="form-group">
          <label name="username">Username</label>
          <input type="text" class="form-control"
            placeholder="Enter username">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
            placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label name="password">Password</label>
          <input type="password" class="form-control" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
     </div>
<?php 
    }
  }