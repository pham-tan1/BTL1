<?php include('includes/header.php'); ?>
<script src="../js/formlogin.js"></script>
<style>
.required{color:red;}
</style>
<?php 
	include('../connection.php');
	if(isset($_POST['submit'])){
        $mam=$_POST['mam'];
        $tenm=$_POST['tenm'];
        $sotinchi=$_POST['sotinchi'];
        $query="SELECT MaMH FROM monhoc WHERE MaMH='$mam'";
        $results=mysqli_query($conn,$query);
        if(mysqli_num_rows($results)>0)
        {
            $message="<p class='required'>Mã môn đã tồn tại, yêu cầu bạn nhập mã khác!</p>";
        }
        else
        {					
            $query_in="INSERT INTO monhoc(MaMH,TenMH,SoTinChi)
            VALUES('$mam','$tenm','$sotinchi')";
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
			<h3>Thêm môn học</h3>
			<div class="form-group">
				<label>Mã môn</label>
				<input type="text" name="mam" value="<?php if(isset($_POST['mam'])){ echo $_POST['mam'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập mã môn!" placeholder="Mã môn">				
			</div>
			<div class="form-group">
				<label>Tên môn</label>
				<input type="text" name="tenm" value="<?php if(isset($_POST['tenm'])){ echo $_POST['tenm'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập tên môn!" placeholder="Tên môn">	
			</div>
			<div class="form-group">
				<label>Số tín chỉ</label>
				<input type="text" name="sotinchi" value="<?php if(isset($_POST['sotinchi'])){ echo $_POST['sotinchi'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập số tín chỉ!" placeholder="Số tín chỉ">
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?> 