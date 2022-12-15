<?php
if (isset($_GET['path'])) {
    //Read the url
    $url = "files/" . $_GET['username'] . "/" . $_GET['path'];
    //Clear the cache
    clearstatcache();

    //Check the file path exists or not
    if (file_exists($url)) {

        //Define header information
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($url) . '"');
        header('Content-Length: ' . filesize($url));
        header('Pragma: public');

        //Clear system output buffer
        flush();

        //Read the size of the file
        readfile($url, true);

        //Terminate from the script
        die();
    } else {
        echo "File path does not exist.";
    }
}
else if($_POST['downmulti']) {
    $files = array('readme.txt', 'test.html', 'image.gif');
    $zipname = 'file.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    foreach ($files as $file) {
    $zip->addFile($file);
    }
    $zip->close();

    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename='.$zipname);
    header('Content-Length: ' . filesize($zipname));
    readfile($zipname);
}
echo "File path is not defined."?>