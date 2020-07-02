<?php include('includes/header.php'); ?>
<?php include('./connection.php'); ?>
<?php if(!isset($_SESSION['username'])){header('location:ĐPKS.php');} ?>
<script src="./js/formlogin.js"></script>
<style>
.required{color:red;}
#pham{
    background-repeat: no-repeat;
    background-size: 99% 100%;
}
</style>
<?php 
    $id=$_SESSION['id'];
    $query_id="SELECT MaSV,taikhoan FROM user WHERE id='$id'";
    $results_id=mysqli_query($conn,$query_id);
    //Kiểm tra xem ID có tồn tại không
    if(mysqli_num_rows($results_id)==1)
    {
        list($MaSV,$taikhoan)=mysqli_fetch_array($results_id,MYSQLI_NUM);				
    }
    $query_id1="SELECT TenSV,QueQuan,Email,SDT FROM sinhvien WHERE MaSV='$MaSV'";
    $results_id1=mysqli_query($conn,$query_id1);
    if(mysqli_num_rows($results_id1)==1)
    {
        list($hoten,$diachi,$email,$dienthoai)=mysqli_fetch_array($results_id1,MYSQLI_NUM);				
    }
?>
<div class="bootstrap-iso">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="pham">
            <form name="fredit_user" method="POST" action="#" style="margin:70px auto 120px auto;padding:0 20px 0 20px;width:400px;background-color:#EEF9FF;">
                <h3>Xem thông tin</h3>
                <?php if(isset($message)){echo $message;}?>
                <div class="form-group">
                    <label>Tài khoản</label>
                    <input type="text" name="taikhoan" value="<?php if(isset($taikhoan)){ echo $taikhoan;} ?>" class="form-control" required requiredmsg="Vui lòng nhập tài khoản!" placeholder="Tài khoản" disabled="true">				
                </div>
                <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" name="hoten" value="<?php if(isset($hoten)){ echo $hoten;} ?>" class="form-control" required requiredmsg="Vui lòng nhập họ tên!" placeholder="Họ tên" disabled="true">	
                </div>	
                <div class="form-group">
                    <label>Điện thoại</label>
                    <input type="text" name="dienthoai" value="<?php if(isset($dienthoai)){ echo $dienthoai;} ?>" class="form-control" required requiredmsg="Vui lòng nhập điện thoại!" placeholder="Điện thoại" disabled="true">
                </div>	
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php if(isset($email)){ echo $email;} ?>" class="form-control" required requiredmsg="Vui lòng nhập email!" placeholder="Email" disabled="true">
                    <?php 
                        if(isset($errors) && in_array('email',$errors))
                        {
                            echo "<p class='required'>Email không hợp lệ</p>";
                        }
                    ?>
                </div>	
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="diachi" value="<?php if(isset($diachi)){ echo $diachi;} ?>" class="form-control" required requiredmsg="Vui lòng nhập địa chỉ!" placeholder="Địa chỉ" disabled="true">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>