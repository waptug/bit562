<?php

/* uploadZipFile.php */
echo("uploadZipFile.php-Create an interface to allow a user to upload a.zip file of code files for parsing.<br/>
Program will ask for a e-mail address to send back the procressed files as a .zip file.<br/>
- system will create a unique working folder using the session id with a salt<br/>
- system will copy the .zip into this folder and extract the files.<br/>
- system will transverse the extraced files and run them all through the parser system creating a<br/>
 new result folder named as the session id with a key id of the user<br/>
- system will then zip up that folder when it is done parsing the working folder then e-mail<br/>
 the payload back to the user that requested it.<br/>
- system will send link to parsed document folder for display on-line<br/>
- system will request a donation from the user after the work is done.");
echo ("<a href='../index.php'>Return to main menu</a>");


function uploader($num_of_uploads=1, $file_types_array=array("txt"), $max_file_size=1048576, $upload_dir=""){
  if(!is_numeric($max_file_size)){
    $max_file_size = 1048576;
  }
  if(!isset($_POST["submitted"])){
    $form = "<form action='".$PHP_SELF."' method='post' enctype='multipart/form-data'>Upload files:<br /><input type='hidden' name='submitted' value='TRUE' id='".time()."'><input type='hidden' name='MAX_FILE_SIZE' value='".$max_file_size."'>";
    for($x=0;$x<$num_of_uploads;$x++){
      $form .= "<input type='file' name='file[]'><font color='red'>*</font><br />";
    }
    $form .= "<input type='submit' value='Upload'><br /><font color='red'>*</font>Maximum file length (minus extension) is 15 characters. Anything over that will be cut to only 15 characters. Valid file type(s): ";
    for($x=0;$x<count($file_types_array);$x++){
      if($x<count($file_types_array)-1){
        $form .= $file_types_array[$x].", ";
      }else{
        $form .= $file_types_array[$x].".";
      }
    }
    $form .= "</form>";
    echo($form);
  }else{
    foreach($_FILES["file"]["error"] as $key => $value){
      if($_FILES["file"]["name"][$key]!=""){
        if($value==UPLOAD_ERR_OK){
          $origfilename = $_FILES["file"]["name"][$key];
          $filename = explode(".", $_FILES["file"]["name"][$key]);
          $filenameext = $filename[count($filename)-1];
          unset($filename[count($filename)-1]);
          $filename = implode(".", $filename);
          $filename = substr($filename, 0, 15).".".$filenameext;
          $file_ext_allow = FALSE;
          for($x=0;$x<count($file_types_array);$x++){
            if($filenameext==$file_types_array[$x]){
              $file_ext_allow = TRUE;
            }
          }
          if($file_ext_allow){
            if($_FILES["file"]["size"][$key]<$max_file_size){
              if(move_uploaded_file($_FILES["file"]["tmp_name"][$key], $upload_dir.$filename)){
                echo("File uploaded successfully. - <a href='".$upload_dir.$filename."' target='_blank'>".$filename."</a><br />");
              }else{
                echo($origfilename." was not successfully uploaded<br />");
              }
            }else{
              echo($origfilename." was too big, not uploaded<br />");
            }
          }else{
            echo($origfilename." had an invalid file extension, not uploaded<br />");
          }
        }else{
          echo($origfilename." was not successfully uploaded<br />");
        }
      }
    }
  }
}


//uploader([int num_uploads [, arr file_types [, int file_size [, str upload_dir ]]]]);

//num_uploads = Number of uploads to handle at once.

//file_types = An array of all the file types you wish to use. The default is txt only.

//file_size = The maximum file size of EACH file. A non-number will results in using the default 1mb filesize.

//upload_dir = The directory to upload to, make sure this ends with a /

//This functions echo()'s the whole uploader, and submits to itself, you need not do a thing but put uploader(); to have a simple 1 file upload with all defaults.

?>