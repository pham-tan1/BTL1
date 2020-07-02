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
        header('Location:list_hedaotao.php');
        exit();
    }
    if(isset($_POST['submit'])){
        $mahdt=$_POST['mahdt'];
        $tenhdt=$_POST['tenhdt'];
        $query="SELECT MaHDT FROM hedaotao WHERE MaHDT='$mahdt'";
        $results=mysqli_query($conn,$query);
            $query_in="UPDATE hedaotao SET TenHDT='$tenhdt',MaHDT='$mahdt' WHERE id='$id'";
            $results_in=mysqli_query($conn,$query_in);
            if(mysqli_affected_rows($conn)==1)
            {
                echo "<p style='color:green;'>Sửa thành công</p>";
            }
            else
            {
                echo "<p class='required'>Bạn chưa sửa gì, hoặc đã có mã hệ đào tạo</p>";	
            }	
        }								 
    $query_id="SELECT MaHDT,TenHDT FROM hedaotao WHERE id='$id'";
    $results_id=mysqli_query($conn,$query_id);
    //Kiểm tra xem ID có tồn tại không
    if(mysqli_num_rows($results_id)==1)
    {
        list($makh,$tenkh)=mysqli_fetch_array($results_id,MYSQLI_NUM);				
    }
    else
    {
        header('Location:list_hedaotao.php');
        exit();
    }
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    	<form name="fredit_user" method="POST" action="#">
			<?php if(isset($message)){echo $message;}?>
			<h3>Sửa hệ đào tạo</h3>
			<div class="form-group">
				<label>Mã hệ đào tạo</label>
				<input type="text" name="mahdt" value="<?php if(isset($mahdt)){ echo $mahdt;} ?>" class="form-control" required requiredmsg="Vui lòng nhập mã hệ đào tạo!" placeholder="Mã hệ đòa tạo">				
			</div>
			<div class="form-group">
				<label>Tên hệ đào tạo</label>
				<input type="text" name="tenhdt" value="<?php if(isset($tenhdt)){ echo $tenhdt;} ?>" class="form-control" required requiredmsg="Vui lòng nhập tên hệ đào tạo!" placeholder="Tên hệ đào tạo">	
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa hệ">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?>
<?php ob_flush(); ?>