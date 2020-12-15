<?php

$id=$_POST['getapid'];


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
 echo $id;
 
 $sql="DELETE from criminal where fir_id in(select fir_id from fir where police_id = '$id');";
 mysqli_query($con,$sql);
 $sql1="Delete from fir where police_id='$id'";
 mysqli_query($con,$sql1);

   
  $sql3="update complainant set status='pending' where ps_id in(select ps_id from police where police_id='$id')";
  mysqli_query($con,$sql3);
  
  
  
  $sql4="delete from police where police_id='$id'";
  mysqli_query($con,$sql4);
 

?>