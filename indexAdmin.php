<?php
session_start();
include_once('./config.php');
$connect = connect();
$login = false;
$username = "";
$email;
$name = "";
if (!isset($_SESSION['user'])) {
    $_SESSION['url'] = $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    exit();
}
$login = true;
$email = $_SESSION['user'];
$sql = "SELECT * FROM users WHERE username='" . $email . "' LIMIT 1";
$query = mysqli_query($connect, $sql);
$num_row = mysqli_num_rows($query);
if ($num_row > 0) {
    $data = mysqli_fetch_assoc($query);
    $name = $data['name'];
}
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['user']);
    header('Location: login.php');
    exit();
}
$sql_select = "SELECT * FROM file WHERE username='" . $email . "' and deleted='0'";
$run = mysqli_query($connect, $sql_select);
$num = mysqli_num_rows($run);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleAdmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <header>
        <h>Admin</h>
    </header>
    <div class="container-">
        <nav class="navbar navbar-expand-lg" id="navbar1">
            <div class="container-fluid">
                <img src="./CSS/images/logo.jpg" height="50px" width="50px" style="border-radius: 50px;">
                <a class="navbar-brand" href="index.php" style="padding-left: 50px;color: rgb(66, 72, 116);">Trang Chủ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex" role="search" style="width: 60%; padding-left:10%;">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Tìm</button>
                    </form>
                    <ul>
                        <li class="nav-item dropdown" id="login">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                if ($name != "") {
                                    echo $name;
                                } else {
                                    echo "User";
                                }
                                ?>
                            </a>
                            <ul class="dropdown-menu" id="dropdownLogin">
                                <li><a class="dropdown-item" href="./editInfor.php">Hồ sơ của tôi</a></li>
                                <li><a class="dropdown-item" href="./changePassword.php">Đổi mật khẩu</a></li>

                                <li><a class="dropdown-item" href="indexAdmin.php?dangxuat=1">Đăng xuất</a></li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <section>
            <nav id="navbar2">
                <div class="dropdown">
                    <img src="./CSS/images/user.png" width="15%" height="15%">
                    <button class="btn btn-secondary dropdown-toggle" id="dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Quản lý người dùng
                    </button>
                    <ul class="dropdown-menu" id="dropdownUL">
                        <li><a class="dropdown-item" href="addUser.php">Thêm người dùng</a></li>
                        <li><a class="dropdown-item" href="listOfUser.php">Danh sách người dùng</a></li>
                    </ul>
                </div>

                <div class="priority">
                    <img src="./CSS/images/priority5.png" width="15%" height="15%">
                    <a class="btn" id="btnPriority" href="priorityUser.php">Ưu tiên</a>
                </div>
                <div class="share">
                    <img src="./CSS/images/share7.png" width="15%" height="15%">
                    <a class="btn" id="btnShare" href="shareUser.php">Đã chia sẻ</a>
                </div>
                <div class="recent">
                    <img src="./CSS/images/recent1.png" width="15%" height="15%">
                    <a class="btn" id="btnRecent" href="recentUser.php">Gần đây</a>
                </div>
                
                <div class="trash">
                    <img src="./CSS/images/trash1.png" width="15%" height="15%">
                    <a class="btn" id="btnTrash" href="trashUser.php">Thùng rác</a>
                </div>
                <div class="trash">
                    <a class="btn" id="btnTrash" href="#"></a>
                </div>
                <div class="trash">
                    <a class="btn" id="btnTrash" href="#"></a>
                </div>
            </nav>

            <article id="art2">
                <div class="row">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thư mục</li>
                        </ol>
                    </nav>
                    <div class="col-lg-3 col-md-3">
                        <div class="card" style="width: 85%; background-color: rgb(247, 251, 252);border: 0px;">
                            <img src="./CSS/images/folder.png" class="card-img-top">
                            <div class="card-body">
                                <p class="card-text">Tài khoản</p>
                                <div class="dropdown" id="dropdownThuMuc" style=" background-color: rgb(247, 251, 252);color: rgb(0, 74, 124);font-family: 'Times New Roman', Times, serif;">
                                    <button id="dropDownOfFile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="./CSS/images/3dot.png" width="15%" height="15%"> </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Tải về</a></li>
                                        <li><a class="dropdown-item" href="#">Chỉnh sửa thông tin</a></li>
                                        <li><a class="dropdown-item" href="#">Xem chi tiết </a></li>
                                        <li><a class="dropdown-item" href="#">Xóa</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="card" style="width: 85%; background-color: rgb(247, 251, 252);border: 0px;">
                            <img src="./CSS/images/folder.png" class="card-img-top">
                            <div class="card-body">
                                <p class="card-text">Tài khoản</p>
                                <div class="dropdown" id="dropdownThuMuc" style=" background-color: rgb(247, 251, 252);color: rgb(0, 74, 124);font-family: 'Times New Roman', Times, serif;">
                                    <button id="dropDownOfFile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="./CSS/images/3dot.png" width="15%" height="15%"> </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Tải về</a></li>
                                        <li><a class="dropdown-item" href="#">Chỉnh sửa thông tin</a></li>
                                        <li><a class="dropdown-item" href="#">Xem chi tiết </a></li>
                                        <li><a class="dropdown-item" href="#">Xóa</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="card" style="width: 85%; background-color: rgb(247, 251, 252);border: 0px;">
                            <img src="./CSS/images/folder.png" class="card-img-top">
                            <div class="card-body">
                                <p class="card-text">Tài khoản</p>
                                <div class="dropdown" id="dropdownThuMuc" style=" background-color: rgb(247, 251, 252);color: rgb(0, 74, 124);font-family: 'Times New Roman', Times, serif;">
                                    <button id="dropDownOfFile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="./CSS/images/3dot.png" width="15%" height="15%"> </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Tải về</a></li>
                                        <li><a class="dropdown-item" href="#">Chỉnh sửa thông tin</a></li>
                                        <li><a class="dropdown-item" href="#">Xem chi tiết </a></li>
                                        <li><a class="dropdown-item" href="#">Xóa</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="card" style="width: 85%; background-color: rgb(247, 251, 252);border: 0px;">
                            <img src="./CSS/images/folder.png" class="card-img-top">
                            <div class="card-body">
                                <p class="card-text">Tài khoản</p>
                                <div class="dropdown" id="dropdownThuMuc" style=" background-color: rgb(247, 251, 252);color: rgb(0, 74, 124);font-family: 'Times New Roman', Times, serif;">
                                    <button id="dropDownOfFile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="./CSS/images/3dot.png" width="15%" height="15%"> </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Tải về</a></li>
                                        <li><a class="dropdown-item" href="#">Chỉnh sửa thông tin</a></li>
                                        <li><a class="dropdown-item" href="#">Xem chi tiết </a></li>
                                        <li><a class="dropdown-item" href="#">Xóa</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </div>
    <footer>
        <p>Footer</p>
    </footer>
    <script>
        let popup = document.getElementById("popup");

        function openPopup() {
            popup.classList.add("open-popup");
        }

        function closePopup() {
            popup.classList.remove("open-popup");
        }
    </script>
</body>

</html>