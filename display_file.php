<?php
    session_start();
    echo $_SESSION['user'];
    $currpath=getcwd();
    $filename = $currpath. '/'.$_SESSION['user'] .'/Lab Manual.pdf';
    if (file_exists($filename)){
    header("Content-type: application/pdf");
    header("Content-Length: " . filesize($filename));
    readfile($filename);
    exit;}
    else {
      echo "Erorr";
      echo $_SESSION['user'];
      echo $filename;
    }
?>
