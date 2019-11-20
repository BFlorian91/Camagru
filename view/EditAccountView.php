<?php

  class EditAccount extends View {

    public function bodyPage()
    { ?>
     <div class="container w-50" style="margin-top: 150px;">
     <h3>Edit Account</h3>
      <form method="POST" class="row justify-start flex-column">
        <div class="form-group">
          <label>Username</label>
          <input name="username" type="text" class="form-control"
            placeholder="Enter New username">
        </div>
        <a href="index.php?page=editemail"><button>Email change</button></a>
        <div class="form-group">
          <label >Password</label>
          <input name="password" type="password" class="form-control" placeholder="Enter new password">
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
      <hr class="py-4 mt-4" >
      <h3>User settings</h3>
      <p>Email</p>
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitch1">
        <label 
          class="custom-control-label"
          name="switchNotificationMail"
          for="customSwitch1">Toggle for activate/desactivate mail notification when your image was commented.
        </label>
      </div>
     </div>
<?php
    }    
  }