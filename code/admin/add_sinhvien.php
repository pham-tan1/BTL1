<?php include('includes/header.php'); ?>
<?php include('../inc/function.php'); ?>
<script src="../js/formlogin.js"></script>
<style>
.required{color:red;}
</style>
<?php 
	include('../connection.php');
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
		if(empty($errors)){
			$masv=$_POST['masv'];
			$hoten=$_POST['hoten'];
			$dienthoai=$_POST['dienthoai'];
			$diachi=$_POST['diachi'];
			$gioitinh=$_POST['gioitinh'];
			$malop=$_POST['malop'];
			$matkhau=$_POST['matkhau'];
			$matkhaure=$_POST['matkhaure'];
			$ngaydang_ht=explode("-",$_POST['ngaysinh']);
			$ngaydang_in=$ngaydang_ht[2].'-'.$ngaydang_ht[1].'-'.$ngaydang_ht[0];
			if($_POST['matkhau']!=$_POST['matkhaure'])
			{$mess="<p class='required'>Xác nhận mật khẩu sai!</p>";}
			else{
				$query="SELECT MaSV FROM sinhvien WHERE MaSV='$masv'";
				$results=mysqli_query($conn,$query);
				$query2="SELECT Email FROM sinhvien WHERE Email='$email'";
				$results2=mysqli_query($conn,$query2);
				if(mysqli_num_rows($results)>0)
				{
					$message="<p class='required'>Mã sinh viên đã tồn tại, yêu cầu bạn nhập mã khác!</p>";
				}
				elseif(mysqli_num_rows($results2)>0)
				{
					$message="<p class='required'>Email đã tồn tại, yêu cầu bạn nhập email khác!</p>";	
				}
				else
				{	
					$query_in="INSERT INTO sinhvien(MaSV,TenSV,GioiTinh,NgaySinh,QueQuan,Email,SDT,MaL)
					VALUES('$masv','$hoten','$gioitinh','$ngaydang_in','$diachi','$email','$dienthoai','$malop')";
					$results_in=mysqli_query($conn,$query_in);
					if(mysqli_affected_rows($conn)==1)
					{
						echo "<p style='color:green;'>Thêm mới thành công</p>";
						$matkhau=md5($matkhau);
						$query_in1="INSERT INTO user(taikhoan,matkhau,MaSV)
						VALUES('$masv','$matkhau','$masv')";
						$results_in1=mysqli_query($conn,$query_in1);
					}
					else
					{
						echo "<p class='required'>Thêm mới không thành công</p>";	
					}
				}
			}
		}
	}
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    	<form name="frmadd_user" method="POST" action="#">
			<?php if(isset($message)){echo $message;}?>
			<h3>Thêm sinh viên</h3>
			<div class="form-group">
				<label>Mã sinh viên</label>
				<input type="text" name="masv" value="<?php if(isset($_POST['masv'])){ echo $_POST['masv'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập mã sinh viên!" placeholder="Tài khoản">				
			</div>
			<div class="form-group">
				<label>Tên sinh viên</label>
				<input type="text" name="hoten" value="<?php if(isset($_POST['hoten'])){ echo $_POST['hoten'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập họ tên!" placeholder="Họ tên">	
			</div>
			<div class="form-group">
				<label style="display:block;">Giới tính</label>
				<label class="radio-inline"><input checked="checked" type="radio" name="gioitinh" value="1">Nam</label>
				<label class="radio-inline"><input type="radio" name="gioitinh" value="0">Nữ</label>
			</div>
			<div class="form-group">
				<label>Ngày sinh</label>
				<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> 
					<input class="form-control" readonly="true" type="text" name="ngaysinh"> 
					<span class="input-group-addon">
						<i class="fa fa-calendar-alt"></i>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label>Quê quán</label>
				<input type="text" name="diachi" value="<?php if(isset($_POST['diachi'])){ echo $_POST['diachi'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập quê quán!" placeholder="Quê quán">
			</div>	
			<div class="form-group">
				<label>Điện thoại</label>
				<input type="text" name="dienthoai" value="<?php if(isset($_POST['dienthoai'])){ echo $_POST['dienthoai'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập điện thoại!" placeholder="Điện thoại">
			</div>	
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập email!" placeholder="Email">
				<?php 
					if(isset($errors) && in_array('email',$errors))
					{
						echo "<p class='required'>Email không hợp lệ</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label style="display:block;">Mã lớp</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectlop('malop','form-control');?></div>
                <div class="" style="clear:both"></div>
			</div>
			<div class="form-group">
				<label>Mật khẩu</label>
				<input type="password" name="matkhau" value="" class="form-control" required requiredmsg="Vui lòng nhập mật khẩu!" placeholder="Mật khẩu">
			</div>
			<div class="form-group">
				<label>Xác nhận mật khẩu</label>
				<input type="password" name="matkhaure" value="" class="form-control" required requiredmsg="Vui lòng nhập xác nhận mật khẩu!" placeholder="Xác nhận mật khẩu">
				<?php if(isset($mess)){echo $mess;} ?>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?> 