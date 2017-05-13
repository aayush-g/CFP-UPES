<?php
session_start();

$file_type=$_POST['submit'];
$file_type=$file_type;
$currpath=getcwd();

$allowedExts = array("pdf");
$extension = end(explode(".", $_FILES["file"]["name"]));
if (($_FILES["file"]["size"] < 90000000000000000000000000000000000) && in_array($extension, $allowedExts)){
    if ($_FILES["file"]["error"] > 0){
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }else{
        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
        echo "Type: " . $_FILES["file"]["type"] . "<br />";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
        if (file_exists($_SESSION['user'] . $_FILES["file"]["name"])){
            echo $_FILES["file"]["name"] . " already exists. ";
        }else{
            move_uploaded_file($_FILES["file"]["tmp_name"],
            $currpath. '/'.$_SESSION['user'] .'/'.$_SESSION['course'].'/'. $file_type.'.pdf');
            echo "Stored in: " . $_SESSION['user'] . $file_type;
            chmod(  $currpath. '/'.$_SESSION['user'] .'/'.$_SESSION['course'].'/'. $file_type.'.pdf',0777);
        }
    }
}else{
    echo "Invalid file";
}
header('Location: dashboard.php');
?>
