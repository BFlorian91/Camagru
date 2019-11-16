<?php

  class MontagePage extends View {
    
    public function bodyPage()
    {
    ?>
    <div class="container col" style="margin-top: 150px">
      <div class="row justify-content-around">
        <div class="col-md-6" style="min-height: 70vh; border: solid 1px">
          <div class="camera">
            <video id="video"></video>
            <canvas id="canvas"></canvas>
            <!-- <img src="http://placekitten.com/g/320/261" id="photo" alt="photo"> -->
          </div>
          <div class="col-md-3" style="min-height: 70vh; border: solid 1px;">
            <h1>Options</h1>
            <hr>
           <button class="w-100 py-2 mb-4" id="startButton">Take photo</button> 
           <button class="w-100 py-2" id="clearButton">Clear photo</button> 
          </div>
        </div>
      </div>
    </div>
    <script src="../lib/js/camera.js"></script>
<?php
    }
  }