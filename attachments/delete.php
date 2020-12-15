<?php

	$id=$_POST['getaid'];


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
 
 $sql="DELETE from criminal where fir_id in(select fir_id from fir where fir_id in(select complain_id from complainant where complainant_aadhar_id='$id'));";
 mysqli_query($con,$sql);
 $sql1="Delete from fir where fir_id in(select complain_id from complainant where complainant_aadhar_id='$id')";
 mysqli_query($con,$sql1);
 $sql2="delete from complainant where complainant_aadhar_id='$id'";
  mysqli_query($con,$sql2);
  
  $sql3="delete from user where aadhar_id='$id'";
  mysqli_query($con,$sql3);
  
?>  