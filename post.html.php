<?php
require_once 'authorizeUser.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>templates</title>
	<meta name="author" content="Olly Blake" />
	
  <link rel="stylesheet" type="text/css" href="styles.css" />
	<!-- Date: 2012-02-12 -->
  <script src="http://code.jquery.com/jquery-latest.js"></script>

  <script type="text/javascript">
//hidden 'loading' div makes it display
  document.getElementById("loading").className = "unhidden";
  var hideDiv = function(){document.getElementById("loading").className = "hidden";};
  var oldLoad = window.onload;
  var newLoad = oldLoad ? function(){hideDiv.call(this);oldLoad.call(this);} : hideDiv;
  window.onload = newLoad;
</script>

  <script type="text/javascript">

//if the submitted post has been added then this hides the form
$(document).ready(function() {
if ($('#result').length != 0) {

 $('#add').addClass("hidden"); 
}
});
</script>

</head>
<body>
	 <div id="wrap">
	<a href="index.php"><h2>Zombies Make Honey</h2></a>
	<hr />
		<p>Submit your post or <a href="index.php" class="button">go back</a></p>
		<br />
		      <div id="loading" class="hidden">
  				<img src="loadinfo-0.net.gif" alt="loading"/>  Loading...
			  </div>
<div class="box2">
<?php
require_once 'appvars.php';
require_once 'connect.php';


  if (isset($_POST['submit'])) {
    // Grab the description data from the POST
    $name =  htmlentities(trim($_POST['name']));
    $title =  htmlentities(trim($_POST['title']));
    $description = htmlentities(trim($_POST['description']));
    $image = $_FILES['image1']['name'];
    $image_type = $_FILES['image1']['type'];
    $image_size = $_FILES['image1']['size'];
	//PROBLEM: THE VALUE OF POST IS GOING INTO DATABASE AS 0 THEREFORE THERE IS A AN EMPTY STRING BEING SET.
	$post = $_POST['confirm'];

	//including helper function to stop hacking
	function html($text) {
		return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
	}
	
	//echo html($title['text']);
	//echo html($description['text']);
	
    if (!empty($name) && !empty($title) && !empty($description)) {
    	if ((($image_type == 'image/gif') || ($image_type == 'image/jpg') || ($image_type == 'image/jpeg')|| ($image_type == 'image/JPEG')|| ($image_type == 'image/pjpeg') || ($image_type == 'image/png')) && ($image_size <= GW_MAXFILESIZE)) {
    				if ($_FILES['image1']['error'] == 0) {
    					
    					//move the file to the target upload folder
				    	$target = GW_UPLOADPATH . $image;
					    if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)){
						
						

				      // Connect to the database
				      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				
				      // Write the data to the database
				      $query = "INSERT INTO post(title, name, description, image1, post_it) VALUES ('$title','$name', '$description', '$image', '$post');"
;
				      mysqli_query($dbc, $query);
				
				      // Confirm success with the user
				      echo '<div id="result">';
				      echo '<p>Your post has been submitted, thank you. <a href="post.html.php" class="button">Submit another post</a></p><br />';					  			      
				      echo '<table cellspacing="0" frame="void" rules="rows">';
					    echo '<tr class="form">';
				      echo '<td class="memberpostinfo">';
				      echo '<h1>' . nl2br($title) . '</h1><br /><br />';
				      echo '<strong>Name:</strong> <div class="description">' . nl2br($name) . '</div><br />';
				      echo '<strong>Description:</strong> <div class="description">' . nl2br($description) . '</div></p>';
					    echo '<strong>Created:</strong> <div class="description">' . date('Y-m-d H:i:s') . '</div><br />';
				      echo '<strong>Post to blog:</strong> <div class="description">'. $post .'</div>';
				      echo  '</td>';
					    echo '<td class="memberpostimage"><img src="' . GW_UPLOADPATH . $image .'" alt="" width="500px" /></td>';
				      echo "</tr>";
				      echo "</table>";
				      echo "</div>";

				
				      // Clear the description data to clear the form
				    $name = "";
				    $title = "";
				    $description = "";
					  $image = "";

				      mysqli_close($dbc);
						
    				}
				else {
					echo '<p class="error">Sorry, There was a problem uploading your post. You should contact the admistrator for further help.';
				}
    		
    	}
   
	    }
	else {
		echo '<p class="error">The image/s must be a GIF, JPEG, or PNG image file no ' .
		'greater than '. (GW_MAXFILESIZE / 1024) . 'KB in size.</p>';
	}

//try to delete the temporary screen shot image file
@unlink($_FILES['image1']['tmp_name']);
}
    else {
      echo '<p class="error">Please enter all of the information to submit post.</p>';
    }
    }
  

?>

        <div id="add">
        	<table cellspacing="0" frame="void" rules="rows">
     <form enctype="multipart/form-data" method="post" action="">
       	<tr>
               <td class="memberpostinfo">
               	<input type="hidden" name="MAX_FILE_SIZE" value="819200" />
               	<h1>New post</h1><br /><br />
               	     <label for="titletext"><strong>Name:</strong></label>
                    <br />
                    <input type="text" class="s" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>" /><br />
        			<label for="titletext"><strong>Title:</strong></label>
                    <br />
                    <input type="text" class="s" id="title" name="title" value="<?php if (!empty($title)) echo $title; ?>" /><br />
        			<label for="descriptiontext"><span><strong>Description:</strong></span></label>
                    <br />
                    <textarea class="message" id="description" name="description" value="<?php if (!empty($description)) echo $description; ?>"></textarea>
			           		<br />
                    <label for="images"><strong>Images:</strong></label>
                   <br />
                    <input type="file" id="image1" name="image1" /> 
                    <br />
					<strong>Submit to blog?</strong>
					<div class="discription">
					<input type="radio" name="confirm" value="yes" /> Yes 
					<input type="radio" name="confirm" value="no" checked="checked" /> No <br />
					</td>
					<td class="memberpostimage"><img src="images/holder.png" alt="Score image"width="500px"/>
                    </div>
                    </td>
        </tr>
        </table>
    <hr />
    <input type="submit" value="Add" name="submit" />
  </form>

        </div>
        </div>
	</div>
</body>
</html>
