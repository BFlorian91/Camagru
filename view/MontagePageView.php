<?php

class MontagePage extends View
{

  public function bodyPage()
  {
    ?>
    <div class="container col mt-4">
      <div class="row justify-content-center">
        <div class="col-md-6 ml-4" style="min-height: 80vh; border: solid 1px">
          <video class="w-100 position-relative" id="video" playinline autoplay></video>
          <canvas class="w-100" id="canvas"></canvas>
          <div class="output">
            <img alt="photo" id="photo">
          </div>
        </div>
        <div class="col-md-2 ml-4" style="min-height: 80vh; border: solid 1px;">
          <h1 class="text-center">Options</h1>
          <hr>
          <div class="row justify-content-center mb-4">
            <a href="index.php?page=montage&filter=1"><img width="100" src="../lib/filtre/lu1.png" alt="magi"></a>
            <a href="index.php?page=montage&filter=2"><img width="100" src="../lib/filtre/russ.png" alt="magi"></a>
            <a href="index.php?page=montage&filter=3"><img width="100" src="../lib/filtre/homer.png" alt="magi"></a>
            <a href="index.php?page=montage&filter=4"><img width="100" src="../lib/filtre/marge.png" alt="magi"></a>
            <a href="index.php?page=montage&filter=5"><img width="100" src="../lib/filtre/Rick.png" alt="magi"></a>
            <a href="index.php?page=montage&filter=6"><img width="100" src="../lib/filtre/bender.png" alt="magi"></a>
          </div>
          <?php if (!isset($_GET['filter']) && empty($_GET['filter'])): ?>
            <button disabled class="w-100 py-2 mb-2" id="startButton">Take photo</button>
          <?php elseif ($_GET['filter'] > 0 || $_GET['filter'] < 7): ?>
            <button class="w-100 py-2 mb-2" id="startButton">Take photo</button>
          <?php endif; ?>
          <!-- <p id="test"></p> -->
          <form method="post">
            <input type="hidden" name="img" id="img" value="">
            <input class="w-100 py-2 mb-2" name="takePhoto" type="submit" value="Save photo">
          </form>
          <button class="w-100 py-2" id="clearButton">Clear photo</button>
          <form action="#" method="post" enctype="multipart/form-data">
            Select image to upload: 
            <input class="w-100 py-2 mb-2" type="file" name="imgUpload">
            <input class="w-100 py-2 mb-2" type="submit" value="Upload Image" name="uploadPhoto">
          </form>
        </div>
      </div>
    </div>
    <script src="lib/js/camera.js"></script>
<?php
  }
}
