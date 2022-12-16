<?php
    include_once("./config.php");
    $connect = connect();
    session_start();

    // $_SESSION['assign_path'] = array();
    if(count($_SESSION['path']) != 0) {
        $_SESSION['assign_path'] = $_SESSION['path'];
    } else {
        $_SESSION['assign_path'] = array();
    }

    if(isset($_POST['change_path'])) {
        $cp = $_POST['change_path'];
        if($cp != 'NULL') {
            // array_push($_SESSION['assign_path'], $cp);
            // array_pop($_SESSION['assign_path']);
            if(!in_array($cp, $_SESSION['assign_path'])) {
                array_push($_SESSION['assign_path'], $cp);
            }
            else {
                $index = array_search($cp, $_SESSION['assign_path']);
                if($index != (count($_SESSION['assign_path']) - 1)) {
                    array_splice($_SESSION['assign_path'],  $index+1);
                }
            }
        }
        else {
            array_splice($_SESSION['assign_path'], 0);
        }
        
        $_SESSION['assign_folder'] = $cp;
        /* $t = 0;
        foreach ($_SESSION['assign_path'] as $key) {
            echo $t.' - '.$key.'<br>';
        }
        echo '<br>';
        echo $_SESSION['assign_folder']; */
        echo json_encode(array('folder' => $_SESSION['assign_folder'], 'path' => $_SESSION['assign_path']));
    }
    
    else if(isset($_POST['get_detail'])) {
        $id = $_POST['id'];
        $query = "SELECT * FROM file WHERE id = '$id'";
        $exec = mysqli_query($connect, $query);
        $num = mysqli_num_rows($exec);
        if ($num != 0) {
            while ($row = mysqli_fetch_assoc($exec)) {
                $output['file_name'] = $row['file_name'];
                $output['type'] = $row['type'];
                $output['size'] = $row['size'];
            }
            echo json_encode(array('data' => $output));
        }
    }

    else if(isset($_POST['username']) && isset($_POST['name']) && isset($_POST['parent'])) {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $parent = $_POST['parent'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date('y-m-d h:i:s');
        
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/source' . '/files/'.$username.'/';
        $dir = $dir.join('/', $_SESSION['assign_path']);
        mkdir($dir.'/'.$_POST['name'], 0777, true);

        if($parent == 'NULL') {
            $query = "INSERT INTO folder(username,name,date_create,modify) VALUE('" . $username . "','" . $name . "','" . $time . "','" . $time . "')";
        }
        else {
            $query = "INSERT INTO folder(username,name,parent,date_create,modify) VALUE('" . $username . "','" . $name . "','" . $parent . "','" . $time . "','" . $time . "')";
        }
        $exec = mysqli_query($connect, $query);
        if($exec) {
            $output = "Tạo thành công thư mục ".$name."!";
            echo json_encode(array('data' => $output));
        }
        else {
            $output = "Tạo không thành công thư mục ".$name;
            echo json_encode(array('data' => $output))."!";
        }
    }
?>