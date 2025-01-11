
<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:signin.php");  
} else   
?>  
<html>
    <head>
<script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
<body oncontextmenu="return false">    <div></div></body> 
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>QR Code | Log in</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript" src="js/instascan.min.js"></script>
		<!-- DataTables -->
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
		#divvideo{
			 box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);
		}
		</style>
    </head>
<div style="clear: both">
<center>
<img src="logo.png" class="img-responsive" width="30%" style="display: inline-block">
</center>	
</div>
    <body style="background:#eee">
<h2>Welcome, <?=$_SESSION['sess_user'];?></h2>
        <nav class="navbar" style="background:silver">
		  <div class="container-fluid">
			<div class="navbar-header">
			  
<a class="navbar-brand" href="login.php"> <i class="glyphicon glyphicon-qrcode"></i> Attendance </a>
<a class="navbar-brand" href="attendance.php"> <i class="glyphicon glyphicon-qrcode"></i> CHECK ATTENDANCE </a>
			</div>

			<ul class="nav navbar-nav navbar-right">
			  <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			</ul>
		  </div>
		</nav>
       <div class="container">
            <div class="row">
                <div class="col-md-4" style="padding:10px;background:#C8A2C8;border-radius: 5px;" id="divvideo">
					<center><p class="login-box-msg"> <i class="glyphicon glyphicon-camera"></i> TAP HERE</p></center> 
<center><i class="glyphicon glyphicon-qrcode"></i> <label>SCAN QR CODE</label> <p id="time"></p></center>
                    <video id="preview" width="100%" height="50%" style="border-radius:10px;"></video>

					<br>
					<br>
					<?php
					if(isset($_SESSION['error'])){
					  echo "
						<div class='alert alert-danger alert-dismissible' style='background:red;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-warning'></i> Error!</h4>
						  ".$_SESSION['error']."
						</div>
					  ";
					  unset($_SESSION['error']);
					}
					if(isset($_SESSION['success'])){
					  echo "
						<div class='alert alert-success alert-dismissible' style='background:green;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-check'></i> Success!</h4>
						  ".$_SESSION['success']."
						</div>
					  ";
					  unset($_SESSION['success']);
					}
				  ?>

                </div>
               <div class="col-md-8">
		<form action="CheckInOut.php" method="post" class="form-horizontal" style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
               
                    <input type="hidden" name="studentID" id="text" placeholder="scan qrcode" class="form-control"   autofocus>
                </form>		
                
				<div style="border-radius: 5px;padding:10px;background:skyblue;" id="divvideo">
                  <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
						<td>NAME</td>
						<td>STUDENT ID</td>
						<td>TIME IN</td>
						<td>TIME OUT</td>
						<td>LOGDATE</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $server = "localhost:3307";
                        $username="root";
                        $password="";
                        $dbname="stirlingrak";
                    
                        $conn = new mysqli($server,$username,$password,$dbname);
						$date = date('Y-m-d');
                        if($conn->connect_error){
                            die("Connection failed" .$conn->connect_error);
                        }
                           $sql ="SELECT * FROM attendance LEFT JOIN student ON attendance.STUDENTID=student.studentID WHERE LOGDATE='$date'";
                           $query = $conn->query($sql);
                           while ($row = $query->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $row['FIRSTNAME'].', '.$row['LASTNAME'].' '.$row['MNAME'];?></td>
                                <td><?php echo $row['Unique_ID'];?></td>
                                <td><?php echo $row['TIMEIN'];?></td>
                                <td><?php echo $row['TIMEOUT'];?></td>
                                <td><?php echo $row['LOGDATE'];?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                  </table>		  
                </div>
				
                </div>
				
            </div>
					
        </div>
		<script>
			function Export()
			{
				var conf = confirm("Please confirm if you wish to proceed in exporting the attendance in to Excel File");
				if(conf == true)
				{
					window.open("export.php",'_blank');
				}
			}
		</script>				
        <script>
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
               document.getElementById('text').value=c;
               document.forms[0].submit();
           });
        </script>
		<script type="text/javascript">
		var timestamp = '<?=time();?>';
		function updateTime(){
		  $('#time').html(Date(timestamp));
		  timestamp++;
		}
		$(function(){
		  setInterval(updateTime, 1000);
		});
		</script>
		<script src="plugins/jquery/jquery.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

		<script>
		  $(function () {
			$("#example1").DataTable({
			  "responsive": true,
			  "autoWidth": false,
			});
			$('#example2').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": true,
			  "info": true,
			  "autoWidth": false,
			  "responsive": true,
			});
		  });
		</script>
		
    </body>
</html>