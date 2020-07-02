<?php include('includes/header.php'); ?>
<?php include('../inc/function.php'); ?>
<script src="../js/formlogin.js"></script>
<style>
.required{color:red;}
</style>
<?php 
	include('../connection.php');
	if(isset($_POST['submit'])){
        $mam=$_POST['mam'];
        $siso=$_POST['siso'];
        $makh=$_POST['makh'];
        $mak=$_POST['mak'];
        $diadiem=$_POST['diadiem'];
        $giangvien=$_POST['giangvien'];
        $ngayhoc_ht=explode("-",$_POST['ngayhoc']);
        $ngayhoc_in=$ngayhoc_ht[2].'-'.$ngayhoc_ht[1].'-'.$ngayhoc_ht[0];
        $ngaykt_ht=explode("-",$_POST['ngayketthuc']);
        $ngaykt_in=$ngaykt_ht[2].'-'.$ngaykt_ht[1].'-'.$ngaykt_ht[0];
        $query="SELECT TenMH FROM monhoc WHERE MaMH='$mam'";
        $results=mysqli_query($conn,$query);
        $dm_info=mysqli_fetch_array($results,MYSQLI_ASSOC);			
        $query_in="INSERT INTO dangky(MaMH,TenMH,siso,ngayhoc,MaKH,MaK,ngayketthuc,diadiem,giangvien)
        VALUES('$mam','{$dm_info['TenMH']}','$siso','$ngayhoc_in','$makh','$mak','$ngaykt_in','$diadiem','$giangvien')";
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
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    	<form name="frmadd_user" method="POST" action="#">
			<?php if(isset($message)){echo $message;}?>
			<h3>Thêm lớp đăng ký học</h3>
            <div class="form-group">
				<label style="display:block;">Mã môn</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectmon('mam','form-control');?></div>
                <div class="" style="clear:both"></div>
			</div>
			<div class="form-group">
				<label>Ngày học</label>
				<div id="datepicke" class="input-group date" data-date-format="dd-mm-yyyy"> 
					<input class="form-control" readonly="true" type="text" name="ngayhoc"> 
					<span class="input-group-addon">
						<i class="fa fa-calendar-alt"></i>
					</span>
				</div>				
			</div>
			<div class="form-group">
				<label>Ngày kết thúc</label>
				<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> 
					<input class="form-control" readonly="true" type="text" name="ngayketthuc"> 
					<span class="input-group-addon">
						<i class="fa fa-calendar-alt"></i>
					</span>
				</div>	
			</div>
            <div class="form-group">
				<label>Sĩ số</label>
				<input type="text" name="siso" value="<?php if(isset($_POST['siso'])){ echo $_POST['siso'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập sĩ số!" placeholder="Sĩ số">	
			</div>
            <div class="form-group">
				<label>Địa điểm</label>
				<input type="text" name="diadiem" value="<?php if(isset($_POST['diadiem'])){ echo $_POST['diadiem'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập địa điểm!" placeholder="Địa điểm">	
			</div>
            <div class="form-group">
				<label>Giảng viên</label>
				<input type="text" name="giangvien" value="<?php if(isset($_POST['giangvien'])){ echo $_POST['giangvien'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập giảng viên!" placeholder="Tên giảng viên">	
			</div>
            <div class="form-group">
				<label style="display:block;">Mã khóa học</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectkhoahoc('makh','form-control');?></div>
                <div class="" style="clear:both"></div>
			</div>	
            <div class="form-group">
				<label style="display:block;">Mã khoa</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectkhoa('mak','form-control');?></div>
                <div class="" style="clear:both"></div>
			</div>	
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?> 