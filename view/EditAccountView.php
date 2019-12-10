<?php

  class EditAccount extends View {

    public function bodyPage()
    { ?>
     <div class="container w-50 mt-4">
     <h3>Edit Account</h3>
 
        <a href="index.php?page=editusername"><button class="btn btn-dark">Name change</button></a>
        <a href="index.php?page=editemail"><button class="btn btn-dark">Email change</button></a>
        <a href="index.php?page=editpassword"><button class="btn btn-dark">Password change</button></a>
      <hr class="py-4 mt-4" >
      <h3>User settings</h3>
      <p>Email</p>
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" name="switchNotificationMail" id="customSwitch1">
        <label class="custom-control-label" for="customSwitch1">Toggle for activate/desactivate mail notification when your image was commented.</label>
      </div>
     </div>
<?php
    }    
  }