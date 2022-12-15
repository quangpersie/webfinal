<?php
    include_once("./config.php");
    $connect = connect();
    session_start();
    $_SESSION['assign_path'] = array();
    if(isset($_POST['change_path'])) {
        $_SESSION['assign_folder'] = $_POST['change_path'];
        array_push($_SESSION['assign_path'], $_POST['change_path']);
        foreach ($_SESSION['assign_path'] as $key) {
            echo $key;
            echo '<br>';
        }
        echo '<br>';
        echo $_SESSION['assign_folder'];
    }

    else if(isset($_POST['username']) && isset($_POST['name']) && isset($_POST['parent'])) {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $parent = $_POST['parent'];
        $zero = 0;
        $time = date('y-m-d h:i:s');

        if($parent == 'NULL') {
            $query = "INSERT INTO folder(username,name,date_create,modify,deleted,share) VALUE('" . $username . "','" . $name . "','" . $time . "','" . $time . "','" . $zero . "','" . $zero . "')";
        }
        else {
            $query = "INSERT INTO folder(username,name,parent,date_create,modify,deleted,share) VALUE('" . $username . "','" . $name . "','" . $parent . "','" . $time . "','" . $time . "','" . $zero . "','" . $zero . "')";
        }
        $exec = mysqli_query($connect, $query);
        if($exec) {
            echo "Successful to create folder ".$name;
        }
        else {
            echo "Failed to create folder ".$name;
        }
    }
?>