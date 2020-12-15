<?php

session_start();
if(!isset($_SESSION['username'])){header('location:home.php');}
if(isset($_POST['jail_id'])){
    $jail_id=$_POST['jail_id'];
    $cell_no=$_POST['cell_no'];
    $address=$_POST['address'];
    $phoneno=$_POST['phoneno'];
    $criminal_id=$_SESSION['criminal_id'];
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
     if($jail_id)
     {
     $sql="update criminal set jail_reg_id='$jail_id' where criminal_id='$criminal_id'";
     mysqli_query($con,$sql);
     }
    
     if($cell_no)
     {
        $sql="update criminal set Cell_no='$cell_no' where criminal_id='$criminal_id'";
        mysqli_query($con,$sql);
     }
     if($address)
     {
        $sql="update criminal set address='$address' where criminal_id='$criminal_id'";
        mysqli_query($con,$sql);
     }
     if($phoneno)
     {
        $sql="update criminal set phone='$phoneno' where criminal_id='$criminal_id'";
        mysqli_query($con,$sql);
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
      <li class=""><a href="policehome.php">Home</a></li>
      <li class=""><a href="policecomplain.php">Available Complains</a></li>
      <li class="active"><a href="policeupdate.php">Update</a></li>
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">CRIMINAL</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
	
<table class="table">

    <thead class="thead-dark">
      <tr>
        <th>CRIMINAL ID</th>
        <th>FIR ID</th>
        <th>FIRSTNAME</th>
		<th>JAIL</th>
		<th>CELL</th>
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


  $namep=$_SESSION['username'];
  $sqlt="select aadhar_id from user where user_name='$namep'";
  $resultr = mysqli_query($con, $sqlt);
  $row = mysqli_fetch_assoc($resultr);
  $paid=$row["aadhar_id"];
  
  $sqly="select police_id from police where aadhar_id='$paid'";
  $resulty = mysqli_query($con, $sqly);
  $row = mysqli_fetch_assoc($resulty);
  $policeid=$row["police_id"];
  
   $sqly="select fir_id from fir where police_id='$policeid'";
  $resulty = mysqli_query($con, $sqly);
  $row = mysqli_fetch_assoc($resulty);
  $nfirid=$row["fir_id"];



$sql = "SELECT criminal_id,fir_id,firstname,jail_reg_id,Cell_no FROM criminal where fir_id='$nfirid'";
$result = mysqli_query($con, $sql);
$num=mysqli_num_rows($result);
//echo $num."<br>"; 

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
        echo "<tr><td>" . $row["criminal_id"]. "</td><td>".$row["fir_id"]."</td><td>". $row["firstname"]. "</td><td>". $row["jail_reg_id"]."</td><td>". $row["Cell_no"]."</td></tr>";
    }
} else {
    echo "0 results you have no criminals under your system";
}
   echo "</tbody></table>";

}
mysqli_close($con);

?>

</div>
      </div>
    </div>



<div class="signup-form">
    <form action="policeupdate.php" method="post">
		<h2>Update</h2>
        
  	<div class="form-group">
        	<input type="number" class="form-control" name="criminal_id" placeholder="Criminal_Id" required="required">
        </div>
		

        <div class="form-group">
            <input type="number " class="form-control" name="fir_id" placeholder="Fir_Id" required="required">
        </div>  
           
    
    
    
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
        </div>
  
<?php 
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
 if(isset($_POST['criminal_id'])){
     $criminal_id=$_POST['criminal_id'];
     $fir_id=$_POST['fir_id'];
     $q="select * from criminal where '$criminal_id'=criminal_id and '$fir_id'=fir_id";
     $result=mysqli_query($con,$q);
     $num=mysqli_num_rows($result);
     if($num==1)
 {
	 $_SESSION['criminal_id']=$criminal_id;
	 header('location:policeupdateinfo.php');
	 //echo "<br> ?WElcome";
 }
 else{
	 //$qy="insert into users values('$aadh','$name','$pass')";
	 echo "INVALID CriminalID/FirID";
	 //mysqli_query($con,$qy);
 }
}

 
?>
</form>
</div>
</div>
</body>
</html>
