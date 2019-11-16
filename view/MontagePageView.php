<?php

  class MontagePage extends View {
    
    public function bodyPage()
    {
    ?>
    <div class="container col" style="margin-top: 150px">
      <div class="row justify-content-around">
        <div class="col-md-8" style="min-height: 70vh; border: solid 1px">
        <div class="camera">
         <video id="video">Video stream not available.</video>
        </div>
        <canvas id="canvas"></canvas>
        <div class="output">
          <img id="photo" alt="The screen capture will appear in this box."> 
        </div>
        </div>
        <div class="col-md-3" style="min-height: 70vh; border: solid 1px;">
          <h1>Options</h1>
          <hr>
          <div class="w-75 bg-danger">

          </div>
           <button class="w-100 py-2 mb-4" id="startButton">Take photo</button> 
           <button class="w-100 py-2" id="clearButton">Clear photo</button> 
        </div>
      </div>
    </div>
    <script src="../lib/js/camera.js"></script>
<?php
    }
  }