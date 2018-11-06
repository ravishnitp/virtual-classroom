<?php
include "header.php";
?>
<?php
if (isset($_SESSION['fusername']) && isset($_POST['submit'])) {
    $cid        = $_POST['cid'];
    $cid        = mysqli_real_escape_string($conn, $cid);
    $cid        = htmlentities($cid);
    $sql        = "SELECT * FROM course where cid=$cid ";
    $res        = mysqli_query($conn, $sql);
    $row        = mysqli_fetch_assoc($res);
    $courseCode = $row['courseCode'];
    $title      = $row['title'];
    
    
    $username       = $_SESSION['fusername'];
    $sql1           = "SELECT * FROM faculty where username='$username' ";
    $res1           = mysqli_query($conn, $sql1);
    $row1           = mysqli_fetch_assoc($res1);
    $fid            = $row1['fid'];
    $numberOfVideos = $_POST['videoField'];
    
    $validVidFormat         = 1;
    $allowed_vid_extensions = array(
        "webm",
        "mp4",
        "ogv"
    );
    $allowed_vid_MimeTypes  = array(
        'video/webm',
        'video/ogg',
        'video/mp4',
        'video/ogv'
    );
    
    /* check that all videos are valid or not */
    
    for ($x = 1; $x <= $numberOfVideos; $x++) {
        $file_name      = $_FILES['video' . $x]['name'];
        $file_type      = $_FILES['video' . $x]['type'];
        $file_name_temp = explode(".", $file_name);
        $extension      = end($file_name_temp);
        if (!empty($file_name) && (($file_type == "video/webm") || ($file_type == "video/mp4") || ($file_type == "video/ogv") && in_array($extension, $allowed_vid_extensions)) && $_FILES['video' . $x]['error'] <= 0) {
            
        } else {
            $validVidFormat = 0;
            break;
        }
    }
    
    /* If all video have valid format then add the courses videos in  tabels
    else redirect to back page with error message
    */
    if ($validVidFormat == 1) {
        
    } else {
       header("Location: editCourse.php");
        $_SESSION['fcourseEditmessage'] = "<div class='chip red black-text'>Error Adding Videos</div>";
        die("Error Adding Videos");
    }
    
    for ($x = 1; $x <= $numberOfVideos; $x++) {
        $filepath           = "../course/videos/" . $_FILES["video" . $x]["name"];
        $file_name          = $_FILES['video' . $x]['name'];
        $file_type          = $_FILES['video' . $x]['type'];
        $allowed_extensions = array(
            "webm",
            "mp4",
            "ogv"
        );
        $file_name_temp     = explode(".", $file_name);
        $extension          = end($file_name_temp);
        $allowedMimeTypes   = array(
            'video/webm',
            'video/ogg',
            'video/mp4',
            'video/ogv'
        );
        echo $file_name;
        if (move_uploaded_file($_FILES["video" . $x]["tmp_name"], $filepath)) {
            $sql = "insert into video(cid,courseCode,title,fid,video) values($cid,'$courseCode','$title',$fid,'$file_name')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                echo "Video added " . $x . "<br>";
            }
            
            else {
                echo "Error adding video !!";
            }
        } else {
            header("Location: editCourse.php");
            $_SESSION['fcourseEditmessage'] = "<div class='chip red black-text'>Error adding video !!</div>";
            die("Error adding video !!");
        }
        
        
        
    }
    
   header("Location: editCourse.php");
    $_SESSION['fcourseEditmessage'] = "<div class='chip green white-text'>Videos Successfully Added</div>";
    die("Videos Added");
    
    
}


else {
  header("Location: editCourse.php");
    $_SESSION['fcourseEditmessage'] = "<div class='chip red black-text'>Invalid Access</div>";
    die("Invalid Access");
}
?>

