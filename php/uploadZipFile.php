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
echo ("<a href="../index.php">Return to main menu</a>");
?>