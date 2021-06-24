<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$category = $_POST['category'];
		// $author = $_POST['author'];
		// $publisher = $_POST['publisher'];
		$pub_date = $_POST['pub_date'];
		$type = $_POST['type'];
		$about = $_POST['about'];
		
		$sql = "SELECT * FROM category WHERE id = $category";
		$query = $conn->query($sql);
		while($crow = $query->fetch_assoc()){
			$bookimage = $_FILES['photo']['name'];
			if(!empty($bookimage)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/bookimages/'.$bookimage);	
			}	
		$filename = $_FILES["file"]["name"];
		$file_basename = $crow['name'].'_'.$_POST['title'].'_for_'.$type; // get file extention
		$file_ext = substr($filename, strripos($filename, '.')); // get file name
		$filesize = $_FILES["file"]["size"];
		$allowed_file_types = array('.doc','.docx','.rtf','.pdf');
		}
		// if (in_array($file_ext,$allowed_file_types) && ($filesize < 20000000000))
		// {	
			// Rename file
			$newfilename = ($file_basename) . $file_ext;
			if (file_exists("upload/" . $newfilename))
			{
				// file already exists error
				$_SESSION['error'] = "You have already uploaded this file.";
			}
			else
			{		
				$files = $_FILES["file"]["tmp_name"];
				move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $newfilename);
				$sql = "UPDATE books SET isbn = '$isbn', title = '$title', category_id = '$category',  publish_date = '$pub_date', file = '$newfilename', type='$type', about = '$about', image = '$bookimage' WHERE id = '$id'";
				if($conn->query($sql)){
					$_SESSION['success'] = 'Book added successfully';
				}
				else{
					$_SESSION['error'] = $conn->error;
				}
				$_SESSION['success'] = "File uploaded successfully.";		
			}
		// }
		// elseif (empty($file_basename))
		// {	
		// 	// file selection error
		// 	$_SESSION['error'] = "Please select a file to upload.";
		// } 
		// elseif ($filesize > 200000)
		// {	
		// 	// file size error
		// 	$_SESSION['error'] = "The file you are trying to upload is too large.";
		// }
		// else
		// {
		// 	// file type error
		// 	$_SESSION['error'] = "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
		// 	unlink($_FILES["file"]["tmp_name"]);
		// }

	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:book.php');

?>