<?php
require_once 'authorize.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Zombies Make Honey - Administration</title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
	
	<div id="wrap">
  <a href="index.php"><h2>Zombies Make Honey</a> - Administration</h2>
  <hr />
  <h1>Below is a list of all uploads. Use this page to remove posts as needed.</h1>

<?php
require_once 'appvars.php';
require_once 'connect.php';

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  // Retrieve the data from MySQL
  $query = "select id, name, title, description, created, image1, image2, image3, image4, post_it from post order by id desc, created asc;";
  $data = mysqli_query($dbc, $query);

  echo '<div class="box">';
  echo '<table cellspacing="0" frame="void" rules="rows">';

  // Loop through the array of post data, formatting it as HTML 

  while ($row = mysqli_fetch_array($data)) { 
    // Display the post data

	echo "<tr>";
	echo '<td>';
	echo '<strong>#' . $row['id'] . '</strong></td>';
    echo '<td>Title: ' . $row['title'] . '</td>';
	echo '<td>Description: ' . $row['description'] . '</td>';
    echo '<td><strong>' . $row['created'] . '</strong>';
	echo "</td>";
	echo '<td><a href="remove.php?id=' .$row['id'] . '&amp;created=' . $row['created'] . '&amp;title=' . $row['title'] .
	'&amp;description=' . $row['description']. '&amp;image=' . $row['image1'] . '&amp;image2=' . $row['image2'] .
	 '&amp;image3=' . $row['image3'] . '">Remove</a></td></tr>';
      
  }
  
  echo "</table>";
    echo "</div>";
  
  mysqli_close($dbc);

?>
</div>
</body> 
</html>