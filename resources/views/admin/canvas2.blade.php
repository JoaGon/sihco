<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width" />
  
  <title>Websanova :: wPaint</title>

  <link rel="icon" type="image/vnd.microsoft.icon"  href="./demo/img/favicon.ico" />
  <script type="text/javascript" src="{{ url('wPaint-master/lib/jquery.1.10.2.min.js')}}"></script>
</head>
<style type="text/css">
  
#wPaint-demo1{
  background-color: #fff !important;
  background-image: url("images/images_radiologia.png") !important;
  background-repeat: no-repeat !important;
  width: 900px !important;
  height: 300px !important;
  top: 100px !important;
}
.wPaint-theme-classic .wPaint-menu-holder {
    border-color: #dadada !important;
    background-color: #f0f0f0 !important;
    top: -35px !important;
}

</style>
<body>

  <!-- jQuery UI -->
  <script type="text/javascript" src="{{ url('wPaint-master/lib/jquery.ui.core.1.10.3.min.js')}}"></script>
  <script type="text/javascript" src="{{ url('wPaint-master/lib/jquery.ui.widget.1.10.3.min.js')}}"></script>
  <script type="text/javascript" src="{{ url('wPaint-master/lib/jquery.ui.mouse.1.10.3.min.js')}}"></script>
  <script type="text/javascript" src="{{ url('wPaint-master/lib/jquery.ui.draggable.1.10.3.min.js')}}"></script>
  
  <!-- wColorPicker -->
  <link rel="Stylesheet" type="text/css" href="{{url('wPaint-master/lib/wColorPicker.min.css')}}" />
  <script type="text/javascript" src="{{ url('wPaint-master/lib/wColorPicker.min.js')}}"></script>

  <!-- wPaint -->
  <link rel="Stylesheet" type="text/css" href="{{ url('wPaint-master/src/wPaint.css')}}" />
  <script type="text/javascript" src="{{ url('wPaint-master/src/wPaint.utils.js')}}"></script>
  <script type="text/javascript" src="{{ url('wPaint-master/src/wPaint.js')}}"></script>

  <!-- wPaint main -->
  <script type="text/javascript" src="{{ url('wPaint-master/plugins/main/src/fillArea.min.js')}}"></script>
  <script type="text/javascript" src="{{ url('wPaint-master/plugins/main/src/wPaint.menu.main.js')}}"></script>

  <!-- wPaint text -->
  <script type="text/javascript" src="{{ url('wPaint-master/plugins/text/src/wPaint.menu.text.js')}}"></script>

  <!-- wPaint shapes -->
  <script type="text/javascript" src="{{ url('wPaint-master/plugins/shapes/src/shapes.min.js')}}"></script>
  <script type="text/javascript" src="{{ url('/plugins/shapes/src/wPaint.menu.main.shapes.js')}}"></script>

  <!-- wPaint file -->
  <script type="text/javascript" src="{{ url('wPaint-master/plugins/file/src/wPaint.menu.main.file.js')}}"></script>

  <div id="wPaint-demo1" style="position:relative; width:500px; height:200px; background-color:#7a7a7a; margin:70px auto 20px auto;"></div>

  <center style="margin-bottom: 50px;">
    <input type="button" value="toggle menu" onclick="console.log($('#wPaint-demo1').wPaint('menuOrientation')); $('#wPaint-demo1').wPaint('menuOrientation', $('#wPaint-demo1').wPaint('menuOrientation') === 'vertical' ? 'horizontal' : 'vertical');"/>
  </center>

  <center id="wPaint-img"></center>

  <script type="text/javascript">
    var images = [
      '/test/uploads/wPaint.png',
    ];

    function saveImg(image) {
      var _this = this;

      $.ajax({
        type: 'POST',
        url: '/test/upload.php',
        data: {image: image},
        success: function (resp) {

          // internal function for displaying status messages in the canvas
          _this._displayStatus('Image saved successfully');

          // doesn't have to be json, can be anything
          // returned from server after upload as long
          // as it contains the path to the image url
          // or a base64 encoded png, either will work
          resp = $.parseJSON(resp);

          // update images array / object or whatever
          // is being used to keep track of the images
          // can store path or base64 here (but path is better since it's much smaller)
          images.push(resp.img);

          // do something with the image
          $('#wPaint-img').append($('<img/>').attr('src', image));
        }
      });
    }

    function loadImgBg () {

      // internal function for displaying background images modal
      // where images is an array of images (base64 or url path)
      // NOTE: that if you can't see the bg image changing it's probably
      // becasue the foregroud image is not transparent.
      this._showFileModal('bg', images);
    }

    function loadImgFg () {

      // internal function for displaying foreground images modal
      // where images is an array of images (base64 or url path)
      this._showFileModal('fg', images);
    }

    function createCallback(cbName) {
      return function() {
        if (console) {
          console.log(cbName, arguments);
        }
      }
    }

    // init wPaint
    $('#wPaint-demo1').wPaint({
      menuOffsetLeft: -35,
      menuOffsetTop: -50,
      saveImg: saveImg,
      loadImgBg: loadImgBg,
      loadImgFg: loadImgFg,
      onShapeDown: createCallback('onShapeDown'),
      onShapeUp: createCallback('onShapeUp'),
      onShapeMove: createCallback('onShapeDMove')
    });
  </script>

</body>
</html>