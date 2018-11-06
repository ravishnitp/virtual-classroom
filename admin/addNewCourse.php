<?php
  include "header.php";
  ?>
<?php
if(isset($_POST['submit']))
{ 
 
			$courseCode=$_POST['courseCode'];
			$title=$_POST['title'];
			$startDate=$_POST['startDate'];
			$endDate=$_POST['endDate'];
			$department=$_POST['department'];
			$fid=$_POST['fid'];
			$numberOfVideos=$_POST['videoField'];
			$numberOfDoc=$_POST['docField'];
			
			/*prevent sql injection */
			 $courseCode=mysqli_real_escape_string($conn,$courseCode);
			 $department=mysqli_real_escape_string($conn,$department);
			  $title=mysqli_real_escape_string($conn,$title);
			 $startDate=mysqli_real_escape_string($conn,$startDate);
			  $endDate=mysqli_real_escape_string($conn,$endDate);
			 $fid=mysqli_real_escape_string($conn,$fid);
			 
			 /* prevent scripting */
			 $courseCode=htmlentities( $courseCode);
			 $department=htmlentities($department);
			 $title=htmlentities($title);
			 $startDate=htmlentities($startDate);
			 $endDate=htmlentities($endDate);
			$fid=htmlentities($fid);
			
			/*Date Creation Variables */
			$today = new DateTime('now');
			$courseStartDate=date_create($startDate);
			$courseEndDate=date_create($endDate);
			$diff=date_diff($courseStartDate,$courseEndDate);
			echo $diff->format("%R%a days")."<br>";
			$diff5=date_diff($today,$courseEndDate);
			echo $diff5->format("%R%a days")."<br>";
			/* if course end date is less than today then course has expired */
			if($diff5->format("%R%a days") < 0)
			{
				header("Location: addCourse.php");
               $_SESSION['courseAddmessage']="<div class='chip red black-text'>Course Time Expired</div>";
			   die("Course Time Expired ");
				
			}
			
	
			$sql2="select * from faculty where fid='$fid' and department='$department'";
			$res2=mysqli_query($conn,$sql2);
			
			$sql5 = "select endDate,startDate from course where fid='$fid' and courseCode='$courseCode' order by endDate Desc LIMIT 1";
			$res5=mysqli_query($conn,$sql5);
			$row5=mysqli_fetch_assoc($res5);
			print_r($row5);
			echo $row5['endDate'];
			$date3=date_create($row5['endDate']);  /*ongoing course endDate */
			$date4=date_create($row5['startDate']);  /*ongoing course startDate */
			$diff2=date_diff($date3,$courseStartDate);
			$diff3=date_diff($date4,$courseEndDate);
			echo $diff2->format("%R%a days")."<br>";
			if(mysqli_num_rows($res5) == 0 || ($diff2->format("%R%a days") > 0 && $diff3->format("%R%a days") < 0))
			{
				//continue;
			}
			else
			{
				header("Location: addCourse.php");
             $_SESSION['courseAddmessage']="<div class='chip red black-text'>Ongoing Course</div>";
			 die("ongoing Course");
				//echo "<br>"."Course Exist "."<br>";
			}
			if($diff2->format("%R%a days") == 0 && $diff3->format("%R%a days") == 0)
			{
				header("Location: addCourse.php");
             $_SESSION['courseAddmessage']="<div class='chip red black-text'>Course Exist</div>";
			 die("Course Exist ");
			}
			
			
			$validDocFormat = 1;
			 $validVidFormat = 1;
			 $allowed_vid_extensions = array("webm", "mp4", "ogv");
			 $allowed_vid_MimeTypes = array( 
			  'video/webm', 'video/ogg','video/mp4','video/ogv'
			);
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
		 /* check that all videos are valid or not */
		  /* check that all documents are valid or not */
		  for ($x = 1; $x <= $numberOfVideos; $x++)
		  {
			$file_name = $_FILES['video'.$x]['name'];
			$file_type = $_FILES['video'.$x]['type'];
			$file_name_temp = explode(".", $file_name);
			$extension = end($file_name_temp);
			if (!empty($file_name) && (($file_type == "video/webm") || ($file_type == "video/mp4") || ($file_type == "video/ogv") 
					&& in_array($extension, $allowed_vid_extensions)) && $_FILES['video'.$x]['error'] <= 0)
			{
				
			}
			else
			{
				$validVidFormat = 0;
				break;
			}
		}
		  
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
		  /* If all documents and video have valid format and faculty is available as well as difference 
		  of start and end date is greater than 1 then add the courses videos and document in their respective tabels
		  else redirect to back page with error message
		  */
		  if($validDocFormat==1 && $validVidFormat == 1 && mysqli_num_rows($res2)>0 && $diff->format("%R%a days") > 0)
		  {
			  
		  }
		  else
		  {
			  header("Location: addCourse.php");
             $_SESSION['courseAddmessage']="<div class='chip red black-text'>Error Adding Course</div>";
			 die("Error Adding Course");
			 // echo " ERROR ERRORERRORERRORERRORERRORERRORERRORERRORERRORERRORERRORERRORERRORERRORERRORERRORERRORERROR";
		  }
		  $sql="insert into course(courseCode,title,department,startDate,endDate,fid)values('$courseCode','$title','$department','$startDate','$endDate',$fid)";
                 $res=mysqli_query($conn,$sql);
                 if($res)
                 {
                     echo "Course added "."<br>";
					$sql7="select * from course order by cid Desc LIMIT 1";
					$res7=mysqli_query($conn,$sql7);
					$row7=mysqli_fetch_assoc($res7);
					 
					 $cid = $row7['cid'];
                 }
				 else{
					//header("Location: addCourse.php");
				 $_SESSION['courseAddmessage']="<div class='chip red black-text'>Error Adding Course</div>";
				 die("Error Adding Course");

				}
         
		 


	for ($x = 1; $x <= $numberOfVideos; $x++) 
	{
		$filepath = "../course/videos/" . $_FILES["video".$x]["name"];
		$file_name = $_FILES['video'.$x]['name'];
		$file_type = $_FILES['video'.$x]['type'];
		$allowed_extensions = array("webm", "mp4", "ogv");
		$file_name_temp = explode(".", $file_name);
		$extension = end($file_name_temp);
		$allowedMimeTypes = array( 
		  'video/webm', 'video/ogg','video/mp4','video/ogv'
		);
		echo $file_name;
		if (!empty($file_name))
			{
				if (($file_type == "video/webm") || ($file_type == "video/mp4") || ($file_type == "video/ogv") 
					&& in_array($extension, $allowed_extensions))
				{
					if ($_FILES['video'.$x]['error'] > 0)
					{
						echo "Unexpected error occured, please try again later.";
					} 
					else 
					{
						if(move_uploaded_file($_FILES["video".$x]["tmp_name"], $filepath)) 
						{
							$sql="insert into video(cid,courseCode,title,fid,video) values($cid,'$courseCode','$title',$fid,'$file_name')";
							$res=mysqli_query($conn,$sql);
									if($res)
									 {
										 echo "Video added ".$x."<br>";
									 }
									 
									else 
									{
									echo "Error adding video !!";
									}
						}
						else 
						{
							echo "error"."<br>";
							echo "Invalid video format.";
						}
					}
				}
				else
				{
					echo "Please select a video to upload.";
				}
				
		 // print_r($_FILES["file"]);
		  echo "<br>";
		  echo "<br>";
	}

} 
}
?>



