<?php
/* Old code by msm
$dir = "/xampp/htdocs/bit562/php/";
$destinationdir = "/xampp/htdocs/bit562/doc/";
$filelist = array();
$row = array();
$rowdesc = array();
$i = 0;
$rowdesc[0]="object_ID";
$rowdesc[1]="source";
$rowdesc[2]="destination";
$rowdesc[3]="name";
$rowdesc[4]="description";
$rowdesc[5]="entryDate";
//ignore folders and just deal with files.
//
// Open a known directory, and proceed to read its contents
echo ("source dir=".$dir."</br>");
echo ("destination dir=".$destinationdir."</br>");
echo ("</br>");
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
        $filetypes=filetype($dir.$file);
        echo $filetypes;
        if ($filetypes == "file"){
        echo "Record#".$i."</br>";
        //echo $dir.$file . ",".$dir . $file . ".html"."\n"."<br/>";
        $row[0]="some id number";      
        $row[1]=$dir.$file;
        $row[2]= $destinationdir.$file.".html";
        $row[3]= $file;
        $row[4]= "This is a ".filetype($dir.$file);
        $row[5]= date("F j, Y, g:i a");
        //$filelist[$i] = ($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
        }
/*
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->projectFiles[] = new ProjectFile($row['object_ID'],
                $row['source'],
                $row['destination'],
                $row['name'],
                $row['description'],
                $row['entryDate']);
        
            //creat projectfile object and put it in the projectfile array.
            //arrayname[file1.php,file2.php]
        
        $i++;
        for ($a=0;$a<6;$a++){
            echo $rowdesc[$a]."=".$row[$a]."</br>";
            }
        echo "</br>";
        
        }
        closedir($dh);
    }
}
   else echo ("not a directory");

 //End of code by msm 
*/   

require_once("/xampp/htdocs/bit561/php/ProjectFile.php");

function isAutoDocFile($extension) {
    $legalExtensions = array( "php" => true, "html" => true, "js" => true, "css" => true );
    if ( isset($legalExtensions[$extension])) {
        return $legalExtensions[$extension];
    } else {
        return false;
    }
}

// Part of the Reader object in the final method form. It will be "$this->projectFiles[]".
$projectFiles = array(); 
$folders = array( "/xampp/htdocs/bit562/classes/", 
                        "/xampp/htdocs/bit562/doc/", 
                        "/xampp/htdocs/bit561/php/");
$targetDirectory = "/xampp/htdocs/bit562/doc/";

// Examine folders, one at a time, in the outer loop.
for( $i = 0, $len=count($folders); $i < $len; $i+=1 ) {
    if (is_dir($folders[$i])) {    
        $dirHandle = opendir($folders[$i]);
        if ( $dirHandle ) {  

            // Find all the project files in the $i directory.
            while ($file = readdir($dirHandle)) {
                $filePieces = pathinfo($folders[$i].$file);
                if (isset($filePieces['extension']) && isAutoDocFile($filePieces['extension'])) {
                    $source = $folders[$i].$filePieces['basename'];
                    $destination = $targetDirectory.$filePieces['filename'].".html";
                    $projectFiles[] = new ProjectFile('xxxxx-xxxxx-xxxxx-xxxxx',
                            $source,
                            $destination,
                            "Filename captured by reading directories",
                            "Filename captured by reading directories",
                            date('Y-m-d H:i:s') );
                }
            }
        }
        closedir($dirHandle);
    } else {
        // Do something about the error case.
        echo 'It is a big $folders problem.<br />';
    } 
}

  
   
  

?>
