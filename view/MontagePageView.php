<?php

  class MontagePage extends View {
    
    public function bodyPage()
    {
    ?>
    <div class="container col bg-primary" style="margin-top: 150px">
      <div class="row justify-content-around">
        <div class="col-md-8 bg-warning" style="min-height: 70vh">
        <div>
          <script>
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia
          </script>
        </div>
        </div>
        <div class="col-md-3 bg-success" style="min-height: 70vh">
          <h1>Options</h1>
          <hr>
          <div class="w-75 bg-danger">

          </div>
          <form action="#" method="post">
            <input type="submit" class="w-100" style="height: 4em;" name="takePhoto" value="Take Photo">
          </form>
        </div>
      </div>
    </div>
<?php
    }
  }