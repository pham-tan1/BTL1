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
        header('Location:list_khoa.php');
        exit();
    }
    if(isset($_POST['submit'])){
        $mak=$_POST['mak'];
        $tenk=$_POST['tenk'];
        $socanbo=$_POST['socanbo'];
        $query="SELECT MaK FROM khoa WHERE MaK='$mak'";
        $results=mysqli_query($conn,$query);
            $query_in="UPDATE khoa SET TenK='$tenk',MaK='$mak',SoCanBo='$socanbo' WHERE id='$id'";
            $results_in=mysqli_query($conn,$query_in);
            if(mysqli_affected_rows($conn)==1)
            {
                echo "<p style='color:green;'>Sửa thành công</p>";
            }
            else
            {
                echo "<p class='required'>Bạn chưa sửa gì, hoặc đã có mã khoa</p>";	
            }	
        }								  
    $query_id="SELECT MaK,TenK,SoCanBo FROM khoa WHERE id='$id'";
    $results_id=mysqli_query($conn,$query_id);
    //Kiểm tra xem ID có tồn tại không
    if(mysqli_num_rows($results_id)==1)
    {
        list($mak,$tenk,$socanbo)=mysqli_fetch_array($results_id,MYSQLI_NUM);				
    }
    else
    {
        header('Location:list_khoa.php');
        exit();
    }
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    	<form name="fredit_user" method="POST" action="#">
			<?php if(isset($message)){echo $message;}?>
			<h3>Sửa khoa</h3>
			<div class="form-group">
				<label>Mã Khoa</label>
				<input type="text" name="mak" value="<?php if(isset($mak)){ echo $mak;} ?>" class="form-control" required requiredmsg="Vui lòng nhập mã khoa!" placeholder="Mã Khoa">				
			</div>
			<div class="form-group">
				<label>Tên khoa</label>
				<input type="text" name="tenk" value="<?php if(isset($tenk)){ echo $tenk;} ?>" class="form-control" required requiredmsg="Vui lòng nhập tên khoa!" placeholder="Tên khoa">	
			</div>
			<div class="form-group">
				<label>Số cán bộ</label>
				<input type="text" name="socanbo" value="<?php if(isset($socanbo)){ echo $socanbo;} ?>" class="form-control" required requiredmsg="Vui lòng nhập số cán bộ!" placeholder="Số cán bộ">
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa khoa">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?>
<?php ob_flush(); ?>