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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">POLICE STATIONS</a>
        </h4>
      </div>
	  
	  
      <div id="collapse1" class="panel-collapse collapse">
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
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">UPDATE COMPLAINS</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse in">
        <div class="panel-body">
	      
    <div class="signup-form">
    <form action="updatecomplain.php" method="post">
		<h2>COMPLAIN</h2>
		
      
        <div class="form-group">
		
		<div class="form-group">
            <input type="text" class="form-control" name="complainid" placeholder="complainid" >
        </div>
		
		
		<div class="form-group">
            <input type="number" class="form-control" name="psid" placeholder="Policestation" >
        </div>
		
        	<input type="text" class="form-control" name="crimetype" placeholder="crimetype" >
        </div>
		<div class="form-group">
            <input type="text" class="form-control" name="location" placeholder="location" >
        </div>
		
			<div class="form-group">
            <input type="text" class="form-control" name="date" placeholder="date">
        </div>
		
    
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">SUBMIT</button>
        </div>
    </form>
	
</div>

		
		</div>
      </div>
    </div>
 
 
</div>
</body>
</html>
