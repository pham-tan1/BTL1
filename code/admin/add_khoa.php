<?php include('includes/header.php'); ?>
<script src="../js/formlogin.js"></script>
<style>
.required{color:red;}
</style>
<?php 
	include('../connection.php');
	if(isset($_POST['submit'])){
        $mak=$_POST['mak'];
        $tenk=$_POST['tenk'];
        $socanbo=$_POST['socanbo'];
        $query="SELECT MaK FROM khoa WHERE MaK='$mak'";
        $results=mysqli_query($conn,$query);
        if(mysqli_num_rows($results)>0)
        {
            $message="<p class='required'>Mã khoa đã tồn tại, yêu cầu bạn nhập mã khác!</p>";
        }
        else
        {					
            $query_in="INSERT INTO khoa(MaK,TenK,SoCanBo)
            VALUES('$mak','$tenk','$socanbo')";
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
			<h3>Thêm khoa</h3>
			<div class="form-group">
				<label>Mã Khoa</label>
				<input type="text" name="mak" value="<?php if(isset($_POST['mak'])){ echo $_POST['mak'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập mã khoa!" placeholder="Mã Khoa">				
			</div>
			<div class="form-group">
				<label>Tên khoa</label>
				<input type="text" name="tenk" value="<?php if(isset($_POST['tenk'])){ echo $_POST['tenk'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập tên khoa!" placeholder="Tên khoa">	
			</div>
			<div class="form-group">
				<label>Số cán bộ</label>
				<input type="text" name="socanbo" value="<?php if(isset($_POST['socanbo'])){ echo $_POST['socanbo'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập số cán bộ!" placeholder="Số cán bộ">
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?> 