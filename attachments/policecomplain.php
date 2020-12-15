<?php

session_start();
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

if(!isset($_SESSION['username'])){header('location:home.php');}
if(isset($_POST['firstname'])){
    $complain_id=$_SESSION['complain_id'];
    $address=$_POST['address'];
    $jail_id=$_POST['jail_id'];
    $cell_no=$_POST['cell_no'];    
    $phoneno=$_POST['phoneno'];
    $dob=$_POST['date'];
    $fn=$_POST['firstname'];
    $ln=$_POST['lastname'];
    $mn=$_POST['middlename'];
    $gender=$_POST['gender'];
	
	
	$sqli="select * from jail where jail_reg_id='$jail_id'";
	$result=mysqli_query($con,$sqli);
 $num=mysqli_num_rows($result);
 
 if($num>0)
 {	
    $sql="insert into criminal values(NULL,'$complain_id','$jail_id','$cell_no','$fn','$mn','$ln','$address','$dob','$phoneno','$gender')";
    mysqli_query($con,$sql);
	
 }
 else
 {
	echo " INVALID JAIL";
 }
 
 
}
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
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >CRIME_MANAGEMENT</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="   "><a href="policehome.php">Home</a></li>
      <li class="active"><a href="policecomplain.php">Available Complains</a></li>
      <li class=""><a href="policeupdate.php">Update</a></li>
      <li class=""><a href="policedelete.php">Delete</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a span class="glyphicon glyphicon-user"></span><?php if(isset($_SESSION['username']))echo $_SESSION['username'];?></a></li>
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
        <th>Crimetype</th>
		<th>Status</th>
		<th>Crime date</th>
		<th>Crime location</th>
		<th></th>
      </tr>
    </thead>
	
    <tbody>
  <?php

if(isset($_SESSION['username']))
{



$name=$_SESSION['username'];

$sql = "SELECT complain_id,ps_id ,crime_type ,status ,crime_date ,location FROM complainant where ps_id in (select ps_id from police where aadhar_id=(select aadhar_id from user where user_name='$name')) ";
$result = mysqli_query($con, $sql);
$num=mysqli_num_rows($result);
//echo $num."<br>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
		if($row["status"]=='pending'){
            $_SESSION['complain_id']=$row["complain_id"];
            $_SESSION['ps_id']=$row["ps_id"];
            $_SESSION['crime_type']=$row["crime_type"];
            $_SESSION['crime_date']=$row["crime_date"];
            $_SESSION['location']=$row["location"];
            
            echo "<tr><td>" . $row["complain_id"]. "</td><td>".$row["ps_id"]."</td><td>".$row["crime_type"]."</td><td>".$row["status"]. "</td><td>". $row["crime_date"]."</td><td>".$row["location"]."</td>";?><td><form action="policecriminalinfo.php" method="post"><button type="submit" class="btn btn-success">Add Criminal INFO</button><form></td></tr><?php
            
    }
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
 
 
 
</div>
</div>

</body>
</html>
