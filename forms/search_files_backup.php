<?php
ob_start();
//$allowed = array("173.10.77.38", "50.132.74.71","127.0.0.1","localhost") ;
$allowed = array("50.132.115.191") ;//List of ip addresses allowed to access this script to keep the whole internet from getting total access to your file code.
/* start version checking but not using this
$myversion = array("major" => "1", "minor" => "6") ;
if ($_GET['show'] == "version") {
  die("\$version = " . var_export($myversion, true) . ";") ;
}else if($_GET['show'] == "download") {
   $t = file("search_files.php") ;
   echo (implode("", $t)) ;
   die() ;
}else if($_GET['show'] == "update") {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://host.rootmonster.com/tools/search_files.php?show=download");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  ob_start() ;
  curl_exec($ch);
  $tmp = ob_get_clean() ;
  curl_close($ch);
  $h = fopen("search_files.php", "w") ;
  fwrite($h, $tmp) ;
  fclose($h) ;
  die("Update Successful<br><a href=\"search_files.php\">&lt;&lt; Back</a>") ;
}else{
  // create a new curl resource
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://host.rootmonster.com/tools/search_files.php?show=version");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  ob_start() ;
  curl_exec($ch);
  $tmp = ob_get_clean() ;
  curl_close($ch);
  eval($tmp) ;
  $versionmatch = true ;
  foreach ($version as $k => $v) {
    if ($myversion[$k] != $v) $versionmatch = false ;
  }
  if (!$versionmatch) {
    $versionmsg = <<<EOF
    <div class="versionmsg">
      <h3>Your version may be out of date</h3>
      <ul>
        <li>Current Version: {$version['major']}.{$version['minor']}</li>
        <li>Your Version: {$myversion['major']}.{$myversion['minor']}</li>
        <li><a href="search_files.php?show=update">Click to update</a></li>
      </ul>
    </div>
EOF;
  }else{
   $versionmsg = "" ;
  }
}
*/
//if (in_array($_SERVER['REMOTE_ADDR'], $allowed)) die('no access allowed. You will need to add your ip address to the allowed array') ;
$file_extensions = array(".php",
                         ".js",
                         ".css",
                         ".tpl",
                         ".txt",
                         ".inc",
                         ".ini",
                         ".html",
                         ".htm",
                         ".phtml",
                         ".xml",
                         ".htaccess",
                         "all") ;
$bf = array() ;
if (!is_array($_POST['file_types'])) {
  if (strlen($_POST['file_types']) == 0) {
    $_POST['file_types'] = array(".php", ".js", ".css", ".html") ;
  }else{
    $_POST['file_types'] = array($_POST['file_types']) ;
  }
}
foreach ($file_extensions as $k => $v) {
  $select = in_array($v, @$_POST['file_types']) ? ' selected="selected"' : "" ;
  $bf[] = "<option value=\"{$v}\"{$select}>{$v}</option>" ;
}
$file_extension = in_array("all", $_POST['file_types']) ? "all" : $_POST['file_types'] ;

function find_files($path, $pattern, $callback) {
  $path = rtrim(str_replace("\\", "/", $path), '/') . '/';
  $matches = Array();
  $entries = Array();
  $dir = dir($path);
  while (false !== ($entry = $dir->read())) {
    $entries[] = $entry;
  }
  $dir->close();
  foreach ($entries as $entry) {
    $fullname = $path . $entry;
    if ($entry != '.' && $entry != '..' && is_dir($fullname)) {
      find_files($fullname, $pattern, $callback);
    } else if (is_file($fullname)) {
      $GLOBALS['cnt_files']++ ;
      if (preg_match($pattern, $entry)) {
        call_user_func($callback, $fullname);
      }
    }
  }
}

function echoFile($name) {
  $GLOBALS['cnt_fount']++ ;
  echo '<li>' . $name . "</li>" ;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?= $_SERVER['HTTP_HOST'] ?> : SEARCH ALL FILES</title>
<style type="text/css">
<!--
BODY {
  margin:0px;
  padding:0px;
	font-family: Arial, Helvetica, sans-serif;

}
#label {
  font-weight:700;
  width:150px;
  float:left;
}
.fileopenerr {
  margin-left:20px;
  color:#791315;
}
.filecount {
  margin:50px 0px 50px 20px;
  color:#6A1676;
  font-weight:600;
  font-size:12pt;
  border-top:1px dashed #6A1676;
  width:500px;
  line-height:50px;
}
.filehead {
  margin:50px 0px 10px 20px;
  color:#6A1676;
  font-weight:600;
  font-size:12pt;
  border-bottom:1px dashed #6A1676;
  width:500px;
  line-height:50px;
}
.filename {
  margin:20px 0px 0px 20px;
  /*width:150px;*/
  color: #2C6A22;
  font-weight:600;
  font-size:12pt;
}
.headerline {
  margin-left:20px;
  width:500px;
  color:#2C6A22;
  margin-bottom:20px;
}
.filestr {
  margin-left:40px;
  font-size:10pt;
  margin-top:10px;

}
.versionmsg h3 {
  font-size:12px;
  margin:10px 0px 0px 20px;
  color:#F00;
}
.versionmsg li {
  list-style:circle outside;
  font-size:10px;
  color:#F00;
}

.versionmsg ul {
  margin-top:0px;
}

-->
</style>
</head>
<?= $versionmsg; ?>
<form action="search_files.php" method="post">
<div style="padding: 10px ;">
  <div id="label">Search In:</div>
  <div><input type="text" name="directory" value="<?= (@$_POST['directory']) ? $_POST['directory'] : $_SERVER['DOCUMENT_ROOT']; ?>" style="width:300px;"></div>
