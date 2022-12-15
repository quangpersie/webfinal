<?php
    include_once("./config.php");
    $connect = connect();
    session_start();
    

    // rename file
    if(isset($_POST['usernameFI']) && isset($_POST['new_nameFI']) && isset($_POST['old_nameFI']) && isset($_POST['idFI'])) {
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/source' . '/files/'.$_POST['usernameFI'].'/';
        if (count($_SESSION['path']) > 0) {
            $dir = $dir.join('/', $_SESSION['path']).'/';
        }
        $id = $_POST["idFI"];
        $new_name = $_POST['new_nameFI'];
        $old_name = $_POST['old_nameFI'];

        echo $dir. $new_name.'<br>';
        echo $dir. $old_name.'<br>';
        rename($dir.$old_name.'', $dir.$new_name.'');

        $q = "UPDATE file SET file_name = '$new_name' WHERE id = '$id'";
        if(mysqli_query($connect, $q)) {
            echo htmlspecialchars("Đổi tên tập tin thành công!");
        }
    }
    // rename folder
    else if (isset($_POST['usernameFO']) && isset($_POST['new_nameFO']) && isset($_POST['old_nameFO']) && isset($_POST['idFO'])) {
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/source' . '/files/'.$_POST['usernameFO'].'/';
        if (count($_SESSION['path']) > 0) {
            $dir = $dir.join('/', $_SESSION['path']).'/';
        }
        $id = $_POST["idFO"];
        $new_name = $_POST['new_nameFO'];
        $old_name = $_POST['old_nameFO'];

        echo $dir . $new_name.'<br>';
        echo $dir . $old_name.'<br>';
        rename($dir.$old_name.'', $dir.$new_name.'');


        $q = "UPDATE folder SET name = '$new_name' WHERE id = '$id'";
        if(mysqli_query($connect, $q)) {
            echo htmlspecialchars("Đổi tên thư mục thành công!");
        }
    }
?>