<?php session_start();?> 
<!DOCTYPE html>
<html lang="en">

<head>
<script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
    <body oncontextmenu="return false">    <div></div></body> 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN</title>
  <link rel="stylesheet" href="style7.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

</head>
<style>
body {
  background-image: url('img.2.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 160%;
}

.rotmenucontainer {
    -webkit-transform: translateZ(0);
   -moz-transform: translateZ(0);
   -ms-transform: translateZ(0);
   -o-transform: translateZ(0);
   transform: translateZ(0);
   -webkit-backface-visibility: hidden;
   -moz-backface-visibility: hidden;
   -ms-backface-visibility: hidden;
   backface-visibility: hidden;
   -webkit-perspective: 1000;
   -moz-perspective: 1000;
   -ms-perspective: 1000;
   perspective: 1000;
  width:1500px;
  height: 570px;
  overflow: hidden;
   background-color: ;
  float: left;
}
#mySVG {
  width: 200%;
  height: 800%;
  z-index: 1500;
}

.allrotate {
  width: 600px;
  height: 750px;
  position: relative;
 padding: 1px 495px;

}

.counterrotate img {
  max-width: 70px;
}

.service {
  display: block;
  position: absolute;
  top: 60%;
  left: 60%;
  margin: -294px;
  text-decoration: none;
}

.allrotate img {
  margin: 20px 0 0 0;
  
}

.center-circle {
  background-color: grey;
  width: 230px;
  height: 230px;
  margin: -150px;
  border-radius: 50%;
  position: absolute;
  top: 27%;
  left: 55%;
  z-index: 1000;
  border: 5px solid blue;



}


.center-circle h4 {
  color: #FFF;
  text-transform: uppercase;
   display: table-cell; 
  vertical-align: middle; 
  position: absolute;
  text-align: center;
  
}

.service1,
.service4
 {
  background-color: silver;
  border-radius: 50%;
  border: 5px solid skyblue;
  text-align: center;
  color: black;
  text-transform: uppercase;
  position: absolute;  
  width: 220px;
  height: 220px;

}

.counterrotate {
    width: 100%;
vertical-align: middle; 
    top: 15%;
  height: 100%;
position: absolute;
    display: table;
    
}

.service1 {
  transform: translate(300px); /* no rotation, just move to the right*/
  
}

.service4 {
  transform: translate(-300px); /*no rotation, just move to the left*/

}


</style>

<body>

<div class="Background">


  <body oncontextmenu="return false">    <div>
<h2>Welcome, <?=$_SESSION['sess_user'];?> <button><a href="admin.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></button> </h2>
</div>
	<div style="clear: both">
<center>
<img src="logo.png" class="img-responsive" width="30%" style="display: inline-block">
</center>	
</div>
  

    <div class="rotmenucontainer">
  <div class="allrotate">

    <div class="service1 service">
      <a href="student_upload.php" class="servicelink">
        <div class="counterrotate">
          <img src="https://icons.iconarchive.com/icons/iconshock/real-vista-project-managment/256/data-management-icon.png">

          <h3 style="font-size:20px">Student Upload</h3>
        </div>
      </a>
    </div>

    <div class="service4 service">
      <a href="new_entry.php" class="servicelink">
        
<div class="counterrotate">
          <img src="https://icons.iconarchive.com/icons/icons8/windows-8/256/Ecommerce-Qr-Code-icon.png">
          <h3 style="font-size:20px">QR Maker</h3>
        </div>
      
</a>
    </div>


  </div>

</div>
 




</body>
</html>