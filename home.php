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
  <title>Home</title>
  <link rel="stylesheet" href="style7.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

</head>
<style>
body {
  background-image: url('img12.jpg');
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
</div>
	<div style="clear: both">
<center>
<img src="logo.png" class="img-responsive" width="30%" style="display: inline-block">
</center>	
</div>
  

    <div class="rotmenucontainer">
  <div class="allrotate">


    <div class="service1 service">
      <a href="admin.php" class="servicelink">
        <div class="counterrotate">
          <img src="https://icons.iconarchive.com/icons/hopstarter/sleek-xp-basic/256/Preppy-icon.png">

          <h3 style="font-size:20px">ADMIN</h3>
        </div>
      </a>
    </div>

   
    <div class="service4 service">
      <a href="signin.php" class="servicelink">
        
<div class="counterrotate">
          <img src="https://icons.iconarchive.com/icons/iconsmind/outline/256/Professor-icon.png">
          <h3 style="font-size:20px">Faculty</h3>
        </div>
      
</a>
    </div>


  </div>

</div>
 




</body>
</html>