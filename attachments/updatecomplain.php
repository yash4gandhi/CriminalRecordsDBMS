<?php
session_start();
if(isset($_SESSION['username']))
{

$con=mysqli_connect('localhost','root');

if($con)
{
	echo "connection successful<BR>";
}
else
{
	echo "no connect";
}
 mysqli_select_db($con,'criminalrecords');
$complainid=$_POST['complainid'];
$psid=$_POST['psid'];
$ctype=$_POST['crimetype'];
$loc=$_POST['location'];
$date=$_POST['date'];
$uname=$_SESSION['username'];
 $q="select aadhar_id from user where user_name='$uname'";
 $result=mysqli_query($con,$q);
 $row= mysqli_fetch_assoc($result);
 $id=$row["aadhar_id"];
//echo $complainid;
//echo $id;
 
 
 $qr="select status,complainant_aadhar_id from complainant where complain_id='$complainid'";
 $resultr=mysqli_query($con,$qr);
 $rowr= mysqli_fetch_assoc($resultr);
 $status=$rowr["status"];
 $checkid=$rowr["complainant_aadhar_id"];
 
 if($status=='approved'||$checkid!=$id)
 {
	 echo "<h2>CANNOT UPDATE</H2>";
 }

  else{

	if($ctype)
 {
 $sql="update complainant set crime_type='$ctype' where complainant_aadhar_id='$id'";
 mysqli_query($con,$sql);
 }

 if($loc)
 {
 $sql="update complainant set location='$loc' where complainant_aadhar_id='$id'";
 mysqli_query($con,$sql);
 }
  
  if($date)
 {
 $sql="update complainant set crime_date='$date' where complainant_aadhar_id='$id'";
 mysqli_query($con,$sql);
 }
	 
	 if($psid)
	 {
	 
	 
 $sql="update complainant set ps_id='$psid' where complainant_aadhar_id='$id'";
 mysqli_query($con,$sql);
 }
	 
	 echo "UPDATED";
  }
 
}

?>