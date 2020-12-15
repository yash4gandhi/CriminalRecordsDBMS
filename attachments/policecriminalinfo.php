<?php

session_start();
if(!isset($_SESSION['username'])){header('location:home.php');}

$con=mysqli_connect('localhost','root');

if($con)
{
//echo "connection successful";
}
else
{
	echo "no connect";
}
 mysqli_select_db($con,'criminalrecords');
 $username=$_SESSION['username'];
 $sql="Select police_id from police where aadhar_id = (select aadhar_id from user where user_name='$username')";
 
 $result = mysqli_query($con,$sql);
 while ($row = $result->fetch_assoc()) {
   $police_id=$row['police_id'];
  //echo $row['police_id']."<br>";
}
 $complain_id=$_SESSION['complain_id'];
 $ps_id=$_SESSION['ps_id'];
 $crime_type=$_SESSION['crime_type'];
 $location=$_SESSION['location'];
 $crime_date=$_SESSION['crime_date'];
 $sql = "insert into fir values('$complain_id','$police_id','$ps_id','$crime_type','$location','$crime_date')";
 mysqli_query($con, $sql);
 $sql = "update complainant set status='approved' where complain_id='$complain_id'";
 mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Policehome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Sign Up Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >CRIME_MANAGEMENT</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="policehome.php">Home</a></li>
      <li class="active"><a href="policecomplain.php">Available Complains</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a span class="glyphicon glyphicon-user"></span><?php if(isset($_SESSION['username']))echo $_SESSION['username'];?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
  
		
  
  
<div class="container">
<div class="signup-form">
    <form action="policecomplain.php" method="post">
		<h2>Criminal</h2>
		<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">JAILS</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
		
		<table class="table">

    <thead class="thead-dark">
      <tr>
        <th>JAIL_id</th>
		<th>NAME</th>
        <th>ADDRESS</th>
        <th>phone</th>
      </tr>
    </thead>
	
    <tbody>
		
	<?php

if(!isset($_SESSION['username'])){header('location:adminhome.php');}

if(isset($_SESSION['username']))
{

$con=mysqli_connect('localhost','root');

if($con)
{
//	echo "connection successful";
}
else
{
	echo "no connect";
}
 mysqli_select_db($con,'criminalrecords');

$sql = "SELECT * FROM jail ";
$result = mysqli_query($con, $sql);
$num=mysqli_num_rows($result);
//echo $num."<br>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
        echo "<tr><td>" . $row["jail_reg_id"]."</td><td>".$row["name"]. "</td><td>".$row["address"]."</td><td>". $row["phone"]. "</td></tr>";
    }
} else {
    echo "0 results";
}
   echo "</tbody></table>";

}
mysqli_close($con);

?>	
		
		
		
		</div>
      </div>
    </div>
	
        <div class="form-group">
			<div class="row">
				<div class="col-xs-4"><input type="text" class="form-control" name="firstname" placeholder="First Name" required="required"></div>
				<div class="col-xs-4"><input type="text" class="form-control" name="middlename" placeholder="Middle Name" required="required"></div>
				<div class="col-xs-4"><input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required"></div>
	
			</div>        	
        </div>
		
		
    
		
		
		
		
		
  	<div class="form-group">
        	<input type="text" class="form-control" name="address" placeholder="Address" required="required">
        </div>
		

        <div class="form-group">
            <input type="number" class="form-control" name="phoneno" placeholder="Phoneno" required="required">
        </div>  
            <div class="form-group">
            <input type="text" class="form-control" name="date" placeholder="YYYY/MM/DD" required="required">
        </div>   
		
		 <div class="form-group">
            <input type="text" class="form-control" name="gender" placeholder="Gender" required="required">
        </div> 
      <div class="form-group">
            <input type="number" class="form-control" name="jail_id" placeholder="Jail_Id" required="required">
        </div> 
        <div class="form-group">
            <input type="number" class="form-control" name="cell_no" placeholder="Cell_No" required="required">
        </div> 
      
    
    
    
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
        </div>
    </form>
</div>

</div>

</body>
</html>
