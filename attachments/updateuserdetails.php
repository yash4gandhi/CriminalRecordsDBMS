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
 $name=$_POST['cusername'];
 $pass=$_POST['password'];

 $email=$_POST['email'];
 $phone=$_POST['phoneno'];
 $dob=$_POST['date'];
 $fn=$_POST['firstname'];
 $ln=$_POST['lastname'];
 $mn=$_POST['middlename'];
  
   $gender=$_POST['gender'];


$uname=$_SESSION['username'];

 
 $w="select * from user where user_name='$uname'";
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
 
 if($name)
 {
	  $w="select * from user where user_name='$name'";
 $result1=mysqli_query($con,$w);
 $num2=mysqli_num_rows($result1);
 
 if($num2==0)
 {
	$sql="update user set user_name='$name' where aadhar_id='$id'";
 mysqli_query($con,$sql);  
	 
 }
 else{
	 
	 echo "USERNAME USED ALREADY";
 } 
	  
 }
 
 if($pass)
 {

	  $w="select * from user where password='$pass'";
 $result1=mysqli_query($con,$w);
 $num3=mysqli_num_rows($result1);
 
 if($num3==0)
 {
	$sql="update user set password='$pass' where aadhar_id='$id'";
 mysqli_query($con,$sql);  
	 
 }
 else{
	 
	 echo "PASSOWRD USED ALREADY";
 }
 }
 }
 
 else{
	 
	 echo "NO SUCH USER PRESENT OR INVALID RECORD";
 }
 
}
?>