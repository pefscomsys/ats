/*********************************************************************
*@author tncedric <tncedric@yahoo.com>
*********************************************************************/

// Cross browser support to fetch the correct getUserMedia object.
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia
  || navigator.mozGetUserMedia || navigator.msGetUserMedia;

// Cross browser support for window.URL.
window.URL = window.URL || window.webkitURL || window.mozURL || window.msURL;


var MotionDetector = (function() {
  var alpha = 0.5;
  var version = 0;
  var greyScale = true;

  var canvas = document.getElementById('canvas');
  var canvasFinal = document.getElementById('canvasFinal');
  var video = document.getElementById('camStream');
  var ctx = canvas.getContext('2d');
  var ctxFinal = canvasFinal.getContext('2d');
  var localStream = null;
  var imgData = null;
  var imgDataPrev = [];
  var previousImageData = null;
  var count = 1;

  function success(stream) {
    localStream = stream;
    // Create a new object URL to use as the video's source.
    video.src = (window.URL && window.URL.createObjectURL(stream)) || stream;
    video.play();
  }


  function handleError(error) {
    console.error(error);
  }


  function snapshot() {
    if (localStream) {
      canvas.width = video.offsetWidth;
      canvas.height = video.offsetHeight;
      canvasFinal.width = video.offsetWidth;
      canvasFinal.height = video.offsetHeight;

      ctx.drawImage(video, 0, 0);

      // Must capture image data in new instance as it is a live reference.
      // Use alternative live referneces to prevent messed up data.
      imgDataPrev[version] = ctx.getImageData(0, 0, canvas.width, canvas.height);
      version = (version == 0) ? 1 : 0;

      imgData = ctx.getImageData(0, 0, canvas.width, canvas.height);


      ctxFinal.putImageData(imgData, 0, 0);

      //compare the two images
      if(previousImageData == null)
      {
          //this is the first run. upload image to server
          uploadImage();
      }
      else {

          //root mean square method
          var square = 0;
          for(var i = 0; i < imgData.data.length; i++)
          {
              square += (imgData.data[i] - previousImageData.data[i])
                            * (imgData.data[i] - previousImageData.data[i]);
          }

          var rms = Math.sqrt(square/imgData.data.length);

          //if the rms is greateer thatn 8 then there is a significant onChange
          console.log(rms);
          if(rms >= 8)
          {
              uploadImage();
          }
      }

      previousImageData = imgData;

    }

  }

  function uploadImage()
  {
      //get the base 64 image
      var base64image = canvasFinal.toDataURL('image/jpg');
      var base = 'base64';
      //perform a jquery ajax function here

      $.ajax({
          url: 'http://localhost/bvs/api/handlePost.php',
          method : 'post',
          dataType : 'text',
          data : { base:base, image:base64image },
          error : function(error)
          {

          },
          success : function (data)
          {
              //
              console.log(data);
          }
      });

  }

  function init_() {
    if (navigator.getUserMedia) {
      navigator.getUserMedia({video:true}, success, handleError);
    } else {
      console.error('Your browser does not support getUserMedia');
    }
    window.setInterval(snapshot, 3000);
  }

  return {
    init: init_
  };
})();

MotionDetector.init();
