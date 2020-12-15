<?php

session_start();
if(!isset($_SESSION['username'])){header('location:home.php');}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMIN</title>
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
      <li class="active"><a href="adminhome.php">Home</a></li>
      <li class="active"><a href="database.php">DATABASE</a></li>
	   <li class="active"><a href="admindelete.php">DELETE</a></li>
	   <li class="active"><a href="adminupdate.php">UPDATE</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
       <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php if(isset($_SESSION['username']))echo $_SESSION['username'];?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">

<h2>DATABASE</h2>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">USERS</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
	
<table class="table">

    <thead class="thead-dark">
      <tr>
        <th>Aadhar_id</th>
        <th>username</th>
        <th>firstname</th>
		<th>Usertype</th>
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

$sql = "SELECT aadhar_id,user_name,firstname,usertype FROM user ";
$result = mysqli_query($con, $sql);
$num=mysqli_num_rows($result);
//echo $num."<br>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
		if($row["usertype"]=='citizen')
        echo "<tr><td>" . $row["aadhar_id"]. "</td><td>".$row["user_name"]."</td><td>". $row["firstname"]."</td><td>". $row["usertype"]."</td></tr>";
    }
} else {
    echo "0 results";
}
   echo "</tbody></table>";

}
mysqli_close($con);

?>
		
		 <div class="signup-form">
    <form action="delete.php" method="post">
		<h2>DELETE</h2>
		
      
        <div class="form-group">
        	<input type="number" class="form-control" name="getaid" placeholder="AADHAR_id" required="required">
        </div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">DELETE</button>
		
		</form></div>
		
		</div>
      </div>
    </div>
	
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

<div class="signup-form">
    <form action="psdelete.php" method="post">
		<h2>DELETE</h2>
		
      
        <div class="form-group">
        	<input type="number" class="form-control" name="getapsid" placeholder="ps_id" required="required">
        </div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">DELETE</button>
		
		</form></div>
		
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">POLICE</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
		<table class="table">

    <thead class="thead-dark">
      <tr>
        <th>police_id</th>
        <th>ps_id</th>
        <th>aadhar_id</th>
		 <th>firstname</th>
		  <th>lastname</th>
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

$sql = "SELECT police_id,ps_id,aadhar_id FROM police ";
$result = mysqli_query($con, $sql);
$num=mysqli_num_rows($result);
//echo $num."<br>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
		
		$key=$row["aadhar_id"];
		$sql1 = "SELECT firstname,lastname FROM user where aadhar_id='$key'";
           $result1 = mysqli_query($con, $sql1);
		
		$row1= mysqli_fetch_assoc($result1);
		
        echo "<tr><td>" . $row["police_id"]. "</td><td>".$row["ps_id"]."</td><td>". $row["aadhar_id"];
		echo "</td><td>".$row1["firstname"]."</td><td>".$row1["lastname"]."</td></tr>";
    }
} else {
    echo "0 results";
}
   echo "</tbody></table>";

}
mysqli_close($con);

?>	
	<div class="signup-form">
    <form action="pdelete.php" method="post">
		<h2>DELETE</h2>
		
      
        <div class="form-group">
        	<input type="number" class="form-control" name="getapid" placeholder="police_id" required="required">
        </div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">DELETE</button>
		
		</form></div>
	
	
	
	
		
		</div>
      </div>
    </div>
	
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
	
	
	
	
  </div> 
</div>

  </div>

</body>
</html>
