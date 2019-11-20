<?php

  class MontagePage extends View {
    
    public function bodyPage()
    {
    ?>
    <div class="container col" style="margin-top: 150px">
      <div class="row justify-content-center">
        <div class="col-md-6 ml-4" style="min-height: 80vh; border: solid 1px">
          <video class="w-100 position-relative" id="video" playinline autoplay ></video>
          <canvas class="w-100" id="canvas"></canvas>
          <div class="output">
            <img alt="photo" id="photo">
          </div>
          <p style="margin-top:250px;">
          <?php
            foreach ($_POST as $postlol) {
              echo $postlol;
            } ?>
          </p>
        </div>
        <div class="col-md-2 ml-4" style="min-height: 80vh; border: solid 1px;">
          <h1 class="text-center">Options</h1>
          <hr>
          <div class="row justify-content-center mb-4">
            <img width="100" src="../lib/filtre/lu1.png" alt="magi">
            <img width="100" src="../lib/filtre/lu1.png" alt="magi">
            <img width="100" src="../lib/filtre/lu1.png" alt="magi">
            <img width="100" src="../lib/filtre/lu1.png" alt="magi">
            <img width="100" src="../lib/filtre/lu1.png" alt="magi">
            <img width="100" src="../lib/filtre/lu1.png" alt="magi">
          </div>
          <button class="w-100 py-2 mb-4" id="startButton">Take photo</button> 
          <a href="#" id="dl-btn" download="lol.jpg"><span class="w-100 py-2 mb-4" id="saveButton">Save photo</span></a>
          <button class="w-100 py-2" id="clearButton">Clear photo</button> 
        </div>
      </div>
    </div>
    <script src="../lib/js/camera.js"></script>
<?php
    }
  }