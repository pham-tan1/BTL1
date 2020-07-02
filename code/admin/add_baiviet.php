<?php include('includes/header.php'); ?>
<?php include('../connection.php');?>
<?php include('../inc/function.php'); ?>
<script src="../js/formlogin.js"></script>
<style>
.required{color:red;}
</style>
<?php
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $noidung=$_POST['noidung'];
		$status=$_POST['status'];
        $ngaydang_ht=explode("-",$_POST['ngaydang']);
        $ngaydang_in=$ngaydang_ht[2].'-'.$ngaydang_ht[1].'-'.$ngaydang_ht[0];
        $giodang_in=$_POST['giodang'];
        $query_in="INSERT INTO baiviet(title,status,noidung,ngaydang,giodang)
        VALUES('$title','$status','$noidung','$ngaydang_in','$giodang_in')";
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
    	<form name="frmadd_ks" method="POST" action="#" enctype="multipart/form-data">
			<?php if(isset($message)){echo $message;}?>
			<h3>Thêm bài viết</h3>
			<div class="form-group">
				<label>Tiêu đề</label>
				<input type="text" name="title" value="<?php if(isset($_POST['title'])){ echo $_POST['title'];} ?>" class="form-control" required requiredmsg="Vui lòng nhập tiêu đề!" placeholder="Tiêu đề">				
			</div>	
			<div class="form-group">
				<label>Nội dung</label>
				<textarea id="noidung" name="noidung" style="Width:100%;height:100px;" value=""><?php if(isset($_POST['noidung'])){ echo $_POST['noidung'];} ?></textarea>
			</div>
            <div class="form-group">
				<label>Ngày đăng</label>
				<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> 
					<input class="form-control" readonly="true" type="text" name="ngaydang"> 
					<span class="input-group-addon">
						<i class="fa fa-calendar-alt"></i>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label>Giờ đăng</label>
				<?php 
					date_default_timezone_set('Asia/Ho_Chi_Minh');
					$today=date('g:i A');
				?>
				<input type="text" name="giodang" value="<?php echo $today; ?>" class="form-control">
			</div>
			<div class="form-group">
				<label style="display:block;">Trạng thái</label>
				<label class="radio-inline"><input checked="checked" type="radio" name="status" value="1">Hiển thị</label>
				<label class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?> 