﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cung Cấp Thông Tin</title>
	
</head>
<style>
#my_camera{
 
 border: 1.5px solid red;
}
</style>
<body>
<div id="my_camera"></div>
<input type=button value="Take Snapshot" onClick="take_snapshot()">
 
<div id="results" ></div>
 
<!-- Script -->
<script type="text/javascript" src="/js/webcam.min.js"></script>

<!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">

 // Configure a few settings and attach camera
 Webcam.set({
  width: 470,
  height: 300,
  image_format: 'jpeg',
  jpeg_quality: 1080
 });
 Webcam.attach( '#my_camera' );

 // preload shutter audio clip
 var shutter = new Audio();
 shutter.autoplay = null;
 shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : '/raw/shutter.mp3';

function take_snapshot() {
 // play sound effect
 shutter.play();
 
 // take snapshot and get image data
 Webcam.snap( function(data_uri) {
 
  Webcam.upload( data_uri, '/saveimage.php', function(code, text,Name) {
                    document.getElementById('results').innerHTML = 
                    '' + 


 // display results in page
 //document.getElementById('results').innerHTML = 
 '<img src="'+data_uri+'"/>';
             
 } ); 
  
 } );
}

</script>
</body>
</html>