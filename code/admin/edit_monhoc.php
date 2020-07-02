<?php ob_start(); ?>
<?php include('includes/header.php'); ?>
<?php include('../connection.php'); ?>
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
        header('Location:list_monhoc.php');
        exit();
    }
    if(isset($_POST['submit'])){
        $mam=$_POST['mam'];
        $tenm=$_POST['tenm'];
        $sotinchi=$_POST['sotinchi'];
        $query="SELECT MaMH FROM monhoc WHERE MaMH='$mam'";
        $results=mysqli_query($conn,$query);
            $query_in="UPDATE monhoc SET TenMH='$tenm',MaMH='$mam',SoTinChi='$sotinchi' WHERE id='$id'";
            $results_in=mysqli_query($conn,$query_in);
            if(mysqli_affected_rows($conn)==1)
            {
                echo "<p style='color:green;'>Sửa thành công</p>";
            }
            else
            {
                echo "<p class='required'>Bạn chưa sửa gì, hoặc đã có mã môn</p>";	
            }	
        }								
    $query_id="SELECT MaMH,TenMH,SoTinChi FROM monhoc WHERE id='$id'";
    $results_id=mysqli_query($conn,$query_id);
    //Kiểm tra xem ID có tồn tại không
    if(mysqli_num_rows($results_id)==1)
    {
        list($mam,$tenm,$sotinchi)=mysqli_fetch_array($results_id,MYSQLI_NUM);				
    }
    else
    {
        header('Location:list_monhoc.php');
        exit();
    }
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    	<form name="fredit_user" method="POST" action="#">
			<?php if(isset($message)){echo $message;}?>
			<h3>Sửa môn học</h3>
			<div class="form-group">
				<label>Mã môn</label>
				<input type="text" name="mam" value="<?php if(isset($mam)){ echo $mam;} ?>" class="form-control" required requiredmsg="Vui lòng nhập mã môn!" placeholder="Mã môn">				
			</div>
			<div class="form-group">
				<label>Tên khoa</label>
				<input type="text" name="tenm" value="<?php if(isset($tenm)){ echo $tenm;} ?>" class="form-control" required requiredmsg="Vui lòng nhập tên môn!" placeholder="Tên môn">	
			</div>
			<div class="form-group">
				<label>Số cán bộ</label>
				<input type="text" name="sotinchi" value="<?php if(isset($sotinchi)){ echo $sotinchi;} ?>" class="form-control" required requiredmsg="Vui lòng nhập số tín chỉ!" placeholder="Số tín chỉ">
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa môn">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?>
<?php ob_flush(); ?>