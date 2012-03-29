<?php
require_once 'appvars.php';
    if (isset($_FILES['files'])) {


   $uploaded = 0;
   $message = array();
   $images = $_FILES['files'];
//   $allowed_types=array(
//    'image/gif',
//    'image/jpeg',
//    'image/png',
//);
  
   foreach ($images['name'] as $i => $name) {
       
        if ($images['error'][$i] == 4) {
            continue; 
        }

       
        if ($images['error'][$i] == 0) {
           
             if ($images['size'][$i] > GW_MAXFILESIZE) {
                $message[] = "$name exceeded file limit.";
                continue;  
             }
                foreach ($images['tmp_name'] as $key => $tmp_name) {
                  move_uploaded_file($tmp_name, "upload/{$images['name'][$key]}");

            } 
            
             $uploaded++;
        }

      
   }
//              if (!in_array($_FILES["files"]["type"][$i], $allowed_types) {
//               $message[] = "$name is the wrong file type.";
//              continue; 
//              }
  


}

?>

 <!DOCTYPE HTML>

    <html>
    <head><title>Test UPLOADER</title></head>
    <body>
      <div> 
  <?php
   print_r($images['name'][$i]);
   echo $uploaded . ' files uploaded.';
  
   foreach ($message as $error) {
      echo $error;
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
        </tr>
        </table>
    <hr />
    <input type="submit" value="Add" name="Upload" />
  </form>
    </body>
    </html>