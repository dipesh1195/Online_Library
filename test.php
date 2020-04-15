<?php
$target_dir = "files/";
$targetfile = $target_dir.basename($_FILES['file']['name']);
$tmp = $_FILES['file']['tmp_name'];

if(move_uploaded_file($tmp, $targetfile)){
	echo "file uploaded succesfully";
}
else{
	echo "unable to upload";
}
?>	