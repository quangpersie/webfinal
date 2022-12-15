<?php
    include_once("./config.php");
    $connect=connect();
    session_start();
    $email=$_SESSION['user'];
    $folder_name;
    function delFolder($dir) {
        $files = array_diff(scandir($dir), array('.','..'));
         foreach ($files as $file) {
           (is_dir("$dir/$file")) ? delFolder("$dir/$file") : unlink("$dir/$file");
         }
         return rmdir($dir);
       }

    if($_SESSION['cur_folder'] == 'NULL') {
        $folder_name = $email;
    } else {
        $folder_name = $_SESSION['cur_folder'];
    }
    $dir="files/".$email.'/';
    $dir_absolute = $_SERVER['DOCUMENT_ROOT'] . '/source' . '/files/'.$email.'/';
    if(count($_SESSION['path']) > 0) {
        $dir = $dir.join('/', $_SESSION['path']).'/';
        $dir_absolute = $dir_absolute.join('/', $_SESSION['path']).'/';
    }

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $t = date('y-m-d h:i:s');

    if(isset($_POST['del_folder_to_trash'])) {
        $id = $_POST['id'];
        $sql = "UPDATE folder SET deleted='1', modify='$t' WHERE id='$id'";
        $query = mysqli_query($connect, $sql);
        if ($query) {
            echo 'Xóa thành công';
        } else {
            echo 'Xảy ra lỗi.Vui lòng thử lại';
        }
    }
    else if(isset($_POST['restore_folder'])) {
        $id = $_POST['id'];
        $sql = "UPDATE folder SET deleted='0',modify='$t' WHERE id='$id'";
        $query = mysqli_query($connect, $sql);
        if ($query) {
            echo 'Khôi phục thành công';
        } else {
            echo 'Xảy ra lỗi.Vui lòng thử lại';
        }
    }
    else if(isset($_POST['delete_folder_forever'])) {
        $id_folder = $_POST['id'];
        // get folder name
        $del4ever_folder = '';
        $sql = "SELECT * FROM folder WHERE id='$id_folder' LIMIT 1";
        $r=mysqli_query($connect,$sql);
        if($r){
            if($num=mysqli_num_rows($r)>0){
                $data=mysqli_fetch_assoc($r);
                $del4ever_folder=$data['name'];
            }
        }
        echo 'del4ever_folder = ' . $del4ever_folder.'<br>';
        echo 'path = ' . $dir_absolute . $del4ever_folder.'<br>';
        // get usable size
        $use_size=0;
        $sql_us="SELECT * FROM users WHERE username='$email'";
        $run_qr=mysqli_query($connect,$sql_us);
        if($run_qr){
            $d=mysqli_fetch_assoc($run_qr);
            $use_size=$d['use_size'];
        }

        // remove all file in folder and update the usable size in db
        $qr = "SELECT * FROM file WHERE folder = '$del4ever_folder'";
        $rs = mysqli_query($connect,$qr);
        if(mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_assoc($rs)) {
                $id_delete = $row['id'];
                $file_size = $row['size'];
                echo 'id_delete = '.$id_delete.'<br>';
                echo 'file_size = '.$file_size.'<br>';
                unlink($dir_absolute.$del4ever_folder.'/'.$row['file_name']);
                
                $sql_dele="DELETE FROM file WHERE id='$id_delete'";
                $query_dele=mysqli_query($connect,$sql_dele);
                if($query_dele) {
                    $use_size=$use_size-$file_size;
                }
            }
        }

        // remove local & delete folder in db
        $id_folder = $_POST['id'];
        $sql="DELETE FROM folder WHERE id='$id_folder'";
        $exec=mysqli_query($connect,$sql);
        // rmdir($dir_absolute.$del4ever_folder);
        delFolder($dir_absolute.$del4ever_folder);

        echo 'use_size = '.$use_size.'<br>';
        $update="UPDATE users SET use_size='$use_size' WHERE username='$folder_name'";
        if(mysqli_query($connect,$update)) {
            echo 'Xóa thành công'.'<br>';
        } else {
            echo 'Đã xảy ra sự cố trong quá trình xóa. Vui lòng thử lại'.'<br>';
        }
    }
    else if(isset($_GET['xoa']) && $_GET['xoa'] == 1){
        $id_delete=$_POST['id'];
        $file_name='';
        $file_size=0;
        $use_size=0;
        $sql_us="SELECT * FROM users WHERE username='$folder_name'";
        $run_qr=mysqli_query($connect,$sql_us);
        if($run_qr){
            $d=mysqli_fetch_assoc($run_qr);
            $use_size=$d['use_size'];
        }
        $sql_sele="SELECT * FROM file WHERE id='$id_delete' LIMIT 1";
        $r=mysqli_query($connect,$sql_sele);
        if($r){
            if($num=mysqli_num_rows($r)>0){
                $data=mysqli_fetch_assoc($r);
                $file_name=$data['file_name'];
                $file_size=$data['size'];
            }
        }
        unlink($dir.$file_name);
        $sql_dele="DELETE FROM file WHERE id='$id_delete'";
        $query_dele=mysqli_query($connect,$sql_dele);
        if($query_dele){
            $new_size=$use_size-$file_size;
            echo $new_size;
            $update="UPDATE users SET use_size='$new_size' WHERE username='$folder_name'";
            $res=mysqli_query($connect,$update);
            if($res){
                echo 'Xóa thành công';
            }
        }
        else{
            echo 'Đã xảy ra sự cố trong quá trình xóa. Vui lòng thử lại';
        }
    }
    else if(isset($_GET['khoiphuc']) && $_GET['khoiphuc']==1){
        $id = $_POST['id'];
        $sql = "UPDATE file SET deleted='0',modify='$t' WHERE id='$id'";
        $query = mysqli_query($connect, $sql);
        if ($query) {
            echo 'Khôi phục thành công';
        } else {
            echo 'Xảy ra lỗi.Vui lòng thử lại';
        }
    }
    else {
        $id = $_POST['id'];
        $sql = "UPDATE file SET deleted='1' ,modify='$t' WHERE id='$id'";
        $query = mysqli_query($connect, $sql);
        if ($query) {
            echo 'Xóa thành công';
        } else {
            echo 'Xảy ra lỗi.Vui lòng thử lại';
        }
    }

?>