<?php include('includes/header.php'); ?>
<?php include('../connection.php'); ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Danh sách Sinh Viên</h3>
		<table class="table table-hover">
			<thead>	
				<tr>
					<th>ID</th>
					<th>Mã sinh viên</th>
					<th>Họ tên</th>
					<th>Điện thoại</th>
					<th>Email</th>
					<th>Địa chỉ</th>
					<th>Giới tính</th>
					<th>Ngày sinh</th>
					<th>Mã lớp</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
            </thead>
            <tbody>
				<?php	
					//đặt số bản ghi cần hiện thị
					$limit=12;
					//Xác định vị trí bắt đầu
					if(isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))
					{
						$start=$_GET['s'];
					} 	
					else
					{
						$start=0;
					}	
					if(isset($_GET['p']) && filter_var($_GET['p'],FILTER_VALIDATE_INT,array('min_range'=>1)))
					{
						$per_page=$_GET['p'];
					} 
					else
					{
						//Nếu p không có, thì sẽ truy vấn CSDL để tìm xem có bao nhiêu page
						$query_pg="SELECT COUNT(id) FROM sinhvien";
						$results_pg=mysqli_query($conn,$query_pg);
						list($record)=mysqli_fetch_array($results_pg,MYSQLI_NUM);					
						//Tìm số trang bằng cách chia số dữ liệu cho số limit	
						if($record > $limit)
						{
							$per_page=ceil($record/$limit);
						}
						else
						{
							$per_page=1;
						}
					}				
					$query="SELECT * FROM sinhvien ORDER BY id DESC LIMIT {$start},{$limit}";
					$results=mysqli_query($conn,$query);
					while($user=mysqli_fetch_array($results,MYSQLI_ASSOC))
					{
					?>
					<tr>
						<td><?php echo $user['id']; ?></td>
						<td><?php echo $user['MaSV']; ?></td>
						<td><?php echo $user['TenSV']; ?></td>
						<td><?php echo $user['SDT']; ?></td>
						<td><?php echo $user['Email']; ?></td>
						<td><?php echo $user['QueQuan']; ?></td>
						<td>
							<?php 
							if($user['GioiTinh']==1)
							{
								echo 'Nam';
							}	
							else
							{
								echo 'Nữ';
							}						
							?>
						</td>
						<td>
                            <?php
                            $ngaydang_v=explode('-',$user['NgaySinh']);
							echo $ngaydang_v[2].'-'.$ngaydang_v[1].'-'.$ngaydang_v[0]; 
                            ?>
                        </td>
						<td><?php echo $user['MaL']; ?></td>			
						<td align="center"><a href="edit_sinhvien.php?id=<?php echo $user['id']; ?>"><img width="16" src="../image/icon_edit.png"></a></td>
						<td align="center"><a href="delete_sinhvien.php?id=<?php echo $user['id'];?>&msv=<?php echo $user['MaSV']; ?>" onclick="return confirm('Bạn có thực sự muốn xóa không');"><img width="16" src="../image/icon_delete.png"></a></td>
					</tr>
					<?php		
					}

				?>
            </tbody>
        </table>
		<?php 
			echo "<ul class='pagination'>";
			if($per_page > 1)
			{
				$current_page=($start/$limit) + 1;
				//Nếu không phải là trang đầu thì hiện thị trang trước
				if($current_page !=1)
				{
					echo "<li><a href='list_sinhvien.php?s=".($start - $limit)."&p={$per_page}'>Back</a></li>";
				}
				//hiện thị những phần còn lại của trang
				for ($i=1; $i <= $per_page ; $i++) 
				{ 
					if($i != $current_page)
					{
						echo "<li><a href='list_sinhvien.php?s=".($limit *($i - 1))."&p={$per_page}'>{$i}</a></li>";
					}
					else
					{
						echo "<li class='active'><a>{$i}</a></li>";
					}
				}
				//Nếu không phải trang cuối thì hiện thị nút next
				if($current_page != $per_page)
				{
					echo "<li><a href='list_sinhvien.php?s=".($start + $limit)."&p={$per_page}'>Next</a></li>";	
				}
			}
			echo "</ul>";
		?>		
    </div>
</div>
<?php include('includes/footer.php'); ?>