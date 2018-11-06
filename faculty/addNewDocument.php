<?php
include "header.php";
?>
<?php
if (isset($_SESSION['fusername']) && isset($_POST['submit']))
	{
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
    $numberOfDoc=$_POST['docField'];
    
    $validDocFormat = 1;
    $allowed_doc_extensions = array("pptx",'ppt','doc','docx',"pdf","txt");
    $allowed_doc_MimeTypes = array( 
				  'application/msword',
				  'text/pdf',
				  'image/gif',
				  'image/jpeg',
				  'image/png',
				  "text/plain","text/html","text/css","text/javascript","application/pdf",
				  'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
				  'application/vnd.ms-powerpoint',
				  'application/vnd.openxmlformats-officedocument.presentationml.presentation'
			);
    
    for ($x = 1; $x <= $numberOfDoc; $x++)
		  {
			$file_name = $_FILES['doc'.$x]['name'];
			$file_type = $_FILES['doc'.$x]['type'];
			$file_name_temp = explode(".", $file_name);
			$extension = end($file_name_temp);
			if (!empty($file_name) && in_array( $file_type, $allowed_doc_MimeTypes ) && in_array($extension, $allowed_doc_extensions)
				&& $_FILES['doc'.$x]['error'] <= 0)
			{
				
			}
			else
			{
				$validDocFormat = 0;
				break;
			}
			
			
		  }
    
    /* If all document have valid format then add the courses document in  tabels
    else redirect to back page with error message
    */
    if ($validDocFormat == 1) {
        
    } else {
       header("Location: editCourse.php");
        $_SESSION['fcourseEditmessage'] = "<div class='chip red black-text'>Error Adding Documents</div>";
        die("Error Adding Documents");
    }
    
    for ($x = 1; $x <= $numberOfDoc; $x++) 
	{
        
			$filepath = "../course/documents/" . $_FILES["doc".$x]["name"];
			$file_name = $_FILES['doc'.$x]['name'];
			$file_type = $_FILES['doc'.$x]['type']; //Mime type
			$file_name_temp = explode(".", $file_name);
			$extension = end($file_name_temp);
			$allowed_extensions = array("pptx",'ppt','doc','docx',"pdf","txt");
			$allowedMimeTypes = array( 
			  'application/msword',
			  'text/pdf',
			  'image/gif',
			  'image/jpeg',
			  'image/png',
			  "text/plain","text/html","text/css","text/javascript","application/pdf",
			  'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
			  'application/vnd.ms-powerpoint',
			  'application/vnd.openxmlformats-officedocument.presentationml.presentation'
			  );
			  echo $file_name;
        
		if(move_uploaded_file($_FILES["doc".$x]["tmp_name"], $filepath))
		{
								$sql="insert into document(cid,courseCode,title,fid,document) values($cid,'$courseCode','$title',$fid,'$file_name')";
							$res=mysqli_query($conn,$sql);
									if($res)
									 {
										 echo "Document added ".$x."<br>";
									 }
									 
									else 
									{
									echo "Error adding Document !!";
									}
		}
		else {
            header("Location: editCourse.php");
            $_SESSION['fcourseEditmessage'] = "<div class='chip red black-text'>Error adding Document !!</div>";
            die("Error adding Document !!");
        }
        
        
        
    }
    
   header("Location: editCourse.php");
    $_SESSION['fcourseEditmessage'] = "<div class='chip green white-text'>documents Successfully Added</div>";
    die("documents Added");
    
    
}


else {
  header("Location: editCourse.php");
    $_SESSION['fcourseEditmessage'] = "<div class='chip red black-text'>Invalid Access</div>";
    die("Invalid Access");
}
?>

