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
        header('Location:list_dkh.php');
        exit();
    }
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
        $query_in="UPDATE dangky SET MaMH='$mam',TenMH='{$dm_info['TenMH']}',siso='$siso',ngayhoc='$ngayhoc_in',ngayketthuc='$ngaykt_in',giangvien='$giangvien',diadiem='$diadiem',MaK='$mak',MaKH='$makh' WHERE id='$id'";
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
    $query_id="SELECT MaMH,siso,ngayhoc,ngayketthuc,giangvien,diadiem,MaK,MaKH FROM dangky WHERE id='$id'";
    $results_id=mysqli_query($conn,$query_id);
    //Kiểm tra xem ID có tồn tại không
    if(mysqli_num_rows($results_id)==1)
    {
        list($mam,$siso,$ngayhoc,$ngayketthuc,$giangvien,$diadiem,$mak,$makh)=mysqli_fetch_array($results_id,MYSQLI_NUM);				
    }
    else
    {
        header('Location:list_dkh.php');
        exit();
    }
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    	<form name="fredit_user" method="POST" action="#">
			<?php if(isset($message)){echo $message;}?>
			<h3>Sửa môn đăng ký</h3>
			<div class="form-group">
				<label style="display:block;">Mã môn</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectmon1('mam','form-control',$mam);?></div>
                <div class="" style="clear:both"></div>
			</div>
			<div class="form-group">
				<label>Ngày học</label>
				<?php 
					if(isset($ngayhoc))
					{
						$ngaydang_cu=explode('-',$ngayhoc);
						$ngaydang_cu_m=$ngaydang_cu[2].'-'.$ngaydang_cu[1].'-'.$ngaydang_cu[0];
					}
				?>
					<input class="form-control" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $ngaydang_cu_m; ?>" id="ngaydang_edit" name="ngayhoc"> 			
			</div>
			<div class="form-group">
				<label>Ngày kết thúc</label>
				<?php 
					if(isset($ngayketthuc))
					{
						$ngaydang_cu1=explode('-',$ngayketthuc);
						$ngaydang_cu_m1=$ngaydang_cu1[2].'-'.$ngaydang_cu1[1].'-'.$ngaydang_cu1[0];
					}
				?>
					<input class="form-control" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $ngaydang_cu_m1; ?>" id="ngaydang1_edit" name="ngayketthuc"> 
			</div>
            <div class="form-group">
				<label>Sĩ số</label>
				<input type="text" name="siso" value="<?php if(isset($siso)){ echo $siso;} ?>" class="form-control" required requiredmsg="Vui lòng nhập sĩ số!" placeholder="Sĩ số">	
			</div>
            <div class="form-group">
				<label>Địa điểm</label>
				<input type="text" name="diadiem" value="<?php if(isset($diadiem)){ echo $diadiem;} ?>" class="form-control" required requiredmsg="Vui lòng nhập địa điểm!" placeholder="Địa điểm">	
			</div>
            <div class="form-group">
				<label>Giảng viên</label>
				<input type="text" name="giangvien" value="<?php if(isset($giangvien)){ echo $giangvien;} ?>" class="form-control" required requiredmsg="Vui lòng nhập giảng viên!" placeholder="Tên giảng viên">	
			</div>
            <div class="form-group">
				<label style="display:block;">Mã khóa học</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectkhoahoc1('makh','form-control',$makh);?></div>
                <div class="" style="clear:both"></div>
			</div>	
            <div class="form-group">
				<label style="display:block;">Mã khoa</label>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4"><?php selectkhoa1('mak','form-control',$mak);?></div>
                <div class="" style="clear:both"></div>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa lớp">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?>
<?php ob_flush(); ?>