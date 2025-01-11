 <!DOCTYPE html>
<html lang="en">

 <head>
 <script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
    <meta charset="utf-8">  
    <title>Student QR Generator</title>
    <link rel="stylesheet" href="style22.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

<body>
<div class="Background">
	
<p style="background-color:green;text-align:right; color:white;"> Credits: Vishal &nbsp;&nbsp;&nbsp;&nbsp; </p> 

  
	<div style="clear: both">
<center>
<img src="logo.png" class="img-responsive" width="30%" style="display: inline-block">
</center>	
</div>
  

    <center>
	<div class="wrapper">
      <header>
        <h1>Student QR Generator</h1>
        <p>Enter Student ID</p>
      </header>
      <div class="form">
        <input type="text" spellcheck="false" placeholder="Enter Student QR ID">
        <button>Generate QR Code</button>
        <a href="home_admin.php" style="color:#FF0000;">Back</a>
      </div>
      <div class="qr-code">
        <img src="" alt="qr-code">
      </div>
    </div>
<center>
    <script src="script.js"></script>

  </body>
</html>