</div>
<div style="clear:both;"></div>
<div style="padding: 10px ;">
  <div id="label">File Types:</div>
  <div>
    <select name="file_types[]" multiple style="width:300px;height:100px;">
      <?= implode("\n", $bf); ?>
    </select>
  </div>
</div>
<div style="clear:both;"></div>
<div style="padding: 10px ;">
  <div id="label" style="width:400px;">Search:&nbsp;&nbsp;<span style="font-weight:normal;"><input type="checkbox" name="find_files" value="true"<?= @$_POST['find_files'] == "true" ? ' checked="checked"' : ''; ?> />&nbsp;Search for filename (allows regex patterns)</span></div>
  <div style="width:400px;"><input type="text" name="search" value="<?= @htmlentities(stripslashes($_POST['search'])); ?>" style="width:300px;"><input type="submit" name="submit" value="submit"></div>
</div>
<div style="clear:both;"></div>
</form>
<?php
ini_set( 'max_execution_time', -1) ;
ini_set( 'max_input_time', -1) ;
ini_set( 'memory_limit', -1) ;

$directory = @$_POST['directory'] ;
$needle = urldecode(stripslashes(@$_POST['search'])) ;
if (!empty($needle)) {
  if (@$_POST['find_files'] == "true") {
    $header = ob_get_contents() ;
    ob_clean() ;
    echo "<div><ul>" ;
    $GLOBALS['cnt_fount'] = 0 ;
    $GLOBALS['cnt_files'] = 0 ;
    find_files($directory, '/' . $needle . '/i', "echoFile") ;
    echo "</ul></div>" ;
    if ($GLOBALS['cnt_fount'] == 0) {
      echo "<div class=\"filecount\">No matches found for search string: {$needle}</div>";
    }else{
      echo "<div class=\"filecount\">Found: {$GLOBALS['cnt_fount']} matches.</div>" ;
    }
    
    $header .= '<div class="filehead">Searching: ' . $GLOBALS['cnt_files'] . ' files for: ' . $needle . '</div>' . "\n\n" ;
  

  }else{
    
  $search_subs = true ;
  function return_dirs($_path) {
    $_tmp = array() ;
    $_dirs = dir($_path) ;
    if ($_dirs) {
      while ($file = $_dirs->read()) {
        if ($file != "." && $file != "..") {
          if (is_dir($_path . '/' . $file)) {
            $_tmp[] = "{$_path}/{$file}/" ;
            $_tmp = array_merge ($_tmp, return_dirs($_path . '/' . $file)) ;
          }
        }
      }
      $_dirs->close();
    }
    return ($_tmp) ;
  }
  
  if ($directory) {
    $directory_array = array() ;
    $check_directory = array($directory . "/") ;
    if ($search_subs) {
      $check_directory = array_merge($check_directory, return_dirs($directory)) ;
    }else{
  
    }
    sort($directory_array) ;
    for ($i = 0, $n = sizeof($check_directory); $i < $n; $i++) {
      $dir_check = $check_directory[$i];
      if ($dir = @dir($dir_check)) {
        while ($file = $dir->read()) {
          if (!is_dir($dir_check . $file)) {
            if (@in_array(substr($file, strrpos($file, '.')), $file_extension) || $file_extension == "all") {
              $directory_array[] = $dir_check . $file;
            }
          }
        }
        if (sizeof($directory_array)) {
          sort($directory_array);
        }
        $dir->close();
      }
    }
  
    // show path and filename
    $header = ob_get_contents() ;
    ob_clean() ;
    $header .= '<div class="filehead">Searching:' . sizeof($directory_array) . ' files for: ' . $needle . '</div>' . "\n\n";
  
    // check all files located
    $file_cnt = 0;
    $cnt_found = 0;
    $file_found = 0 ;
    for ($i = 0, $n = sizeof($directory_array); $i < $n; $i++) {
      //$cnt_lines = 0 ;
    // build file content of matching lines
      $file_cnt++;
      $file = $directory_array[$i];
      // clean path name
      while (strstr($file, '//')) $file = str_replace('//', '/', $file);
  
      $show_file = array();
  
      if (file_exists($file)) {
  
        // put file into an array to be scanned
        $lines = file($file);
        $found_line = 'false';
        // loop through the array, show line and line numbers
        if (!$lines) {
          //$header .= '<div class="fileopenerr">Unable to Open File [' . $file . ']</div>' ;
          continue ;
        }
        $cnt_lines=0;
        foreach ($lines as $line_num => $line) {
          $cnt_lines++;
          if (strstr(strtoupper($line), strtoupper($needle))) {
            $found_line= 'true';
            $found = 'true';
            $cnt_found++;
            $show_file[] = "Line #<strong>" . ($line_num + 1) . "</strong> : " . htmlspecialchars($line);
          } else {
            if ($cnt_lines >= 5) {
    //            $show_file .= ' .';
              $cnt_lines=0;
            }
          }
        }
  
      }
  
      // if there was a match, show lines
      if ($found_line == 'true') {
         $file_found++ ;
        echo '<div class="filename">' . $file . '</div><div class="filestr">', implode("<br />", $show_file), "</div>" ;
      } // show file
    }
    if ($cnt_found == 0) {
      echo "<div class=\"filecount\">No matches found for search string: {$needle}</div>";
    }else{
      echo "<div class=\"filecount\">Found: {$cnt_found} matches in {$file_found} files.</div>" ;
    }
  }
  }
}
$buffer = ob_get_clean() ;
echo $header, $buffer ;
?>

</body>
</html>
