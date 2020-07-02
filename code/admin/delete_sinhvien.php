<?php 
include('../connection.php');
if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$id=$_GET['id'];
	$msv=$_GET['msv'];
	$query="DELETE FROM sinhvien WHERE id={$id}";
	$result=mysqli_query($conn,$query);
	$query1="DELETE FROM user WHERE MaSV='$msv'";
	$result1=mysqli_query($conn,$query1);
	header('Location: list_sinhvien.php');
}
else
{
	header('Location: list_sinhvien.php');
}
?>