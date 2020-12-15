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
      <li class="active"><a href="userhome.php">Home</a></li>
      <li class="active"><a href="complain.php">COMPLAIN</a></li>
	   <li class="active"><a href="mycomplains.php">MYCOMPLAINS</a></li>
	   <li class="active"><a href="updatemycomplain.php">UPDATEMYCOMPLAINS</a></li>
	    <li class="active"><a href="search.php">SEARCH</a></li>
	   
    </ul>
    <ul class="nav navbar-nav navbar-right">
       <li><a  href="displayuser.php"><span class="glyphicon glyphicon-user"></span><?php if(isset($_SESSION['username']))echo $_SESSION['username'];?></a></li>
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">CRIME ANALYSIS</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
	
<table class="table">

    <thead class="thead-dark">
      <tr>
        <th>Total Number</th>
        <th>Crime Type</th>
        
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

$sql ="select count(fir_id) as counter,crimetype from fir group BY(crimetype)";
$result = mysqli_query($con, $sql);
$num=mysqli_num_rows($result);
//echo $num."<br>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
        echo "<tr><td>" . $row["counter"]. "</td><td>".$row["crimetype"];
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">CRIME LOCATION ANALYSIS</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
		
		<table class="table">

    <thead class="thead-dark">
      <tr>
	  <th>LOCATION</th>
        <th>NUMBER OF CRIMES</th>
        <th>CRIME TYPE</th>
        
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

$sql = "select count(fir_id) as counter,crimetype,location from fir group BY(location) ";
$result = mysqli_query($con, $sql);
$num=mysqli_num_rows($result);
//echo $num."<br>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
        echo "<tr><td>" . $row["location"]. "</td><td>".$row["counter"]."</td><td>". $row["crimetype"]. "</td></tr>";
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">COMPLAINS</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
		<table class="table">

    <thead class="thead-dark">
      <tr>
	  
	   <th>STATUS</th>
        <th>NUMBER OF COMPLAINS</th>
	
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

$sql = "SELECT COUNT(complain_id) as counter, status from complainant group by(STATUS) ";
$result = mysqli_query($con, $sql);
$num=mysqli_num_rows($result);
//echo $num."<br>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
		

		
        echo "<tr><td>" . $row["status"]. "</td><td>".$row["counter"]."</td></tr>";
		
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">CASES SOLVED BY DIFFERENT POLICE STATION</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
		
		<table class="table">

    <thead class="thead-dark">
      <tr>
        <th>POLICE STATION</th>
		<th>NUMBER OF CASES SOLVED</th>
        
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

$sql = "select address,count(fir_id) as counter from fir NATURAL JOIN policestation group by(ps_id) ";
$result = mysqli_query($con, $sql);
$num=mysqli_num_rows($result);
//echo $num."<br>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
        echo "<tr><td>" . $row["address"]."</td><td>".$row["counter"]. "</td></tr>";
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">JAIL AND PRISONERS</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">
		
		<table class="table">

    <thead class="thead-dark">
      <tr>
        <th>NUMBER OF PRISONERS</th>
		<th>JAIL_ID</th>
        <th>NAME</th>
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

$sql = "CREATE VIEW jailanalysis as select jail_reg_id,name from jail ";
$r=mysqli_query($con, $sql);
//echo $r."<br>";

$sql1="select count(criminal_id) as counter,jail_reg_id from criminal group by(jail_reg_id)";
$result=mysqli_query($con, $sql1);
$num=mysqli_num_rows($result);
//echo $num."<br>";

if (mysqli_num_rows($result) > 0) 
{
	 while($row = mysqli_fetch_assoc($result)) 
	{
		$p=$row["jail_reg_id"];
		$sqlj="select name from jailanalysis where jail_reg_id='$p'";
        $resultj=mysqli_query($con, $sqlj);
		$rowj = mysqli_fetch_assoc($resultj);
		
        echo "<tr><td>" . $row["counter"]. "</td><td>".$row["jail_reg_id"]."</td><td>". $rowj["name"]."</td></tr>";
    }
	

}
 else {
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">WHERE DO YOU FIND MOST COMPLAINS ?</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">
		
		<table class="table">

    <thead class="thead-dark">
      <tr>
        <th>NUMBER OF COMPLAINS</th>
		<th>LOCATION</th>
       
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

$sql = "CREATE VIEW complainloc as select complain_id,location from complainant ";
$r=mysqli_query($con, $sql);
//echo $r."<br>";

$sql1="select count(complain_id) as counter,location from complainloc group by(location)";
$result=mysqli_query($con, $sql1);
$num=mysqli_num_rows($result);
//echo $num."<br>";

if (mysqli_num_rows($result) > 0) 
{
	 while($row = mysqli_fetch_assoc($result)) 
	{		
        echo "<tr><td>" . $row["counter"]. "</td><td>".$row["location"]."</td></tr>";
    }
	

}
 else {
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
