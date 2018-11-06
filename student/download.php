<?php
$file = $_GET['name'];
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
	readfile($file);
    ob_clean();
    flush();
    exit;
	 header("Location: downloadVideo.php");
	 die("Success ");
}
else
{
	 $_SESSION['download']="<div class='chip red black-text'>Something went wrong</div>";
     header("Location: downloadVideo.php");
	 die("Error ");
}
?>
