<?php

	$id=$_POST['psid'];
if($id)
{

$con=mysqli_connect('localhost','root');

if($con)
{
	echo "connection successful";
}
else
	
{
	echo "no connect";
}
 mysqli_select_db($con,'criminalrecords');
 //echo $id;
 
 $address=$_POST['address'];
 $phone=$_POST['phone'];
 //echo $phone;
 
 
 $qr="select * from policestation where ps_id='$id'";
 $resultr=mysqli_query($con,$qr);
  $num=mysqli_num_rows($resultr);
 
 if($num==0)
 {
	
	 echo "<br>No such police station present";
 }
 else{

 
 
 if($address)
 {
 $sql="update policestation set address='$address' where ps_id='$id'";
 mysqli_query($con,$sql);
 }

 if($phone)
 {
 $sql1="update policestation set phone='$phone' where ps_id='$id'";
 mysqli_query($con,$sql1);
 }
 }
}
?>  