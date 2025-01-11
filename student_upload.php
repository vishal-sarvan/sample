<!doctype html>
<html lang="en">

<head>
<body oncontextmenu="return false">    <div></div></body>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style/style1.css"> 
<header style="background: #264D96"> 
		<div> <p style="background-color:green; text-align:right; color:white;"> Credits: Vishal &nbsp;&nbsp;&nbsp;&nbsp; </p> </div>
	</header>
<center>
	<div style="clear: both">
		<img src="logo.png" class="img-responsive" width="30%" style="display: inline-block">
	</div>
</center>
	<div>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	
  <style>
         .save {
			display: none;
		}
		.content{
			font-family: Arial, Helvetica, sans-serif;
			text-align:center;
			border-collapse: collapse;
			width: 100%;
		}
		.content td, .content th {
			border: 1px solid #ddd;
			padding: 16px;
		}
		.content tr:nth-child(even){
			background-color: #f2f2f2;
		}
		.content tr:hover{
			background-color: #ddd;
		}
.button1 {
  background-color: green; 
  border: none;
  color: white;
  width: 100px;
  height: 50px;
  padding: 15px;
  text-align: center;
  text-decoration: none;
  display: inline;
  font-size: 16px;
}
		.content th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: center;
		  background-color: #0407aa;
		  color: white;
		}
    .custom-file-input.selected:lang(en)::after {
      content: "" !important;
    }
    .custom-file {
      overflow: hidden;
    }
    .custom-file-input {
      white-space: nowrap;
    }
  </style>
</head>
<body>

<fieldset>
<legend>
  <div class="container">
    <form action="vupload.php" method="post" enctype="multipart/form-data">
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">
          <label class="custom-file-label" for="customFileInput">Select file</label>
        </div>
        <div class="input-group-append">
           <input type="submit" name="submit" value="Upload" class="btn btn-primary">
        </div>
      </div>
  </form>
  </div>
  </legend>
  </fieldset>
<center>
  <a href="home_admin.php"><input class="button1" name="exit" type = "button" value="Exit" ></a>
</center>
   <br>
   <br>
    <br>   
  <!-- Display the records from the database that is entered -->
		<?php
		//connect database 
		$con=mysqli_connect('localhost:3307', 'root', '', 'stirlingrak');
		
		    $Sql = "SELECT * FROM student";
    $result = mysqli_query($con, $Sql);  
    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr>
                          
                          <th>ID</th>
                          <th>Unique_ID</th>
			  <th>STUDENTID</th>
                          <th>FIRSTNAME</th>
			  <th>MNAME</th>
                          <th>LASTNAME</th>
                        </tr></thead><tbody>";
     while($row = mysqli_fetch_assoc($result)) {
         echo "<tr>
                   <td>" . $row['ID']."</td>
                   <td>" . $row['Unique_ID']."</td>
				   <td>" . $row['STUDENTID']."</td>
				   <td>" . $row['FIRSTNAME']."</td>
				   <td>" . $row['MNAME']."</td>
				   <td>" . $row['LASTNAME']."</td>
				   </tr>";        
     }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}

	?>	
	<script>

		function exitFunction() 
		{
			location.replace("home_admin.php");
		}
	</script>
</body>
 
</html>