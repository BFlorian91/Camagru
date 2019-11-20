(() => {

  let width = 500;
  let height = 0;

  // video from the camera. Start at false.

  let streaming = false;

  let video = null;
  let canvas = null;
  let photo = null;

  let startButton = null;
  let clearButton = null;

  function startup() {
    video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    photo = document.getElementById('photo');
    startButton = document.getElementById('startButton');
    clearButton = document.getElementById('clearButton');

    this.canvas.style.display = 'none';
    navigator.mediaDevices.getUserMedia({video: true, audio: false})
    .then((stream) => {
      video.srcObject = stream;
      video.play();
    })
    .catch((err) => {
      console.log("An error occurred: " + err);
    });

    video.addEventListener('canplay', (ev) => {
      if (!streaming) {
        height = video.videoHeight / (video.videoWidth/width);
      
        // For Firefox Bug (the height can't be read from)
      
        if (isNaN(height)) {
          height = width / (4/3);
        }
      
        video.setAttribute('width', width);
        video.setAttribute('height', height);
        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);

    startButton.addEventListener('click', (ev) => {
      takePicture();
      ev.preventDefault();
    }, false);
    
    clearButton.addEventListener('click', (ev) => {
      clearPicture();
      ev.preventDefault();
    }, false);

    clearPicture();
  }

  // Fill the photo with an indication that none has been
  // captured.

  function clearPicture() {
    let context = canvas.getContext('2d');
    context.fillStyle = "#FFF";
    context.fillRect(0, 0, canvas.width, canvas.height);

    this.video.style.display = 'block';
    this.canvas.style.display = 'none';
    this.photo.style.display = 'none';
  }

  function takePicture() {
    let context = canvas.getContext('2d');
    if (width && height) {
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video, 0, 0, width, height);
    
      let data = canvas.toDataURL('image/jpg');
      photo.setAttribute('src', data);
      // console.log(data);
      sendImg(data);
      this.video.style.display = 'none';
      this.canvas.style.display = 'block';
    } else {
      clearPicture();
    }
  }

  function sendImg(imgTaken)
  {
    const xhr = new XMLHttpRequest();
    const img = "img=" + imgTaken;

    // console.log(xhr);

    xhr.open("POST", "index.php?page=montage", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // console.log("img=" + imgTaken);
    
    xhr.onload = function() {
      console.log(this.responseText);
    };
    xhr.send(img);
    // console.log(xhr)
  }
  // Set up our event listener to run the startup process
  // once loading is complete.

  window.addEventListener('load', startup, false);
})();