<!-- For document analysis -->


<?php

if(isset($_POST['submit']))
{ 
	$numberOfDoc=$_POST['docField'];
	echo $numberOfDoc."<br>";
		for ($x = 1; $x <= $numberOfDoc; $x++) 
		{
			$filepath = "../course/documents/" . $_FILES["doc".$x]["name"];
			$file_name = $_FILES['doc'.$x]['name'];
			$file_type = $_FILES['doc'.$x]['type']; //Mime type
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
			$file_name_temp = explode(".", $file_name);
			$extension = end($file_name_temp);
			echo $filepath;
			if (!empty($file_name))
				{
					if (in_array( $file_type, $allowedMimeTypes ) && in_array($extension, $allowed_extensions))
					{
						if ($_FILES['doc'.$x]['error'] > 0)
						{
							echo "Unexpected error occured, please try again later.";
						} 
						else 
						{
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
									echo "Error adding video !!";
									}
							} else 
							{
							echo "Error !!";
							}
						}
					} else {
						echo "Invalid Document format.".$x."<br>";
					}
				} else {
					echo "Please select a Document to upload.";
				}
					
			 
			  echo "<br>";
			  echo "<br>";
		}
				header("Location: addCourse.php");
             $_SESSION['courseAddmessage']="<div class='chip green white-text'>Course Added</div>";

} 
?>





