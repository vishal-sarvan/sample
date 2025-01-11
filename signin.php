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
  <title>Faculty login Form</title>
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
  

    
	<div class="circle"></div>
    <div class="circle"></div>
	<div style="clear: both">
	
	</div>
		<div>

	</div>
    <div class="inLoginForm">
      <form method="post" action="">
 
	   
        <div class="title">
          <h3>Faculty Login</h3>
        </div>
        <div class="inputGroup">
          <label for=" username"> Username</label>
          <input type="text" name="user_id">
        </div>
        <div class="inputGroup">
          <label for="password">Password</label>
          <input type="password" name="pass">
        </div>
        <button class="submitForm" name="submit">Log In</button>
<a href="home.php">Back</a>
	<p>
					Not yet a member? <a href="alert.php">Sign up</a>
					
				</p>
      </form>
    </div>
  </div>
  <?php  
if(isset($_POST["submit"])){  
  
if(!empty($_POST['user_id']) && !empty($_POST['pass'])) {  
    $user=$_POST['user_id'];  
    $pass=$_POST['pass'];  
  
    $db = mysqli_connect('localhost:3307', 'root', '', 'stirlingrak');
    $query=mysqli_query($db,"SELECT User_Name,password FROM user_info WHERE User_Name='".$user."' AND password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['User_Name'];  
    $dbpassword=$row['password'];  
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: login.php");  
    }  
    } else {  
    echo "Invalid username or password!";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  





</body>
</html>