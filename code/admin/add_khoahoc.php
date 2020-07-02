<?php include('includes/header.php'); ?>
<script src="../js/formlogin.js"></script>
<style>
.required{color:red;}
</style>
<?php 
	include('../connection.php');
	if(isset($_POST['submit'])){
        $makh=$_POST['makh'];
        $tenkh=$_POST['tenkh'];
        $query="SELECT MaKH FROM khoahoc WHERE MaKH='$makh'";
        $results=mysqli_query($conn,$query);
        if(mysqli_num_rows($results)>0)
        {
            $message="<p class='required'>Mã khóa học đã tồn tại, yêu cầu bạn nhập mã khác!</p>";
        }
        else
        {					
            $query_in="INSERT INTO khoahoc(MaKH,TenKH)
            VALUES('$makh','$tenkh')";
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
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    	<form name="frmadd_user" method="POST" action="#">
			<?php if(isset($message)){echo $message;}?>
			<h3>Thêm khóa học</h3>
			<div class="form-group">
				<label>Mã khóa học</label>
				<input type="text" name="makh" value="<?php if(isset($_POST['makh'])){ echo $_POST['makh'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập mã khóa học!" placeholder="Mã khóa học">				
			</div>
			<div class="form-group">
				<label>Tên khóa học</label>
				<input type="text" name="tenkh" value="<?php if(isset($_POST['tenkh'])){ echo $_POST['tenkh'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập tên khóa học!" placeholder="Tên khóa học">	
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?> 