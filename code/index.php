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
                            $sql="SELECT * FROM baiviet ORDER BY id DESC";
                            $query_a=mysqli_query($conn,$sql);
                            while($dm_info=mysqli_fetch_array($query_a,MYSQLI_ASSOC)){
                        ?>
                                <p><a href="baiviet.php?id=<?php echo $dm_info['id']; ?>" style="text-decoration:none"><?php echo $dm_info['title']; ?></a></p>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('includes/footer.php'); ?>