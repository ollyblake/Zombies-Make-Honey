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
	
	if (isset($_GET['id']) && isset($_GET['created']) && isset($_GET['title']) &&
	isset($_GET['description']) && isset($_GET['image1']) || isset($_GET['image2']) || isset($_GET['image3'])) {
		
		//Grab the post data from the GET
		$id = $_GET['id'];
		$created = $_GET['created'];
		$title = $_GET['title'];
		$description = $_GET['description'];
		$image = $_GET['image1'];
		$image2 = $_GET['image2'];
		$image3 = $_GET['image3'];
	}
	else if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['description'])){
	// Grab the post data from the POST
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$image = $_POST['image1'];
	$image2 = $_POST['image2'];
	$image3 = $_POST['image3'];
	}
	else {
		echo '<p class="error">Sorry, nothing was specified for removal.</p>';
	}
	
	if (isset($_POST['submit'])) {
		if ($_POST['confirm'] == 'Yes') {
			
			//delete the image file from the server
			@unlink(GW_UPLOADPATH . $image);
			
			//connect to the database
			  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			  
			//delete data from the database
			$query = "DELETE FROM post where id = $id limit 1;";
			
			mysqli_query($dbc, $query);
			mysqli_close($dbc);
			
			//Comfirm success with the user
			echo '<p>The post <em>' . $title .'</em> was removed successfully.';	
		}
		else {
			echo '<p class="error">The post was not removed.</p>';

		}
	}
	
	elseif (isset($id) && isset($title) && isset($description) && isset($created) && isset($image) || isset($image2) || isset($image3)) {
		echo '<p>Are you sure you want to delete the following post?</p>';
		echo '<strong>Title:</strong> <div class="description">' . $title . '</div><br />';
		echo '<strong>Description:</strong> <div class="description">' . $description . '</div><br />';
		echo '<strong>Date:</strong> <div class="description">' . $created . '</div><br /><br />';
		echo '<form method="post" action="remove.php">';
	    echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
	    echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
		echo '<hr />';
	    echo '<input type="submit" value="submit" name="submit" />';
	    echo '<input type="hidden" name="id" value="' . $id . '" />';
	    echo '<input type="hidden" name="description" value="' . $description . '" />';
	    echo '<input type="hidden" name="title" value="' . $title . '" />';
	    echo '</form>';
	}
	
	echo '<p><a href="admin.php">&lt;&lt Back to admin page</a></p>';
?>

</div>

</body> 
</html>
