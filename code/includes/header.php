<?php 
    session_start();
?>
<?php include('./connection.php'); ?>
<?php include('./inc/function.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
    <link href="./font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/btl.css">
    <link rel="stylesheet" href="./css/main_menu.css">
    <link rel="stylesheet" href="./css/content_top.css">
    <link rel="stylesheet" href="./css/ks.css">
    <link rel="stylesheet" href="./css/bottom.css">
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/BTL.js"></script>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/sb-style.css">
</head>
<body>
    <div id="main">
        <div id="menu_header">
            <div class="languages">
                <a href="#"><img src="./image/en.jpg" alt="English"></a>
                <a href="#"><img src="./image/vi.jpg" alt="Vietnamese"></a>
            </div>
            <?php 
                if(isset($_SESSION['username']) && ($_SESSION['quyen']==0)){
                    include('menu_login/dnmember.php');
                }
                elseif(isset($_SESSION['username']) && ($_SESSION['quyen']==1)){
                    header('location:admin/index.php');
                }
                else{
                    include('menu_login/chuadangnhap.php');
                }
            ?>
            <div class="search">
                <form name="frmsearch" action="search.php" method="GET">
                    <img src="./image/search.jpg" alt="Search">
                    <input type="text" placeholder="Tìm kiếm " id="search_text" name="ten">
                    <button type="submit" id="search_btn" name="submit">Tìm</button>
                </form>
            </div>
            <a href="index.php"><i class="fa fa-home tranghome"></i></a>
        </div>
