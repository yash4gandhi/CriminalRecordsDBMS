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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">POLICE STATIONS</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
		
		 <div class="signup-form">
    <form action="updatep.php" method="post">
		<h2>update</h2>
		
      
        <div class="form-group">
        	<input type="number" class="form-control" name="psid" placeholder="psid" required="required">
        </div>
		<div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="address" >
        </div>
		<div class="form-group">
            <input type="number" class="form-control" name="phone" placeholder="Phone" >
        </div>
    
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">update</button>
				
		
		
		</div>
		</form>
      </div>
    </div>
	</div>
  
	
	
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">POLICE </a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
		
		<div class="signup-form">
    <form action="updatepolice.php" method="post">
		<h2>update</h2>
		
        <div class="form-group">
			<div class="row">
				<div class="col-xs-4"><input type="text" class="form-control" name="firstname" placeholder="First Name" ></div>
				<div class="col-xs-4"><input type="text" class="form-control" name="middlename" placeholder="Middle Name"></div>
				<div class="col-xs-4"><input type="text" class="form-control" name="lastname" placeholder="Last Name" ></div>
	
			</div>        	
        </div>
		
		<div class="form-group">
        	<input type="number" class="form-control" name="policeid" placeholder="policeID" required="required">
        </div>
		
		
		<div class="form-group">
        	<input type="number" class="form-control" name="psid" placeholder="policestationID">
        </div>
		
 
		<div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email">
        </div>
		

        <div class="form-group">
            <input type="number" class="form-control" name="phoneno" placeholder="Phoneno" >
        </div>  
            <div class="form-group">
            <input type="text" class="form-control" name="date" placeholder="YYYY/MM/DD" >
        </div>   
		
		 <div class="form-group">
            <input type="text" class="form-control" name="gender" placeholder="gender" >
        </div> 

    
    
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">update</button>
        </div>
		</form>
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
		
		<div class="signup-form">
    <form action="updatej.php" method="post">
		<h2>update</h2>
		
      
        <div class="form-group">
        	<input type="number" class="form-control" name="jailregid" placeholder="jailregid" required="required">
        </div>
		
		<div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="name" >
        </div>
		
		
		<div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="address" >
        </div>
		<div class="form-group">
            <input type="number" class="form-control" name="phone" placeholder="Phone" >
        </div>
    
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">update</button>
				
		
		
		</div>
		</form>
      </div>

		
		
		
		</div>
      </div>
    </div>
	
	
	
	
  </div> 
</div>

  </div>

</body>
</html>
