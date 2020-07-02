<?php 
include('connection.php');
$id=$_POST['id'];
$masv=$_POST['masv'];
$sql1="SELECT * FROM svdangky WHERE iddk={$id}";
$query_a1=mysqli_query($conn,$sql1);
$dm_info1=mysqli_fetch_assoc($query_a1);
if(isset($dm_info1['dadk'])){
    $dem=$dm_info1['dadk'];
    $dem++;
}
else{
    $dem=1;
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$todaytime=date('g:i A');
$today=date('Y-m-d');
$sql2="SELECT * FROM dangky WHERE id={$id}";
$query_a2=mysqli_query($conn,$sql2);
$dm_info2=mysqli_fetch_assoc($query_a2);
$sql3="SELECT * FROM monhoc WHERE MaMH='{$dm_info2['MaMH']}'";
$query_a3=mysqli_query($conn,$sql3);
$dm_info3=mysqli_fetch_assoc($query_a3);
$tong=275000*$dm_info3['SoTinChi'];
if($dm_info2['siso']<$dem){
    echo 'Sĩ số lớp đã đủ';
}else{
    $query_in="INSERT INTO svdangky(dadk,iddk,status,giodang,ngaydang,MaSV,tongtien)
                VALUES('$dem','$id','1','$todaytime','$today','$masv','$tong')";
                $results_in=mysqli_query($conn,$query_in);
    if(mysqli_affected_rows($conn)==1)
    {   
        echo "Đăng ký thành công";
    }
    else
    {
        echo "Đăng ký không thành công";	
    }
}
?>