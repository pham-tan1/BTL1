

    <div class="navbar pull-right dide">
        <ul class="nav pull-right">
            <li class="dropdown"><a href="javascript:;" class="fa fa-user" data-toggle="dropdown">&nbsp;Welcome,&nbsp;<?php if(isset($_SESSION['username'])) {echo $_SESSION['username'];} ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="xemthongtin.php"><i class="fa fa-fw fa-user"></i> Xem thông tin</a></li>
                    <li><a href="doipassm.php"><i class="fa fa-fw fa-cog"></i> Đổi mật khẩu</a></li>
                    <li class="divider"></li>
                    <li><a href="thoat.php"><i class="fa fa-fw fa-power-off"></i> Đăng xuất</a></li>
                </ul>
            </li>
        </ul>
    </div>
    