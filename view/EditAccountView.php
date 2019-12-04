<?php

  class EditAccount extends View {

    public function bodyPage()
    { ?>
     <div class="container w-50" style="margin-top: 150px;">
     <h3>Edit Account</h3>
 
        <a href="index.php?page=editusername"><button class="btn btn-dark">Name change</button></a>
        <a href="index.php?page=editemail"><button class="btn btn-dark">Email change</button></a>
        <a href="index.php?page=editpassword"><button class="btn btn-dark">Password change</button></a>
      <hr class="py-4 mt-4" >
      <h3>User settings</h3>
      <p>Email</p>
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitch">
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