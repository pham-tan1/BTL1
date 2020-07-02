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
    <li><a style="text-decoration:none" href="dangkyhoc.php" title="Sinh viên đăng ký học">Sinh viên đăng ký học</a></li>
</ul>

<div class="container">
    <table class="table table-bordered">
    <tr>
        <td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><b>Mã Sinh Viên:</b></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><?php echo $dm_info1['MaSV']; ?></p></div></td>
        <td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><b>Họ Tên:</b></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><?php echo $dm_info1['TenSV']; ?></p></div></td>
        <td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><b>Trạng Thái:</b></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p>Đang Học</p></div></td>
    </tr>
    <tr>
        <td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><b>Khóa:</b></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><?php echo $dm_info4['TenKH']; ?></p></div></td>
        <td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><b>Ngành:</b></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><?php echo $dm_info5['TenK']; ?></p></div></td>
        <td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><b>Lớp:</b></p></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p><?php echo $dm_info3['TenL']; ?></p></div></td>
    </tr>
    </table>
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h3>Đăng ký môn học</h3></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9"><h3 style="margin-top:0px;color:green">Danh Sách Lớp Học Phần Có Thể Đăng Ký Học</h3></div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9"><p style="padding-left:65px"><small>Những lớp học phần thuộc cùng một dải màu liên tiếp dạy cùng một học phần, chỉ được chọn không quá 1 lớp</small></p></div>
        <table class="table table-bordered">
            <thead>
                <tr class="bg-primary">
                <th scope="col">STT</th>
                <th scope="col">Chọn</th>
                <th scope="col">Mã học phần</th>
                <th scope="col">Tên học phần</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Địa điểm</th>
                <th scope="col">Giảng viên</th>
                <th scope="col">Sĩ số</th>
                <th scope="col">Đã ĐK</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $sql="SELECT * FROM dangky WHERE MaKH='{$dm_info3['MaKH']}' and MaK='{$dm_info3['MaK']}'";
                $query_a=mysqli_query($conn,$sql);
                $dem=1;
                $num_row=mysqli_num_rows($query_a);
                if($num_row!=0){
                while($dm_info=mysqli_fetch_array($query_a,MYSQLI_ASSOC)){
            ?>
                <tr>
                <th scope="row"><?php echo $dem; ?></th>
                <td><div class="dangky<?php echo $dm_info['id']; ?>" id="<?php echo $dm_info['id']; ?>" style="cursor:pointer;color:green">Đăng ký</a></td>
                <?php $sql7="SELECT * FROM svdangky WHERE iddk='{$dm_info['id']}' and MaSV='{$dm_info1['MaSV']}'";
                $query_a7=mysqli_query($conn,$sql7);
                $dm_info7=mysqli_fetch_array($query_a7,MYSQLI_ASSOC);
                $sql10="SELECT * FROM svdangky WHERE iddk='{$dm_info['id']}' ORDER BY dadk desc limit 1";
                $query_a10=mysqli_query($conn,$sql10);
                $dm_info10=mysqli_fetch_array($query_a10,MYSQLI_ASSOC);
                ?>
                <input type="hidden" name="" class="dk<?php echo $dm_info['id']; ?>" value="<?php echo $dm_info7['status']; ?>">
                <input type="hidden" name="" class="1dk<?php echo $dm_info['id']; ?>" value="<?php echo $dm_info1['MaSV']; ?>">
                <td><?php echo $dm_info['MaMH']; ?></td>
                <td><?php
                $sql2="SELECT * FROM monhoc WHERE MaMH='{$dm_info['MaMH']}'";
                $query_a2=mysqli_query($conn,$sql2);
                $dm_info2=mysqli_fetch_assoc($query_a2);
                echo $dm_info2['TenMH'];
                ?>
                </td>
                <td><?php
                $ngayhoc_ht=explode("-",$dm_info['ngayhoc']);
                $ngayhoc_in=$ngayhoc_ht[2].'-'.$ngayhoc_ht[1].'-'.$ngayhoc_ht[0];
                $ngaykt_ht=explode("-",$dm_info['ngayketthuc']);
                $ngaykt_in=$ngaykt_ht[2].'-'.$ngaykt_ht[1].'-'.$ngaykt_ht[0];
                echo 'Từ '.$ngayhoc_in.' đến '.$ngaykt_in; ?></td>
                <td><?php echo $dm_info['diadiem']; ?></td>
                <td><?php echo $dm_info['giangvien']; ?></td>
                <td><?php echo $dm_info['siso']; ?></td>
                <td><?php if(isset($dm_info10['dadk'])){echo $dm_info10['dadk'];}else{echo '0';} ?></td>
                </tr>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $(".dangky<?php echo $dm_info['id']; ?>").click(function(){
                            var id=$(this).attr('id');
                            var bien=$(".dk<?php echo $dm_info['id']; ?>").val();
                            var masv=$(".1dk<?php echo $dm_info['id']; ?>").val();
                            if(bien=='1')
                            {
                                alert("Bạn đã đăng ký môn học này!");
                                return false;
                            }
                            else{
                                $.ajax({
                                    type: "POST",
                                    url: "addthongtin.php",
                                    data: {id : id,masv : masv},
                                    cache:false,
                                    success:function(results){
                                        alert(results);
                                        location.reload();
                                    }
                                });
                            }
                            return false;
                        });
                    });
                </script>
                <?php $dem++; } } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('includes/footer.php'); ?>