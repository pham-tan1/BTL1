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
<ul class="breadcrumb" style="margin-bottom:0px;">
    <li><a href="index.php" title="Trang chủ"><i class="fa fa-home"></i></a></li>
    <li><a style="text-decoration:none" href="ketquadangky.php" title="Kết quả đăng ký học">Kết quả đăng ký học</a></li>
</ul>
<div class="container-fluid" >
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="left">
            <?php include('includes/box_left.php'); ?>
        </div>	
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="min-height:495px;">
        <div class="container-fluid" style="margin-top:15px;">
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
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"></div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><h3>Kết quả đăng ký môn học</h3></div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-primary">
                            <th scope="col">STT</th>
                            <th scope="col">Mã học phần</th>
                            <th scope="col">Tên học phần</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Địa điểm</th>
                            <th scope="col">Giảng viên</th>
                            <th scope="col">Sĩ số</th>
                            <th scope="col">Số ĐK</th>
                            <th scope="col">Số TC</th>
                            <th scope="col">Học phí</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $sql="SELECT * FROM svdangky WHERE MaSV='{$dm_info1['MaSV']}'";
                        $query_a=mysqli_query($conn,$sql);
                        $dem=1;
                        $dem2=0;
                        $dem1=0;
                        $num_row=mysqli_num_rows($query_a);
                        if($num_row!=0){
                        while($dm_info=mysqli_fetch_array($query_a,MYSQLI_ASSOC)){
                    ?>
                        <tr>
                            <th scope="row"><?php echo $dem; ?></th>
                            <td><?php 
                            $sql9="SELECT * FROM dangky WHERE id='{$dm_info['iddk']}'";
                            $query_a9=mysqli_query($conn,$sql9);
                            $dm_info9=mysqli_fetch_assoc($query_a9);
                            echo $dm_info9['MaMH']; ?></td>
                            <td><?php
                            $sql2="SELECT * FROM monhoc WHERE MaMH='{$dm_info9['MaMH']}'";
                            $query_a2=mysqli_query($conn,$sql2);
                            $dm_info2=mysqli_fetch_assoc($query_a2);
                            echo $dm_info2['TenMH'];
                            ?>
                            </td>
                            <td><?php
                            $ngayhoc_ht=explode("-",$dm_info9['ngayhoc']);
                            $ngayhoc_in=$ngayhoc_ht[2].'-'.$ngayhoc_ht[1].'-'.$ngayhoc_ht[0];
                            $ngaykt_ht=explode("-",$dm_info9['ngayketthuc']);
                            $ngaykt_in=$ngaykt_ht[2].'-'.$ngaykt_ht[1].'-'.$ngaykt_ht[0];
                            echo 'Từ '.$ngayhoc_in.' đến '.$ngaykt_in; ?></td>
                            <td><?php echo $dm_info9['diadiem']; ?></td>
                            <td><?php echo $dm_info9['giangvien']; ?></td>
                            <td><?php echo $dm_info9['siso']; ?></td>
                            <td><?php if(isset($dm_info['dadk'])){echo $dm_info['dadk'];}else{echo '0';} ?></td>
                            <td><?php echo $dm_info2['SoTinChi']; ?></td>
                            <td><?php echo number_format($dm_info['tongtien'],0,'.','.'); ?></td>
                            <?php $dem2=$dem2+$dm_info2['SoTinChi'];
                                $dem1=$dem1+$dm_info['tongtien'];
                            ?>
                        </tr>
                    <?php $dem++; } } ?>
                        <tr>
                            <td></td>
                            <td colspan="2" align="center"><b>Tổng</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $dem2; ?></td>
                            <td><?php echo number_format($dem1,0,'.','.'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>