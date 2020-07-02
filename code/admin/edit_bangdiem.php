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
        header('Location:list_bangdiem.php');
        exit();
    }
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
            $query_in="UPDATE bangdiem SET MaSV='$masv',MaMH='$mam',LanThi='$lanthi',Hocky='$hocky',Diem='$diem' WHERE id='$id'";
            $results_in=mysqli_query($conn,$query_in);
            if(mysqli_affected_rows($conn)==1)
            {
                echo "<p style='color:green;'>Sửa thành công</p>";
            }
            else
            {
                echo "<p class='required'>Bạn chưa sửa gì</p>";	
            }	
        }				
    }  
    $query_id="SELECT MaSV,MaMH,LanThi,HocKy,Diem FROM bangdiem WHERE id='$id'";
    $results_id=mysqli_query($conn,$query_id);
    //Kiểm tra xem ID có tồn tại không
    if(mysqli_num_rows($results_id)==1)
    {
        list($masv,$mam,$lanthi,$hocky,$diem)=mysqli_fetch_array($results_id,MYSQLI_NUM);				
    }
    else
    {
        header('Location:list_bangdiem.php');
        exit();
    }
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    	<form name="fredit_user" method="POST" action="#">
			<?php if(isset($message)){echo $message;}?>
			<h3>Sửa điểm</h3>
			<div class="form-group">
				<label>Mã sinh viên</label>
				<input type="text" name="masv" value="<?php if(isset($masv)){ echo $masv;} ?>" class="form-control" required requiredmsg="Vui lòng nhập mã sinh viên!" placeholder="Mã sinh viên">				
			</div>
            <div class="form-group">
				<label style="display:block;">Mã môn học</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectmon1('mam','form-control',$mam);?></div>
                <div class="" style="clear:both"></div>
			</div>
			<div class="form-group">
				<label>Lần thi</label>
				<input type="text" name="lanthi" value="<?php if(isset($lanthi)){ echo $lanthi;} ?>" class="form-control" required requiredmsg="Vui lòng nhập lần thi!" placeholder="Lần thi">				
			</div>
			<div class="form-group">
				<label>Học kỳ</label>
				<input type="text" name="hocky" value="<?php if(isset($hocky)){ echo $hocky;} ?>" class="form-control" required requiredmsg="Vui lòng nhập học kỳ!" placeholder="Học kỳ">	
			</div>
            <div class="form-group">
				<label>Điểm</label>
				<input type="text" name="diem" value="<?php if(isset($diem)){ echo $diem;} ?>" class="form-control" required requiredmsg="Vui lòng nhập điểm!" placeholder="Điểm">	
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa điểm">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?>
<?php ob_flush(); ?>