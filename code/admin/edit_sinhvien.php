<?php ob_start(); ?>
<?php include('includes/header.php'); ?>
<?php include('../connection.php'); ?>
<?php include('../inc/function.php'); ?>
<script src="../js/formlogin.js"></script>
<style>
.required{color:red;}
</style>
<?php 
    if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
    {
        $id=$_GET['id'];
    }
    else
    {
        header('Location:list_sinhvien.php');
        exit();
    }
    if(isset($_POST['submit'])){
        $errors=array();
		if(filter_var(($_POST['email']),FILTER_VALIDATE_EMAIL)==TRUE)
		{
			$email=mysqli_real_escape_string($conn,$_POST['email']);
		}
		else
		{
			$errors[]='email';
		}
        if(empty($errors))
        {
			$masv=$_POST['masv'];
			$hoten=$_POST['hoten'];
			$dienthoai=$_POST['dienthoai'];
			$ngaysinh=$_POST['ngaysinh'];
			$diachi=$_POST['diachi'];
			$gioitinh=$_POST['gioitinh'];
			$malop=$_POST['malop'];						
            $query_in="UPDATE sinhvien SET MaSV='$masv',TenSV='$hoten',SDT='$dienthoai',Email='$email',QueQuan='$diachi',GioiTinh='$gioitinh',NgaySinh='$ngaysinh',MaL='$malop' WHERE id='$id'";
            $results_in=mysqli_query($conn,$query_in);
            if(mysqli_affected_rows($conn)==1)
            {
                echo "<p style='color:green;'>Sửa thành công</p>";
            }
            else
            {
                echo "<p class='required'>Bạn chưa sửa gì</p>";	
            }					
        }  
    }
    $query_id="SELECT MaSV,TenSV,SDT,Email,QueQuan,GioiTinh,NgaySinh,MaL FROM sinhvien WHERE id='$id'";
    $results_id=mysqli_query($conn,$query_id);
    //Kiểm tra xem ID có tồn tại không
    if(mysqli_num_rows($results_id)==1)
    {
        list($masv,$hoten,$dienthoai,$email,$diachi,$gioitinh,$ngaysinh,$malop)=mysqli_fetch_array($results_id,MYSQLI_NUM);				
    }
    else
    {
        header('Location:list_sinhvien.php');
        exit();
    }
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    	<form name="fredit_user" method="POST" action="#">
			<?php if(isset($message)){echo $message;}?>
			<h3>Sửa sinh viên</h3>
			<div class="form-group">
				<label>Mã sinh viên</label>
				<input type="text" name="masv" value="<?php if(isset($taikhoan)){ echo $taikhoan;} ?>" class="form-control" required requiredmsg="Vui lòng nhập tài khoản!" placeholder="Tài khoản" disabled="true">				
			</div>
			<div class="form-group">
				<label>Tên sinh viên</label>
				<input type="text" name="hoten" value="<?php if(isset($hoten)){ echo $hoten;} ?>" class="form-control" required requiredmsg="Vui lòng nhập họ tên!" placeholder="Họ tên">	
			</div>
			<div class="form-group">
				<label style="display:block;">Giới tính</label>
				<?php if($gioitinh==1){ ?>
				<label class="radio-inline"><input checked="checked" type="radio" name="gioitinh" value="1">Nam</label>
				<label class="radio-inline"><input type="radio" name="gioitinh" value="0">Nữ</label>
                <?php }else{ ?>
                <label class="radio-inline"><input type="radio" name="gioitinh" value="1">Nam</label>
				<label class="radio-inline"><input checked="checked" type="radio" name="gioitinh" value="0">Nữ</label>
                <?php } ?>
			</div>
			<div class="form-group">
				<label>Ngày sinh</label>
				<?php 
					if(isset($ngaysinh))
					{
						$ngaydang_cu=explode('-',$ngaysinh);
						$ngaydang_cu_m=$ngaydang_cu[2].'-'.$ngaydang_cu[1].'-'.$ngaydang_cu[0];
					}
				?>
					<input class="form-control" type="text" value="<?php echo $ngaydang_cu_m; ?>" id="ngaydang_edit" name="ngaysinh"> 
			</div>
			<div class="form-group">
				<label>Quê quán</label>
				<input type="text" name="diachi" value="<?php if(isset($diachi)){ echo $diachi;} ?>" class="form-control" required requiredmsg="Vui lòng nhập quê quán!" placeholder="Quê quán">
			</div>
			<div class="form-group">
				<label>Điện thoại</label>
				<input type="text" name="dienthoai" value="<?php if(isset($dienthoai)){ echo $dienthoai;} ?>" class="form-control" required requiredmsg="Vui lòng nhập điện thoại!" placeholder="Điện thoại">
			</div>	
			<div class="form-group">
				<label>Email</label>
                <input type="text" name="email" value="<?php if(isset($email)){ echo $email;} ?>" class="form-control" required requiredmsg="Vui lòng nhập email!" placeholder="Email">
                <?php 
					if(isset($errors) && in_array('email',$errors))
					{
						echo "<p class='required'>Email không hợp lệ</p>";
					}
				?>
			</div>	
			<div class="form-group">
				<label style="display:block;">Mã lớp</label>
                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectlop1('malop','form-control',$malop);?></div>
                <div class="" style="clear:both"></div>
            </div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa sinh viên">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?>
<?php ob_flush(); ?>