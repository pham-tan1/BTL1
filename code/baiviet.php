<?php include('includes/header.php'); ?>
    <div class="container-fluid" style="margin-top:20px;">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="left">
                <?php include('includes/box_left.php'); ?>
            </div>	
            <?php 
                if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1))){
                    $id=$_GET['id'];
                    $sql="SELECT * FROM baiviet WHERE id='$id'";
                    $query_a=mysqli_query($conn,$sql);
                    $dm_info=mysqli_fetch_assoc($query_a);
                    $view_add=$dm_info['view'] + 1;
                    $query="UPDATE baiviet SET view={$view_add} WHERE id={$id}";
                    $results=mysqli_query($conn,$query);
                    $sql3="SELECT * FROM baiviet WHERE id={$id}";
                    $query_a3=mysqli_query($conn,$sql3);
                    $dm_info3=mysqli_fetch_assoc($query_a3);
            ?>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <div class="box_center">
                    <div class="box_center_top">
                        <div class="box_center_top_l"><p>Thông báo</p></div>
                        <div class="box_center_top_r"></div>
                        <div class="clr"></div>
                    </div>
                    <ul class="breadcrumb" style="margin-bottom:0px">
                        <li><a href="index.php" title="Trang chủ"><i class="fa fa-home"></i></a></li>
                        <li><a style="text-decoration:none" href="index.php" title="Thông báo">Thông báo</a></li>
                        <li><small><a style="text-decoration:none" href="baiviet.php?id=<?php echo $id; ?>" title="<?php echo $dm_info['title']; ?>"><?php echo $dm_info['title']; ?></a></small></li>
                    </ul>
                    <div class="container-fluid" style="">
                        <h3><?php echo $dm_info['title']; ?></h3>
                        <div id="time" style="border-bottom:1px solid;margin-bottom:5px;padding-bottom:3px">
                            <?php 
                                $ng_dang=explode('-',$dm_info['ngaydang']);
                                $ngaydang_ct=$ng_dang[2].'-'.$ng_dang[1].'-'.$ng_dang[0];
                            ?>
                            Ngày đăng:&nbsp;<?php echo $ngaydang_ct; ?> | <?php echo $dm_info['giodang']; ?> | <?php echo $dm_info3['view']; ?> lượt xem
                        </div>
                        <div class="p" style="margin-top:10px">
                        <?php echo $dm_info['noidung']; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }else{
                header('Location:index.php');
            }
        ?>
        </div>
    </div>
<?php include('includes/footer.php'); ?>