<?php

session_start();
if(!isset($_SESSION['username'])){header('location:home.php');}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>complain</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="userhome.php">Home</a></li>
	   <li class="active"><a href="complain.php">COMPLAIN</a></li>
	   <li class="active"><a href="mycomplains.php">MYCOMPLAINS</a></li>
     	   <li class="active"><a href="updatemycomplain.php">UPDATEMYCOMPLAINS</a></li>
		   <li class="active"><a href="search.php">SEARCH</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a  href="displayuser.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username'];?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
  
<div class="container">

<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">POLICE STATIONS</a>
        </h4>
      </div>
	  
	  
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
		
		<table class="table">

    <thead class="thead-dark">
      <tr>
        <th>ps_id</th>
        <th>address</th>
        <th>phone</th>
      </tr>
    </thead>
	
    <tbody>
		
	<?php

//if(!isset($_SESSION['username'])){header('location:home.php');}

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

$sql = "SELECT ps_id,address,phone FROM policestation ";
$result = mysqli_query($con, $sql);
$num=mysqli_num_rows($result);
//echo $num."<br>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
        echo "<tr><td>" . $row["ps_id"]. "</td><td>".$row["address"]."</td><td>". $row["phone"]. "</td></tr>";
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
  <div class="signup-form">
    <form action="complain.php" method="post">
		<h2>COMPLAIN</h2>
		
      
        <div class="form-group">
		
		<div class="form-group">
            <input type="number" class="form-control" name="psid" placeholder="Policestation" required="required">
        </div>
		
        	<input type="text" class="form-control" name="crimetype" placeholder="crimetype" required="required">
        </div>
		<div class="form-group">
            <input type="text" class="form-control" name="location" placeholder="location" required="required">
        </div>
		
			<div class="form-group">
            <input type="text" class="form-control" name="date" placeholder="date" required="required">
        </div>
		
    
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">SUBMIT</button>
        </div>
    </form>
	
</div>

</div>
<?php

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

$psid=$_POST['psid'];
$ctype=$_POST['crimetype'];
$loc=$_POST['location'];
$date=$_POST['date'];
$uname=$_SESSION['username'];
 $q="select aadhar_id from user where user_name='$uname'";
 $result=mysqli_query($con,$q);
 $row= mysqli_fetch_assoc($result);
 $complainantid=$row["aadhar_id"];
 
	 
	 $qy="insert into complainant values(null,'$complainantid','$psid','$ctype','pending','$date','$loc')";
	 mysqli_query($con,$qy);
                              
	 //header('location:userhome.php');
 
}
?>

</body>
</html>
