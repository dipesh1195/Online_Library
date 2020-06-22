<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta charset="utf-8">
	<title>Book Console EEE</title>
</head>
<body>
<header>
	 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="mainpage.html">Online Library</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="mainpage.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="displaydata.php">Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="upload.html">Upload</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Select Course
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
           <a class="dropdown-item" href="cse.php">CSE</a>
          <a class="dropdown-item" href="mechanical.php">Mechanical</a>
          <a class="dropdown-item" href="civil.php">Civil</a>
          <a class="dropdown-item" href="eee.php">EEE</a>
          <a class="dropdown-item" href="bca.php">BCA</a>
          <a class="dropdown-item" href="other.php">Others</a>  
          <nav class="navbar navbar-light bg-light">
          </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          MMDU
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
             <a class="dropdown-item" href="https://www.mmumullana.org/">MMDU Official Site</a>
          <a class="dropdown-item" href="https://www.mmumullana.org/holiday-calendar-2020/#">MMDU Holidays 2020</a>
          <a class="dropdown-item" href="syllabus.html">Syllabus</a>
          <nav class="navbar navbar-light bg-light">
          	</div>
      </li>
      
    </ul>

  </div>
  <form class="form-inline" method="POST" action="search.php">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
  </form>
</nav>
</header>
<div class="container"> 
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
$sql = "SELECT * from bookdb where bookcategory = 'eee'";
$result = $conn->query($sql);

?>
   <h2>Categories</h2>
		<button type="button" class="btn btn-warning" > <a href="cse.php">CSE</a></button>
   <button type="button" class="btn btn-warning" > <a href="civil.php">CIVIL</a></button>
   <button type="button" class="btn btn-warning" > <a href="mechanical.php">MECH</a></button>
   <button type="button" class="btn btn-warning" > <a href="eee.php">EEE</a></button>
   <button type="button" class="btn btn-warning" > <a href="bca.php">BCA/MCA</a></button>
   <button type="button" class="btn btn-warning" > <a href="other.php">OTHER</a></button>

	<div class="divtag">
  <h2>Book Console</h2>
    <table class="table table-hover"   border="5px solid green">
          <th>Book Name</th>
          <th>Book Description</th>
          <th>Book Author</th>
          <th>Book Language</th>
          <th>Download Link</th>
          <th>Uploader Name</th>
          <th>Uploader Email</th>
          <th>Book Category</th>
    
          <tr>
            <?php
              while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$row['bookname']."</td>";
              echo "<td>".$row['bookdesc']."</td>";
              echo "<td>".$row['bookauthor']."</td>";
              echo "<td>".$row['booklang']."</td>";
              echo "<td><a href='http://localhost/Online_Library/files/".$row['bookfile']."'><b>Download/View</b></a></td>";
              echo "<td>".$row['uploadername']."</td>";
              echo "<td>".$row['uploaderemail']."</td>";
              echo "<td>".$row['bookcategory']."</td>";
              echo "</tr>";
              }
            ?></tr>
    </table>
  </div>





</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script></div>
</body>
</html>
