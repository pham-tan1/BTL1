<?php ob_start(); ?>
<?php include('includes/header.php'); ?>
<?php include('../connection.php');?>
<?php include('../inc/function.php');?>
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
        header('Location:list_baiviet.php');
        exit();
    }
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $noidung=$_POST['noidung'];
		$status=$_POST['status'];
        $ngaydang_ht=explode("-",$_POST['ngaydang']);
        $ngaydang_in=$ngaydang_ht[2].'-'.$ngaydang_ht[1].'-'.$ngaydang_ht[0];
        $giodang_in=$_POST['giodang'];
        $query_in="UPDATE baiviet SET title='$title',status='$status',noidung='$noidung',ngaydang='$ngaydang_in',giodang='$giodang_in' where id='$id'";
        $results_in=mysqli_query($conn,$query_in);
        if(mysqli_affected_rows($conn)==1)
        {
            echo "<p style='color:green;'>Sửa thành công</p>";
        }
        else
        {
            echo "<p class='required'>Bạn chưa sửa gì!</p>";	
        }
    }
        $query_id="SELECT title,ngaydang,giodang,noidung,status FROM baiviet WHERE id={$id}";
        $result_id=mysqli_query($conn,$query_id);
        //Kiểm tra xem ID có tồn tại không
        if(mysqli_num_rows($result_id)==1)
        {
            list($title,$ngaydang,$giodang,$noidung,$status)=mysqli_fetch_array($result_id,MYSQLI_NUM);
        }
        else
        {
            header('Location:list_baiviet.php');
            exit();
        }
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    	<form name="frmedit_ks" method="POST" action="#" enctype="multipart/form-data">
			<?php if(isset($message)){echo $message;}?>
			<h3>Sửa bài viết</h3>
			<div class="form-group">
				<label>Tiêu đề</label>
				<input type="text" name="title" value="<?php if(isset($title)){ echo $title;} ?>" class="form-control" required requiredmsg="Vui lòng nhập tiêu đề!" placeholder="Tiêu đề">				
			</div>	
			<div class="form-group">
				<label>Nội dung</label>
				<textarea id="noidung" name="noidung" style="Width:100%;height:100px;" value=""><?php if(isset($noidung)){ echo $noidung;} ?></textarea>
			</div>
            <div class="form-group">
				<label>Ngày đăng</label>
                <?php 
					if(isset($ngaydang))
					{
						$ngaydang_cu=explode('-',$ngaydang);
						$ngaydang_cu_m=$ngaydang_cu[2].'-'.$ngaydang_cu[1].'-'.$ngaydang_cu[0];
					}
				?>
					<input class="form-control" type="text" value="<?php echo $ngaydang_cu_m; ?>" id="ngaydang_edit" name="ngaydang"> 
			</div>
			<div class="form-group">
				<label>Giờ đăng</label>
				<?php 
					date_default_timezone_set('Asia/Ho_Chi_Minh');
					$today=date('g:i A');
				?>
				<input type="text" name="giodang" value="<?php if(isset($giodang)){ echo $giodang;} ?>" class="form-control">
			</div>
			<div class="form-group">
				<label style="display:block;">Trạng thái</label>
				<?php 
					if(isset($status)==1)
					{
					?>
					<label class="radio-inline"><input checked="checked" type="radio" name="status" value="1">Hiển thị</label>
					<label class="radio-inline"><input type="radio" name="status" value="0">Không hiển thị</label>
					<?php 
					}
					else
					{
					?>
					<label class="radio-inline">
						<input type="radio" name="status" value="1">Hiển thị
					</label>
					<label class="radio-inline">
						<input checked="checked" type="radio" name="status" value="0">Không hiển thị
					</label>
					<?php		
					}
				?>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa">
		</form>
	</div>
</div>
<?php include('includes/footer.php'); ?> 
<?php ob_flush(); ?>