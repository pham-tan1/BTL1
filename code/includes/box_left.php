
<div class="box1">
    <div class="box_top">
        <p>Danh mục chính</p>		
    </div>
    <div class="box_main">
        <div id="show1">
            <?php if(isset($_SESSION['msv']) && $_SESSION['msv']!=0){ ?>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo_dm"><i class="fa fa-fw fa-laptop"></i> Đăng ký học<i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo_dm" class="collapse">
                                <li>
                                    <a href="dangkyhoc.php"><i class="fa fa-fw fa-plus-circle"></i> Sinh viên đăng ký học</a>
                                </li>
                                <li>
                                    <a href="ketquadangky.php"><i class="fa fa-fw fa-list-ul"></i> Kết quả đăng ký học</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="tracuudiem.php" ><i class="fa fa-fw fa-graduation-cap"></i>Tra cứu điểm học tập</a>
                        </li>
                        <li>
                            <a href="doipassm.php"><i class="fa fa-fw fa-cog"></i>Đổi mật khẩu</a>
                        </li>	                   		
                    </ul>
                </div>
            <?php } else{ ?>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="index.php" ><i class="fa fa-fw fa-graduation-cap"></i>Thông báo</a>
                        </li>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
</div>