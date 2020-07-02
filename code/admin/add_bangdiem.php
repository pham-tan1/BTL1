<?php include('includes/header.php'); ?>
<?php include('../inc/function.php'); ?>
<script src="../js/formlogin.js"></script>
<style>
.required{color:red;}
</style>
<?php 
	include('../connection.php');
	if(isset($_POST['submit'])){
        $masv=$_POST['masv'];
        $mam=$_POST['mam'];
        $lanthi=$_POST['lanthi'];
        $hocky=$_POST['hocky'];
        $diem=$_POST['diem'];
        $query="SELECT MaSV FROM sinhvien WHERE MaSV='$masv'";
        $results=mysqli_query($conn,$query);
        if(mysqli_num_rows($results)==0)
        {
            $message="<p class='required'>Không tồn tại mã sinh viên, yêu cầu bạn nhập mã khác!</p>";
        }
        else
        {					
            $query_in="INSERT INTO bangdiem(MaSV,MaMH,LanThi,HocKy,Diem)
            VALUES('$masv','$mam','$lanthi','$hocky','$diem')";
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
			<h3>Thêm điểm</h3>
            <div class="form-group">
				<label>Mã sinh viên</label>
				<input type="text" name="masv" value="<?php if(isset($_POST['masv'])){ echo $_POST['masv'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập mã sinh viên!" placeholder="Mã sinh viên">				
			</div>
            <div class="form-group">
				<label style="display:block;">Mã môn học</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectmon('mam','form-control');?></div>
                <div class="" style="clear:both"></div>
			</div>
			<div class="form-group">
				<label>Lần thi</label>
				<input type="text" name="lanthi" value="<?php if(isset($_POST['lanthi'])){ echo $_POST['lanthi'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập lần thi!" placeholder="Lần thi">				
			</div>
			<div class="form-group">
				<label>Học kỳ</label>
				<input type="text" name="hocky" value="<?php if(isset($_POST['hocky'])){ echo $_POST['hocky'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập học kỳ!" placeholder="Học kỳ">	
			</div>
            <div class="form-group">
				<label>Điểm</label>
				<input type="text" name="diem" value="<?php if(isset($_POST['diem'])){ echo $_POST['diem'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập điểm!" placeholder="Điểm">	
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?> 