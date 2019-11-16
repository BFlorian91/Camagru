(() => {

  let width = 1300;
  let height = 0;

  // video from the camera. Start at false.

  let streaming = false;

  let video = null;
  let canvas = null;
  let photo = null;
  let startButton = null;

  function startup() {
    video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    photo = document.getElementById('photo');
    startButton = document.getElementById('startButton');
    clearButton = document.getElementById('clearButton');

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
      takepicture();
      ev.preventDefault();
    }, false);
    
    clearButton.addEventListener('click', (ev) => {
      clearPhoto();
      ev.preventDefault();
    }, false);

    clearPhoto();
  }

  // Fill the photo with an indication that none has been
  // captured.

  function clearPhoto() {
    let context = canvas.getContext('2d');
    context.fillStyle = "#FFF";
    context.fillRect(0, 0, canvas.width, canvas.height);

    let data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
  }
  
  // Capture a photo by fetching the current contents of the video
  // and drawing it into a canvas, then converting that to a PNG
  // format data URL. By drawing it on an offscreen canvas and then
  // drawing that to the screen, we can change its size and/or apply
  // other changes before drawing it.

  function takepicture() {
    let context = canvas.getContext('2d');
    if (width && height) {
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video, 0, 0, width, height);
    
      let data = canvas.toDataURL('image/png');
      photo.setAttribute('src', data);
    } else {
      clearPhoto();
    }
  }



  // Set up our event listener to run the startup process
  // once loading is complete.
  window.addEventListener('load', startup, false);
})();