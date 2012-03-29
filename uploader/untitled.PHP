<?php
require_once 'appvars.php';
    if (isset($_FILES['files'])) {
$allowed_types=array(
    'image/gif',
    'image/jpeg',
    'image/png',
);


$sscount = $_POST['imgcount'];
if($sscount>0){
    for($i = 1; $i <= $sscount; $i++){

        if (in_array($_FILES["files"]["type"][$i], $allowed_types) && 
            ($_FILES["files"]["size"][$i] < 500000))
        {
                  //MOVE THE FILES TO UPLOAD FOLDER
                  foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
                  move_uploaded_file($tmp_name, "upload/{$_FILES['files']['name'][$key]}");

        }

    }
}


}
}

?>

 <!DOCTYPE HTML>

    <html>
    <head><title>Test UPLOADER</title></head>
    <body>
      <div>
          <?php

          if (isset($errors)) {
            if(empty($errors)){

              //this is confirmation that it worked!
              echo 'it worked!';


            } else{
              foreach ($errors as $error) {
                echo $error;
              }
            }
          }

          ?>
      </div>
    <table cellspacing="0" frame="void" rules="rows">
     <form enctype="multipart/form-data" method="post" action="">
       	<tr>
               <td class="memberpostinfo">
               	<h1>New post</h1><br /><br />

                    <input type="file" name="files[]" /> 
                    <input type="file" name="files[]" /> 
                    <input type="file" name="files[]" /> 
					<strong>Submit to blog?</strong>
					<div class="discription">
					<td class="memberpostimage"><img src="images/holder.png" alt="Score image"width="500px"/>
                    </div>
                    </td>
        </tr>
        </table>
    <hr />
    <input type="submit" value="Add" name="Upload" />
  </form>
    </body>
    </html>