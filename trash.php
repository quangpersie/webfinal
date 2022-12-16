<?php
session_start();
include_once('./config.php');
$connect = connect();
$login = false;
$username = "";
$email;
$name = "";
$role = $_SESSION['role'];
if ($role == 0) {
  header('Location: indexAdmin.php');
  exit();
}
if (!isset($_SESSION['user'])) {
  $_SESSION['url'] = $_SERVER['REQUEST_URI'];
  header('Location: login.php');
  exit();
}
$is_use = 0;
$max = 0;
$login = true;
$email = $_SESSION['user'];
$sql = "SELECT * FROM users WHERE username='" . $email . "' LIMIT 1";
$query = mysqli_query($connect, $sql);
$num_row = mysqli_num_rows($query);
if ($num_row > 0) {
  $data = mysqli_fetch_assoc($query);
  $name = $data['name'];
  $is_use = $data['use_size'];
  $max = $data['size_page'];
}
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
  unset($_SESSION['url']);
  unset($_SESSION['user']);
  header('Location: login.php');
  exit();
}
$sql_select = "SELECT * FROM file WHERE username='" . $email . "' and deleted=1";
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<body>
  <header>
    <h>Thùng Rác</h>
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
                <li><a class="dropdown-item" href="index.php?dangxuat=1">Đăng xuất</a></li>
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
          <img src="css/images/folder3.png" width="15%" height="15%">
          <button class="btn btn-secondary dropdown-toggle" id="dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Thư mục của tôi
          </button>
          <ul class="dropdown-menu" id="dropdownUL">
            <li><a class="dropdown-item" href="index.php">Thư mục gốc</a></li>
            <li><a class="dropdown-item" href="#">Quản lý thư mục</a></li>
          </ul>
        </div>

        <div class="priority">
          <img src="css/images/priority5.png" width="15%" height="15%">
          <a class="btn" id="btnPriority" href="priority.php">Quan trọng</a>
          <!-- <button type="button" class="btn btn-light" id = "btnShare">Đã chia sẻ</button> -->
        </div>

        <div class="dropdown">
          <img src="./CSS/images/share7.png" width="15%" height="15%">
          <button class="btn btn-secondary dropdown-toggle" id="dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Chia sẻ
          </button>
          <ul class="dropdown-menu" id="dropdownUL">
            <li><a class="dropdown-item" href="share.php">Đã chia sẻ</a></li>
            <li><a class="dropdown-item" href="share_with_me.php">Chia sẻ với tôi</a></li>

          </ul>
        </div>
        <div class="recent">
          <img src="css/images/recent1.png" width="15%" height="15%">
          <a class="btn" id="btnRecent" href="recent.php">Gần đây</a>
          <!-- <button type="button" class="btn btn-light" id = "btnShare">Đã chia sẻ</button> -->
        </div>
        <div class="trash">
          <img src="css/images/trash1.png" width="15%" height="15%">
          <a class="btn" id="btnTrash" href="trash.php">Thùng rác</a>
          <!-- <button type="button" class="btn btn-light" id = "btnShare">Đã chia sẻ</button> -->
        </div>
        <div class="share">
          <img src="./CSS/images/priority2.png" width="15%" height="15%">
          <a class="btn" id="btnTrash" href="upgrade.php">Dung lượng</a>
          <div>
            <?php
            $now_us = ($is_use / $max) * 100;
            ?>
            <progress id="file" value="<?php echo $now_us ?>" max="100"></progress>
          </div>
        </div>
        <div class="priority">

          <a class="btn" id="btnPriority" href="priority.php"></a>
          <!-- <button type="button" class="btn btn-light" id = "btnShare">Đã chia sẻ</button> -->
        </div>

      </nav>

      <article id="art2">
        <div class="row">
          <?php
          if (!isset($_GET['search'])) {
            $select_folder = "SELECT * FROM folder WHERE username='" . $email . "' and deleted='1'";
            $exec_folder = mysqli_query($connect, $select_folder);
            $fnum = mysqli_num_rows($exec_folder);
            if ($fnum != 0) {
              while ($row = mysqli_fetch_array($exec_folder)) {
          ?>
                <div class="col-lg-3 col-md-3">
                  <div class="card" style="width: 85%; background-color: rgb(247, 251, 252);border: 0px;">
                    <img src="./CSS/images/folder.webp" class="card-img-top">
                    <div class="card-body">
                      <p class="card-text" id="folder_name">
                        <?php echo $row['name'] ?>
                      </p>
                      <a href="#" class="btn btn-primary" style="background-color:  rgb(118, 159, 205); border:none;" onclick="restoreFolder(<?php echo $row['id'] ?>)">Khôi phục</a>
                    <a href="#" class="btn btn-primary" style="background-color:  rgb(235, 29, 54); border:none;" onclick="deleteFolder(<?php echo $row['id'] ?>)">Xóa</a>
                    </div>
                  </div>
                </div>
          <?php
              }
            }
          }
          ?>

          <?php
          if ($num == 0 && $fnum == 0) {
            echo "<h2 style=\"text-align:center\">Thùng rác trống!</h2>";
          }
          else {
            while ($row = mysqli_fetch_array($run)) {
          ?>
              <div class="col-lg-3 col-md-4">
                <div class="card" style="width: 85%; background-color: rgb(247, 251, 252);border: 0px; z-index: 2">
                  <img src="./<?php echo $row['image'] ?>" class="card-img-top" width="256px" height="256px">
                  <div class="card-body">
                    <p class="card-text"><?php
                                          if (strlen($row['file_name']) > 20) {
                                            echo substr($row['file_name'], 0, 19) . '...';
                                          } else {
                                            echo $row['file_name'];
                                          }
                                          ?></p>
                    <a href="#" class="btn btn-primary" style="background-color:  rgb(118, 159, 205); border:none;" onclick="restore(<?php echo $row['id'] ?>)">Khôi phục</a>
                    <a href="#" class="btn btn-primary" style="background-color:  rgb(235, 29, 54); border:none;" onclick="delete_file(<?php echo $row['id'] ?>)">Xóa</a>
                  </div>
                </div>
              </div>
          <?php
            }
          }
          ?>



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

    function delete_file(id) {
      var del = confirm("Bạn có chắc chắn muốn xóa file này vĩnh viễn không ?");
      var form_data = new FormData();
      form_data.append("id", id);
      if (del == true) {
        console.log(id);
        $.ajax({
          url: "deleted.php?xoa=1",
          type: "POST",
          dataType: 'script',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          success: function(dat2) {
            alert(dat2);
            location.reload();
          }
        });
      }
      return del;
    }

    function restore(id) {
      var form_data = new FormData();
      form_data.append("id", id);
      console.log(id);
      $.ajax({
        url: "deleted.php?khoiphuc=1",
        type: "POST",
        dataType: 'script',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success: function(dat2) {
          alert(dat2);
          location.reload();
        }
      });
    }

    function restoreFolder(id) {
      var form_data = new FormData();
      form_data.append("id", id);
      form_data.append("restore_folder", 'ok');
      console.log(id);
      $.ajax({
        url: "deleted.php",
        type: "POST",
        dataType: 'script',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success: function(dat2) {
          alert(dat2);
          location.reload();
        }
      });
    }

    function deleteFolder(id) {
      var del = confirm("Bạn có chắc chắn muốn xóa thư mục này vĩnh viễn không ?");
      var form_data = new FormData();
      form_data.append("id", id);
      form_data.append("delete_folder_forever", 'ok');
      if (del == true) {
        console.log(id);
        $.ajax({
          url: "deleted.php",
          type: "POST",
          dataType: 'script',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          success: function(dat2) {
            alert(dat2);
            location.reload(); 
          }
        });
      }
      return del;
    }
  </script>
</body>

</html>