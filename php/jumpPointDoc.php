<?php

require_once('Reader.php');
require_once('DBManager.php');
require_once('db_login.php');

$db_dsn = "mysql:host={$db_host};dbname={$db_database}";
echo $db_dsn;
$databaseManager = new DBManager($db_dsn, $db_username, $db_password);
$databaseManager->open();
$databaseManager->test("data base is opened");
// $databaseManager->assertToggle();
 $reader = new Reader($databaseManager);
 $databaseManager->test("Reader Open");
//$reader->retrieveProjectFiles('BIT561');
//$reader->readFiles('');
  $reader->readSelectDirectoriesForFileNames();
  $databaseManager->test("Coming out of new directories.");
$results = $reader->readAndWriteProject();


if (count($results) >= 1) {
    $databaseManager->assertToggle();
    $numResults = count($results);
    for ($i = 0; $i < $numResults; $i++) {
        $databaseManager->assert($results[$i]['success'],$results[$i]['description']);
    }
    $result = '@true@';
} else {
    $result = '@false@';
}

$projectFiles = $reader->getProjectFiles();
$outputFilename = $projectFiles[0]->getDestination();
$lastSlashPos = strrpos($outputFilename, '/');
if (!$lastSlashPos){ $lastSlashPos = strrpos($outputFilename, '\\'); }
$outputFilePath = substr($outputFilename,0,$lastSlashPos);
$outputIndexFilePath = $outputFilePath . '/index.html';
$reader->writeProjectFilesIndexPage();
?>


<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
  </head>
  <body>
    <h2>The jumpPoint run was successful.</h2>
    <p>The result is <?php echo $result; ?>.</p>
    <p>Please see the results on this index page: <a href="<?php echo $outputIndexFilePath ?>"><?php echo $outputIndexFilePath ?></a></p>
  </body>
</html>
