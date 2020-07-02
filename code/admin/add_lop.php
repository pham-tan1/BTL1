<?php include('includes/header.php'); ?>
<?php include('../inc/function.php'); ?>
<script src="../js/formlogin.js"></script>
<style>
.required{color:red;}
</style>
<?php 
	include('../connection.php');
	if(isset($_POST['submit'])){
        $mal=$_POST['mal'];
        $tenl=$_POST['tenl'];
        $siso=$_POST['siso'];
        $mak=$_POST['mak'];
        $makh=$_POST['makh'];
        $mahdt=$_POST['mahdt'];
        $query="SELECT MaL FROM lop WHERE MaL='$mal'";
        $results=mysqli_query($conn,$query);
        if(mysqli_num_rows($results)>0)
        {
            $message="<p class='required'>Mã lớp đã tồn tại, yêu cầu bạn nhập mã khác!</p>";
        }
        else
        {					
            $query_in="INSERT INTO lop(MaL,TenL,SiSo,MaK,MaKH,MaHDT)
            VALUES('$mal','$tenl','$siso','$mak','$makh','$mahdt')";
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
			<h3>Thêm lớp</h3>
			<div class="form-group">
				<label>Mã lớp</label>
				<input type="text" name="mal" value="<?php if(isset($_POST['mal'])){ echo $_POST['mal'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập mã lớp!" placeholder="Mã lớp">				
			</div>
			<div class="form-group">
				<label>Tên lớp</label>
				<input type="text" name="tenl" value="<?php if(isset($_POST['tenl'])){ echo $_POST['tenl'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập tên lóp!" placeholder="Tên lớp">	
			</div>
            <div class="form-group">
				<label>Sĩ số</label>
				<input type="text" name="siso" value="<?php if(isset($_POST['siso'])){ echo $_POST['siso'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập sĩ số!" placeholder="Sĩ số">	
			</div>
			<div class="form-group">
				<label style="display:block;">Mã Khoa</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectkhoa('mak','form-control');?></div>
                <div class="" style="clear:both"></div>
			</div>
            <div class="form-group">
				<label style="display:block;">Mã khóa học</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectkhoahoc('makh','form-control');?></div>
                <div class="" style="clear:both"></div>
			</div>	
            <div class="form-group">
				<label style="display:block;">Mã hệ đào tạo</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selecthedaotao('mahdt','form-control');?></div>
                <div class="" style="clear:both"></div>
			</div>	
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?> 