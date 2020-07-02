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
        header('Location:list_khoahoc.php');
        exit();
    }
    if(isset($_POST['submit'])){
        $makh=$_POST['makh'];
        $tenkh=$_POST['tenkh'];
        $query="SELECT MaKH FROM khoahoc WHERE MaKH='$makh'";
        $results=mysqli_query($conn,$query);
            $query_in="UPDATE khoahoc SET TenKH='$tenkh',MaKH='$makh' WHERE id='$id'";
            $results_in=mysqli_query($conn,$query_in);
            if(mysqli_affected_rows($conn)==1)
            {
                echo "<p style='color:green;'>Sửa thành công</p>";
            }
            else
            {
                echo "<p class='required'>Bạn chưa sửa gì, hoặc đã có mã khóa học</p>";	
            }	
        }								 
    $query_id="SELECT MaKH,TenKH FROM khoahoc WHERE id='$id'";
    $results_id=mysqli_query($conn,$query_id);
    //Kiểm tra xem ID có tồn tại không
    if(mysqli_num_rows($results_id)==1)
    {
        list($makh,$tenkh)=mysqli_fetch_array($results_id,MYSQLI_NUM);				
    }
    else
    {
        header('Location:list_khoahoc.php');
        exit();
    }
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    	<form name="fredit_user" method="POST" action="#">
			<?php if(isset($message)){echo $message;}?>
			<h3>Sửa khóa học</h3>
			<div class="form-group">
				<label>Mã khóa học</label>
				<input type="text" name="makh" value="<?php if(isset($makh)){ echo $makh;} ?>" class="form-control" required requiredmsg="Vui lòng nhập mã khóa học!" placeholder="Mã khóa học">				
			</div>
			<div class="form-group">
				<label>Tên khóa học</label>
				<input type="text" name="tenkh" value="<?php if(isset($tenkh)){ echo $tenkh;} ?>" class="form-control" required requiredmsg="Vui lòng nhập tên khóa học!" placeholder="Tên khóa học">	
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa khóa học">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?>
<?php ob_flush(); ?>