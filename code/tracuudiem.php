<?php include('includes/header.php'); ?>
<?php 
    $sql1="SELECT * FROM sinhvien WHERE MaSV='{$_SESSION['msv']}'";
    $query_a1=mysqli_query($conn,$sql1);
    $dm_info1=mysqli_fetch_assoc($query_a1);
    $sql3="SELECT * FROM lop WHERE MaL='{$dm_info1['MaL']}'";
    $query_a3=mysqli_query($conn,$sql3);
    $dm_info3=mysqli_fetch_assoc($query_a3);
    $sql4="SELECT * FROM khoahoc WHERE MaKH='{$dm_info3['MaKH']}'";
    $query_a4=mysqli_query($conn,$sql4);
    $dm_info4=mysqli_fetch_assoc($query_a4);
    $sql5="SELECT * FROM khoa WHERE MaK='{$dm_info3['MaK']}'";
    $query_a5=mysqli_query($conn,$sql5);
    $dm_info5=mysqli_fetch_assoc($query_a5);
?>
<ul class="breadcrumb">
    <li><a href="index.php" title="Trang chủ"><i class="fa fa-home"></i></a></li>
    <li><a style="text-decoration:none" href="tracuudiem.php" title="Tra cứu điểm học tập">Tra cứu điểm học tập</a></li>
</ul>
<div class="container">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><b>Mã Sinh Viên:</b></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><?php echo $dm_info1['MaSV']; ?></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><b>Khóa:</b></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><?php echo $dm_info4['TenKH']; ?></p></div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><b>Họ Tên:</b></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><?php echo $dm_info1['TenSV']; ?></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><b>Ngành:</b></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><?php echo $dm_info5['TenK']; ?></p></div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><b>Trạng Thái:</b></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p>Đang Học</p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><b>Lớp:</b></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><?php echo $dm_info3['TenL']; ?></p></div>
    </div>
    <div class="row">
        <h3>Chi tiết bảng điểm</h3>
        <table class="table table-bordered">
            <thead>
                <tr class="bg-primary">
                <th scope="col">STT</th>
                <th scope="col">Mã học phần</th>
                <th scope="col">Tên học phần</th>
                <th scope="col">Số TC</th>
                <th scope="col">Lần học</th>
                <th scope="col">Lần thi</th>
                <th scope="col">Điểm thứ</th>
                <th scope="col">Đánh giá</th>
                <th scope="col">Mã sinh viên</th>
                <th scope="col">Điểm thi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $sql="SELECT * FROM bangdiem WHERE MaSV='{$_SESSION['msv']}'";
                $query_a=mysqli_query($conn,$sql);
                $dem=1;
                while($dm_info=mysqli_fetch_array($query_a,MYSQLI_ASSOC)){
            ?>
                <tr>
                <th scope="row"><?php echo $dem; ?></th>
                <td><?php echo $dm_info['MaMH']; ?></td>
                <td><?php
                $sql2="SELECT * FROM monhoc WHERE MaMH='{$dm_info['MaMH']}'";
                $query_a2=mysqli_query($conn,$sql2);
                $dm_info2=mysqli_fetch_assoc($query_a2);
                echo $dm_info2['TenMH'];
                ?>
                </td>
                <td><?php echo $dm_info2['SoTinChi']; ?></td>
                <td><?php echo $dm_info['LanThi']; ?></td>
                <td><?php echo $dm_info['LanThi']; ?></td>
                <td><?php echo $dm_info['LanThi']; ?></td>
                <td><?php if($dm_info['Diem']>=4){echo 'DAT';} else{echo 'K DAT';} ?></td>
                <td><?php echo $dm_info['MaSV']; ?></td>
                <td><?php echo $dm_info['Diem']; ?></td>
                </tr>
                <?php $dem++; } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('includes/footer.php'); ?>