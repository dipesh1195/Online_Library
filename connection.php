<?php
$servername="localhost";
$username="root";
$password="";
$dbname="newdb";

//Create Connection
$conn=new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//get values from form
if (isset($_POST['bookname'])) {
$booknameVar=$_POST['bookname'];
}
if (isset($_POST['bookdesc'])) {
$bookdescVar=$_POST['bookdesc'];
}
if (isset($_POST['bookauthor'])) {
$bookauthorVar=$_POST['bookauthor'];
}
if (isset($_POST['booklang'])) {
$booklangVar=$_POST['booklang'];
}
if (isset($_POST['bookcategory'])) {
$bookcategoryVar=$_POST['bookcategory'];
}


if(isset($_FILES['bookfile']))
{
	$allowed = array ('application/pdf' , 'application/doc' , 'application/docx' ,'application/txt');
	if (in_array($_FILES['bookfile']['type'], $allowed))
	{
			//Move File
		    $targetfolder = "files/";
		    $targetfile = $targetfolder.basename($_FILES['bookfile']['name']);

			if(move_uploaded_file($_FILES['bookfile']['tmp_name'], $targetfile)){
			$bookfileVar=$_FILES['bookfile']['name'];
			}
			
	}
}

if (isset($_POST['uploadername'])) {
$uploadernameVar=$_POST['uploadername'];
}
if (isset($_POST['uploaderemail'])) {
$uploaderemailVar=$_POST['uploaderemail'];
}

//Insert Values
$sql = "INSERT INTO bookdb (bookname, bookdesc, bookauthor, booklang, bookfile, uploadername, uploaderemail ,bookcategory) 
VALUES ('$booknameVar', '$bookdescVar', '$bookauthorVar', '$booklangVar', '$bookfileVar', '$uploadernameVar', '$uploaderemailVar','$bookcategoryVar')";

//To check whether data is inserted properly or not
if ($conn->query($sql) === TRUE) {
	echo '<script type="text/javascript">'; 
	echo 'alert("New record created successfully. Click OK to go to Book Display Section.");'; 
	echo 'window.location.href = "displaydata.php";';
	echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
