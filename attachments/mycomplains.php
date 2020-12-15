<?php

session_start();
if(!isset($_SESSION['username'])){header('location:home.php');}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Userhome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >CRIME_MANAGEMENT</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="userhome.php">Home</a></li>
      <li class="active"><a href="complain.php">COMPLAIN</a></li>
	   <li class="active"><a href="mycomplains.php">MYCOMPLAINS</a></li>
	   	   <li class="active"><a href="updatemycomplain.php">UPDATEMYCOMPLAINS</a></li>
		   <li class="active"><a href="search.php">SEARCH</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="displayuser.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username'];?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
 
    
 <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">MY PENDING COMPLAINS</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
	
<table class="table">

    <thead class="thead-dark">
      <tr>
        <th>Complain_id</th>
        <th>Police station</th>
        <th>crimetype</th>
		<th>status</th>
		<th>crime date</th>
		<th>crime location</th>
		
      </tr>
    </thead>
	
    <tbody>
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

$name=$_SESSION['username'];

$sql = "SELECT complain_id,ps_id ,crime_type ,status ,crime_date ,location FROM complainant where complainant_aadhar_id in (select aadhar_id from user where user_name='$name') ";
$result = mysqli_query($con, $sql);
$num=mysqli_num_rows($result);
//echo $num."<br>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
		if($row["status"]=='pending')
        echo "<tr><td>" . $row["complain_id"]. "</td><td>".$row["ps_id"]."</td><td>".$row["crime_type"]."</td><td>".$row["status"]. "</td><td>". $row["crime_date"]."</td><td>".$row["location"]."</td></tr>";
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
 
 <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">MY APPROVED COMPLAINS</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse in">
        <div class="panel-body">
	
<table class="table">

    <thead class="thead-dark">
      <tr>
        <th>Complain_id</th>
        <th>Police station</th>
        <th>crimetype</th>
		<th>status</th>
		<th>crime date</th>
		<th>crimelocation</th>
		<th>criminal_id</th>
		<th>firstname</th>
		<th>lastname</th>
		<th>jail_reg_id</th>
		<th>Cell_no<th>
		
      </tr>
    </thead>
	
    <tbody>
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

$name=$_SESSION['username'];

$sql = "SELECT complain_id,ps_id ,crime_type ,status ,crime_date ,location FROM complainant where complainant_aadhar_id in (select aadhar_id from user where user_name='$name') ";
$result = mysqli_query($con, $sql);
$num=mysqli_num_rows($result);
//echo $num."<br>";

if (mysqli_num_rows($result) > 0) {
	
	
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
		if($row["status"]=='approved')
		{
			$id=$row["complain_id"];
			$cs="select criminal_id,firstname,lastname,jail_reg_id,Cell_no from criminal where fir_id='$id'";
			$resultc = mysqli_query($con, $cs);	
			$rowc = mysqli_fetch_assoc($resultc);
			
        echo "<tr><td>".$row["complain_id"]."</td><td>".$row["ps_id"]."</td><td>". $row["crime_type"]. "</td><td>". $row["status"]. "</td><td>". $row["crime_date"]."</td><td>".$row["location"];
		echo "</td><td>".$rowc["criminal_id"]."</td><td>".$rowc["firstname"]."</td><td>".$rowc["lastname"]."</td><td>".$rowc["jail_reg_id"]."</td><td>".$rowc["Cell_no"]."</td></tr>";
		}
	}
} 
  else 
   {
    echo "0 results";
   }
   echo "</tbody></table>";

}
mysqli_close($con);

?>
		
		</div>
      </div>
    </div>
 
 
 
</div>
</body>
</html>
