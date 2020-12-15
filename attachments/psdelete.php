<?php

$id=$_POST['getapsid'];


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
 
 $sql="DELETE from criminal where fir_id in(select fir_id from fir where ps_id = '$id');";
 mysqli_query($con,$sql);
 $sql1="Delete from fir where ps_id='$id'";
 mysqli_query($con,$sql1);
 $sql2="delete from complainant where ps_id='$id'";
  mysqli_query($con,$sql2);
  
  $sql4="delete from police where ps_id='$id'";
  $result1=mysqli_query($con,$sql4);
 
 
  $sql3="delete from policestation where ps_id='$id'";
  $result=mysqli_query($con,$sql3);
 

?>