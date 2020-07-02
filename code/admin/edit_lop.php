<?php ob_start(); ?>
<?php include('includes/header.php'); ?>
<?php include('../connection.php'); ?>
<?php include('../inc/function.php'); ?>
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
        header('Location:list_lop.php');
        exit();
    }
    if(isset($_POST['submit'])){
        $mal=$_POST['mal'];
        $tenl=$_POST['tenl'];
        $siso=$_POST['siso'];
        $mak=$_POST['mak'];
        $makh=$_POST['makh'];
        $mahdt=$_POST['mahdt'];					
        $query_in="UPDATE lop SET MaL='$mal',TenL='$tenl',SiSo='$siso',MaK='$mak',MaKH='$makh',MaHDT='$mahdt' WHERE id='$id'";
        $results_in=mysqli_query($conn,$query_in);
        if(mysqli_affected_rows($conn)==1)
        {
            echo "<p style='color:green;'>Sửa thành công</p>";
        }
        else
        {
            echo "<p class='required'>Bạn chưa sửa gì, hoặc đã có mã lớp</p>";	
        }					
    }  
    $query_id="SELECT MaL,TenL,SiSo,MaK,MaKH,MaHDT FROM lop WHERE id='$id'";
    $results_id=mysqli_query($conn,$query_id);
    //Kiểm tra xem ID có tồn tại không
    if(mysqli_num_rows($results_id)==1)
    {
        list($mal,$tenl,$siso,$mak,$makh,$mahdt)=mysqli_fetch_array($results_id,MYSQLI_NUM);				
    }
    else
    {
        header('Location:list_lop.php');
        exit();
    }
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    	<form name="fredit_user" method="POST" action="#">
			<?php if(isset($message)){echo $message;}?>
			<h3>Sửa lớp</h3>
			<div class="form-group">
				<label>Mã lớp</label>
				<input type="text" name="mal" value="<?php if(isset($mal)){ echo $mal;} ?>" class="form-control" required requiredmsg="Vui lòng nhập mã lớp!" placeholder="Mã lớp">				
			</div>
			<div class="form-group">
				<label>Tên lớp</label>
				<input type="text" name="tenl" value="<?php if(isset($tenl)){ echo $tenl;} ?>" class="form-control" required requiredmsg="Vui lòng nhập tên lóp!" placeholder="Tên lớp">	
			</div>
            <div class="form-group">
				<label>Sĩ số</label>
				<input type="text" name="siso" value="<?php if(isset($siso)){ echo $siso;} ?>" class="form-control" required requiredmsg="Vui lòng nhập sĩ số!" placeholder="Sĩ số">	
			</div>
			<div class="form-group">
				<label style="display:block;">Mã Khoa</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectkhoa1('mak','form-control',$mak);?></div>
                <div class="" style="clear:both"></div>
			</div>
            <div class="form-group">
				<label style="display:block;">Mã khóa học</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectkhoahoc1('makh','form-control',$makh);?></div>
                <div class="" style="clear:both"></div>
			</div>	
            <div class="form-group">
				<label style="display:block;">Mã hệ đào tạo</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selecthedaotao1('mahdt','form-control',$mahdt);?></div>
                <div class="" style="clear:both"></div>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa lớp">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?>
<?php ob_flush(); ?>