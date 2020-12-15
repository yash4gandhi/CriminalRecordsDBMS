<?php
session_start();
if(isset($_SESSION['username']))
{
$con=mysqli_connect('localhost','root');

if($con)
{
	echo "connection successful<br>";
}
else
{
	echo "no connect";
}
 mysqli_select_db($con,'criminalrecords');
$policeid=$_POST['policeid'];

 $email=$_POST['email'];
 $phone=$_POST['phoneno'];
 $dob=$_POST['date'];
 $fn=$_POST['firstname'];
 $ln=$_POST['lastname'];
 $mn=$_POST['middlename'];
  $psid=$_POST['psid'];
 // $psid=$_POST['psid'];
   $gender=$_POST['gender'];

 
 $w="select * from police where police_id='$policeid'";
 $result1=mysqli_query($con,$w);
 $num1=mysqli_num_rows($result1);
 
 if($num1==1)
 {
	 $row = mysqli_fetch_assoc($result1);
	 $id=$row["aadhar_id"];
    if($fn)
 {
 $sql="update user set firstname ='$fn' where aadhar_id='$id'";
 mysqli_query($con,$sql);
 }
    if($mn)
 {
 $sql="update user set middlename ='$mn' where aadhar_id='$id'";
 mysqli_query($con,$sql);
 }
 
    if($ln)
 {
 $sql="update user set lastname ='$ln' where aadhar_id='$id'";
 mysqli_query($con,$sql);
 }
    if($gender)
 {
 $sql="update user set gender ='$gender' where aadhar_id='$id'";
 mysqli_query($con,$sql);
 }
   if($email)
 {
 $sql="update user set email_id='$email' where aadhar_id='$id'";
 mysqli_query($con,$sql);
 }
 
    if($phone)
 {
 $sql="update user set phone ='$phone' where aadhar_id='$id'";
 mysqli_query($con,$sql);
 }
 
    if($dob)
 {
 $sql="update user set dob ='$dob where aadhar_id='$id'";
 mysqli_query($con,$sql);
 }
 
  if($psid)
 {
	 $w="select * from policestation where ps_id='$psid'";
 $result1=mysqli_query($con,$w);
 $num2=mysqli_num_rows($result1);
 
 if($num2==1)
 {
	
	 $sql="DELETE from criminal where fir_id in(select fir_id from fir where police_id = '$policeid')";
 mysqli_query($con,$sql);
 $sql1="Delete from fir where police_id='$policeid'";
 mysqli_query($con,$sql1);

   
  $sql3="update complainant set status='pending' where ps_id in(select ps_id from police where police_id='$policeid')";
  mysqli_query($con,$sql3);
 
  
  $sql4="update police set ps_id='$psid' where police_id='$policeid'";
  mysqli_query($con,$sql4);
	 

 }	
   else
   {
	   echo "INVALID POLICE STATION";
   }
 }
 }
 
 else{
	 
	 echo "NO SUCH POLICE PRESENT";
 }
 
}
?>