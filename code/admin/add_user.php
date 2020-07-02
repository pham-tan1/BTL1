<?php include('includes/header.php'); ?>
<script src="../js/formlogin.js"></script>
<style>
.required{color:red;}
</style>
<?php 
	include('../connection.php');
	if(isset($_POST['submit'])){
		$taikhoan=$_POST['taikhoan'];
		$matkhau=$_POST['matkhau'];
		$matkhaure=$_POST['matkhaure'];
		$quyen=$_POST['quyen'];
		if($_POST['matkhau']!=$_POST['matkhaure'])
		{$mess="<p class='required'>Xác nhận mật khẩu sai!</p>";}
		else{
			$query="SELECT taikhoan FROM user WHERE taikhoan='$taikhoan'";
			$results=mysqli_query($conn,$query);
			if(mysqli_num_rows($results)>0)
			{
				$message="<p class='required'>Tài khoản đã tồn tại, yêu cầu bạn nhập tài khoản khác!</p>";
			}
			else
			{	
				$matkhau=md5($matkhau);
				$query_in="INSERT INTO user(taikhoan,matkhau,quyen,MaSV)
				VALUES('$taikhoan','$matkhau','$quyen','$taikhoan')";
				$results_in=mysqli_query($conn,$query_in);
				if(mysqli_affected_rows($conn)==1)
				{
					echo "<p style='color:green;'>Thêm mới thành công</p>";
				}
				else
				{
					echo "<p class='required'>Thêm mới không thành công</p>";	
				}
			}
		}
	}
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    	<form name="frmadd_user" method="POST" action="#">
			<?php if(isset($message)){echo $message;}?>
			<h3>Thêm user</h3>
			<div class="form-group">
				<label>Tài khoản</label>
				<input type="text" name="taikhoan" value="<?php if(isset($_POST['taikhoan'])){ echo $_POST['taikhoan'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập tài khoản!" placeholder="Tài khoản">				
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
			<div class="form-group">
				<label style="display:block;">Chọn quyền</label>
				<label class="radio-inline"><input type="radio" name="quyen" value="1">Quản trị</label>
				<label class="radio-inline"><input checked="checked" type="radio" name="quyen" value="0">Người dùng</label>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?> 