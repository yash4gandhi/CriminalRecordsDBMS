<?php

	$id=$_POST['jailregid'];
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
 $name=$_POST['name'];
 $address=$_POST['address'];
 $phone=$_POST['phone'];
 
 
  
 $qr="select * from jail where jail_reg_id='$id'";
 $resultr=mysqli_query($con,$qr);

 $num=mysqli_num_rows($resultr);
 
 if($num==0)
 {	 
	 echo "<br>NO SUCH JAIL";
 } 
 
 else{
 
 if($name)
 {
 $sql="update jail set name='$name' where jail_reg_id='$id'";
 mysqli_query($con,$sql);
 }
 
 if($address)
 {
 $sql="update jail set address='$address' where jail_reg_id='$id'";
 mysqli_query($con,$sql);
 }

 if($phone)
 {
 $sql="update jail set phone='$phone' where jail_reg_id='$id'";
 mysqli_query($con,$sql);
 }
 }
}
?>  