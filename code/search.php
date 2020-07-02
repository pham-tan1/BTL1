<?php include('includes/header.php'); ?>
    <div class="container-fluid" style="margin-top:20px;">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="left">
                <?php include('includes/box_left.php'); ?>
            </div>	
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <div class="box_center">
                    <div class="box_center_top">
                        <div class="box_center_top_l"><p>Thông báo</p></div>
                        <div class="box_center_top_r"></div>
                        <div class="clr"></div>
                    </div>
                    <div class="container-fluid" style="padding-top:20px;">
            <?php
            if(isset($_REQUEST['submit']))
            {   
                $search=$_GET['ten'];
                if(empty($search)){
                    echo 'Không có kết quả';
                }
                else{
                //đặt số bản ghi cần hiện thị
                $limit=10;
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
                    $query_pg="SELECT COUNT(id) FROM baiviet WHERE title like '%$search%'";
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
                }   $flag=true;
                    $query="SELECT * FROM baiviet WHERE title like '%$search%' ORDER BY id DESC LIMIT {$start},{$limit}";
                    $results=mysqli_query($conn,$query);
                    while($dm_info=mysqli_fetch_array($results,MYSQLI_ASSOC))
                    {	$flag=false;		
                ?>
                    <p><a href="baiviet.php?id=<?php echo $dm_info['id']; ?>" style="text-decoration:none"><?php echo $dm_info['title']; ?></a></p>
                <?php }
                    if($flag==true){echo 'Không có kết quả';} ?>
                <?php 
                    echo "<ul class='pagination'>";
                    if($per_page > 1)
                    {
                        $current_page=($start/$limit) + 1;
                        //Nếu không phải là trang đầu thì hiện thị trang trước
                        if($current_page !=1)
                        {
                            echo "<li><a href='search.php?s=".($start - $limit)."&p={$per_page}&ten={$search}&submit='>Back</a></li>";
                        }
                        //hiện thị những phần còn lại của trang
                        for ($i=1; $i <= $per_page ; $i++) 
                        { 
                            if($i != $current_page)
                            {
                                echo "<li><a href='search.php?s=".($limit *($i - 1))."&p={$per_page}&ten={$search}&submit='>{$i}</a></li>";
                            }
                            else
                            {
                                echo "<li class='active'><a>{$i}</a></li>";
                            }
                        }
                        //Nếu không phải trang cuối thì hiện thị nút next
                        if($current_page != $per_page)
                        {
                            echo "<li><a href='search.php?s=".($start + $limit)."&p={$per_page}&ten={$search}&submit='>Next</a></li>";	
                        }
                    }
                    echo "</ul>";
                }
            }?>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>