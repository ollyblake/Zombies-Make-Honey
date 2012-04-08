<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />


  <title>ZombiesMakeHoney</title>
  <meta name="description" content="" />
  <meta name="author" content="Olly Blake" />

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
  <link rel="stylesheet" type="text/css" href="styles.css" />
  
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

<script type="text/javascript">
//hidden 'loading' div makes it display
  document.getElementById("loading").className = "unhidden";
  var hideDiv = function(){document.getElementById("loading").className = "hidden";};
  var oldLoad = window.onload;
  var newLoad = oldLoad ? function(){hideDiv.call(this);oldLoad.call(this);} : hideDiv;
  window.onload = newLoad;
</script>

<script>
$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

	//Expand the challenge
	  $(".challenge").hide();
  //toggle the componenet with class msg_body
  $(".heading").click(function()
  {
    $(this).next(".challenge").slideToggle(900);
  });

});
</script>


</head>

<body>
	    <div id="back-top" class="button"><a href="#">back to top</a></div>
    <div id="wrap">
        	  <a href="index.php"><h2>Zombies Make Honey</h2></a>
        	  <hr />
        	  <p>Welcome, <a href="post.html.php" class="button">add your own post.</a></p>
        	   
			  <h1>Challenge Deadline: 06-04-2012</h1>
        	  <p class="heading">[click here for further info]</p>
        	  <div class="challenge">
        	  	<h1>Challenge 1</h1>
				<br />
				<br />
				<b>Children's book character</b>
				<br />
				<br />
				<u>About</u>
				<br />
				We all remember our favourite story book from when we where kids. for this challenge you objective is to create a character that children can relate to the same way that you related to your fondest character.
				<br />
				<ul>
				<li>The character should be unique and have his/her own special attributes.</li> 
				<li>It should be fun and relatable to kids.</li>
				<li>It can be based on an existing character from children's' books.</li>
				<li>It can be dark.</li>
				<li>It can be colourful and simple.</li>
				</ul>
				<br />
				<u>Look at</u>
				<br />
				Roald Dahl,  Tim Burton, Dr. Seuss, Maurice Sendak and other story book illustrators. 
				<br />
				<br />
				<hr />
				<h1>Challenge 2</h1>
				<br />
				<br />
				<b>The deconstruction of a genre</b>
				<br />
				<br />
				<u>About</u>
				<br />
				This is a series of images that relate to a movie genre. It should be 3-4 illustrations of iconography. The illustrations should be recognizable as a set. the set of images are the deconstruction of the chosen movie/book genre.
				<br />
				<ul>
				<li>Each image should be stylized the same.</li>
				<li>Simple is best.</li>
				<li>Think of the story you are telling.</li>
				<li>You can use objects (for example: false teeth, a bat, mirror without a reflection for a vampire movie)</li>
				<li>A wide range of different mediums can be used here, including photography</li>
				</ul>
				<br />
				<u>Look at</u>
				<br />
				Pop culture references, film and books in horror, romance, comedy, etc. 
				<br />
				<h1 align="center">[CHALLENGES ARE OPTIONAL NOT MANDATORY!]</h1>
        	  </div>
        	  	<br />
        	  	<div id="loading" class="hidden">
  				<img src="loadinfo-0.net.gif" alt="loading"/>  Loading...
			  </div>
        	  	

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
	echo '<td class="memberpostinfo">';
	echo '<h1>' . nl2br($row['title']) . '</h1><br /><br />';
	echo '<strong>Description:</strong> <div class="description">' . nl2br($row['description']) . '</div><br />';
    echo '<strong>Created:</strong> <div class="description">' . $row['created'] . '</div><br />';
	echo '<strong>Post to blog:</strong> <div class="description">'. $row['post_it'] .'</div>';
	echo "</td>";
	
	//try this tutorial to bring back sevel key's from $row: http://www.w3schools.com/php/func_array_key_exists.asp

	if (is_file(GW_UPLOADPATH . $row['image4']) > 0) {
		//all 4 images exist
	echo '<td class="memberpostimage"><a href="'. GW_UPLOADPATH . $row['image1'] .'"><img src="'. GW_UPLOADPATH . $row['image1'] .'" alt="image1"width="500px"/></a>';	
	echo '<a href="'. GW_UPLOADPATH . $row['image2'] .'"><img src="'. GW_UPLOADPATH . $row['image2'] .'" alt="image2"width="500px"/></a>';
	echo '<a href="'. GW_UPLOADPATH . $row['image3'] .'"><img src="'. GW_UPLOADPATH . $row['image3'] .'" alt="image3"width="500px"/></a>';
	echo '<a href="'. GW_UPLOADPATH . $row['image4'] .'"><img src="'. GW_UPLOADPATH . $row['image4'] .'" alt="image4"width="500px"/></a>';	
	
	}	elseif (is_file(GW_UPLOADPATH . $row['image3']) > 0) {
		//all 3 images exist
	echo '<td class="memberpostimage"><a href="'. GW_UPLOADPATH . $row['image1'] .'"><img src="'. GW_UPLOADPATH . $row['image1'] .'" alt="image1"width="500px"/></a>';	
	echo '<a href="'. GW_UPLOADPATH . $row['image2'] .'"><img src="'. GW_UPLOADPATH . $row['image2'] .'" alt="image2"width="500px"/></a>';
	echo '<a href="'. GW_UPLOADPATH . $row['image3'] .'"><img src="'. GW_UPLOADPATH . $row['image3'] .'" alt="image3"width="500px"/></a>';
	
	}	elseif (is_file(GW_UPLOADPATH . $row['image2']) > 0) {
		//all 2 images exist
	echo '<td class="memberpostimage"><a href="'. GW_UPLOADPATH . $row['image1'] .'"><img src="'. GW_UPLOADPATH . $row['image1'] .'" alt="image1"width="500px"/></a>';	
	echo '<a href="'. GW_UPLOADPATH . $row['image2'] .'"><img src="'. GW_UPLOADPATH . $row['image2'] .'" alt="image2"width="500px"/></a>';

	} 	elseif (is_file(GW_UPLOADPATH . $row['image1']) > 0) {
		//all 1 images exist
	echo '<td class="memberpostimage"><a href="'. GW_UPLOADPATH . $row['image1'] .'"><img src="'. GW_UPLOADPATH . $row['image1'] .'" alt="image1"width="500px"/></a>';	
	
	}
		else {
		echo '<td class="memberpostimage"><img src="' . GW_UPLOADPATH . 'holder.png' . '" alt="Score image"width="500px"/>';
	}
	echo '<h3>By '. $row['name'] . '</h3><br />';
	echo "</tr>";
	echo "</div>";

  }
  
  	echo "</table>";

     mysqli_close($dbc); 

  ?>
			
     </div>
	  <footer>
     <p>&copy; Copyright  by Olly Blake</p>
    </footer>

	 </body>
</html>