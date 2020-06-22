<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Online Library</title>
</head>
<body style="background: black url(img1.gif) repeat-x;color: white;">
<div style="height: 158px;width:1200px ;font-weight: bold;letter-spacing: 1px;font-family: courier new;">
	<h1 style="margin: 0 auto;margin-top: 25px;margin-left: 25%;">Online Library </h1>
	<h2 style="letter-spacing: -1px;margin: 0 auto;margin-left: 25%;">A book store for everyone</h2>
	<div><ul style="float: right;list-style: none;font-weight: bold; padding: 20px;margin-top: 60px;font-size: 1.1em">
		<li style="display: inline;text-decoration: none;  border: 1px solid #1E1010;background: #FEEAB7 url(images/img2.gif) repeat-x left bottom;border-right-color: #7A6D6D;border-bottom-color: #7A6D6D;color: #FFFFFF;font-weight: bold;"><a href="mainpage.html"> Home </a></li>
		<li style="display: inline;font-weight: bold;margin-left: 10px;display: inline;border: 1px solid #1E1010;background: #FEEAB7 url(images/img2.gif) repeat-x left bottom;border-right-color: #7A6D6D;border-bottom-color: #7A6D6D;color: #FFFFFF;font-weight: bold;"><a href="displaydata.php">Books</a></li>
		<li style="display: inline;font-weight: bold;margin-left: 10px;display: inline;border: 1px solid #1E1010;background: #FEEAB7 url(images/img2.gif) repeat-x left bottom;border-right-color: #7A6D6D;border-bottom-color: #7A6D6D;color: #FFFFFF;font-weight: bold;"><a href="syllabus.html">Syllabus</a></li>
		<li style="display: inline;font-weight: bold;margin-left: 10px;display: inline;border: 1px solid #1E1010;background: #FEEAB7 url(images/img2.gif) repeat-x left bottom;border-right-color: #7A6D6D;border-bottom-color: #7A6D6D;color: #FFFFFF;font-weight: bold;"><a href="query.php">Query</a>/</li>

	</ul></div>
</div>
<div  style="background-color: lighter;	 margin-top: 2%; height: 870px;color: orange;font-family: courier new;">

<form align="center" action="search.php" method="post">
    <input style="margin-left:28% ;margin-top:3%; border-radius:30px;padding:3px; height:45px;width:300px;" type="text" name="search"  placeholder="Search Books">
    <input style="margin-left:5px; border-radius:30px;padding:3px;height:45px;width:100px;" type="submit" name="Search" >
</form>
<br><br>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="newdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//fetch from database
$sql = "SELECT * from bookdb";
$result = $conn->query($sql);

?>
   <h2>Categories</h2>
		<ul style="font-family: courier new;font-style: bold;">
			<li><a href="cse.php">CSE</a></li>
			<li><a href="civil.php">CIVIL</a></li>
			<li><a href="mechanical.php">MECHANICAL</a></li>
			<li><a href="eee.php">EEE</a></li>
			<li><a href="bca.php">BCA/MCA</a></li>
			<li><a href="other.php">OTHER</a></li>
		</ul>
	<div style="overflow-x:all;">
	<h2>Books Available for Free Download</h2>
		<table width="100%" cellspacing="10%" cellpadding="8" border="5px solid">
				<div class="header">
					<th style="color: white;font-style: bold;font-family: courier new;">Book Name</th>
					<th style="color: white;font-style: bold;font-family: courier new;">Book Description</th>
					<th style="color: white;font-style: bold;font-family: courier new;">Book Author</th>
					<th style="color: white;font-style: bold;font-family: courier new;">Book Language</th>
					<th style="color: white;font-style: bold;font-family: courier new;">Download Link</th>
					<th style="color: white;font-style: bold;font-family: courier new;">Uploader Name</th>
					<th style="color: white;font-style: bold;font-family: courier new;">Uploader Email</th>
					<th style="color: white;font-style: bold;font-family: courier new;">Book Category</th>
				</div>
					<tr>
						<?php
							while($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>".$row['bookname']."</td>";
							echo "<td>".$row['bookdesc']."</td>";
							echo "<td>".$row['bookauthor']."</td>";
							echo "<td>".$row['booklang']."</td>";
							echo "<td><a href='http://localhost/Online_Library/files/".$row['bookfile']."'><b>Download E-Book</b></a></td>";
							echo "<td>".$row['uploadername']."</td>";
							echo "<td>".$row['uploaderemail']."</td>";
							echo "<td>".$row['bookcategory']."</td>";
							echo "</tr>";
							}
						?>
		</table>
	</div>




</div>

</body>
</html>
