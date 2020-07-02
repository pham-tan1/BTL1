<?php include('includes/header.php'); ?>
<script src="../js/formlogin.js"></script>
<style>
.required{color:red;}
</style>
<?php 
	include('../connection.php');
	if(isset($_POST['submit'])){
        $mahdt=$_POST['mahdt'];
        $tenhdt=$_POST['tenhdt'];
        $query="SELECT MaHDT FROM hedaotao WHERE MaHDT='$mahdt'";
        $results=mysqli_query($conn,$query);
        if(mysqli_num_rows($results)>0)
        {
            $message="<p class='required'>Mã hệ đào tạo đã tồn tại, yêu cầu bạn nhập mã khác!</p>";
        }
        else
        {					
            $query_in="INSERT INTO hedaotao(MaHDT,TenHDT)
            VALUES('$mahdt','$tenhdt')";
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
			<h3>Thêm hẹ đào tạo</h3>
			<div class="form-group">
				<label>Mã hệ đào tạo</label>
				<input type="text" name="mahdt" value="<?php if(isset($_POST['mahdt'])){ echo $_POST['mahdt'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập mã hệ đào tạo!" placeholder="Mã hệ đào tạo">				
			</div>
			<div class="form-group">
				<label>Tên hệ đào tạo</label>
				<input type="text" name="tenhdt" value="<?php if(isset($_POST['tenhdt'])){ echo $_POST['tenhdt'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập tên hệ đào tạo!" placeholder="Tên hệ đào tạo">	
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?> 