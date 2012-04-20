<?php

/* uploadZipFile.php */
echo("Create an interface to allow a user to upload a.zip file of code files for parsing.
Program will ask for a e-mail address to send back the procressed files as a .zip file.
- system will create a unique working folder using the session id with a salt
- system will copy the .zip into this folder and extract the files.
- system will transverse the extraced files and run them all through the parser system creating a new result folder named as the session id with a key id of the user
- system will then zip up that folder when it is done parsing the working folder then e-mail the payload back to the user that requested it.
- system will send link to parsed document folder for display on-line
- system will request a donation from the user after the work is done.");

?>