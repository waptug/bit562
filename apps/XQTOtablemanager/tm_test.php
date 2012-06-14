<?php

$CONFIG['debug'] = 'on'; // on or off, if it is on all mysql errors will be reported

$CONFIG['dbhostname'] = 'localhost';
$CONFIG['dbusername'] = 'root';
$CONFIG['dbpassword'] = '';
$CONFIG['dbname'] = 'bit561';

// connect to the database
$db = mysql_connect($CONFIG['dbhostname'],$CONFIG['dbusername'],$CONFIG['dbpassword']) or displayerror('could not connect');
mysql_select_db($CONFIG['dbname'],$db);

// the name of the mysql database table
$CONFIG['tablename'] = 'test';

// a descriptive name given to a single record table, e.g Product, Customer, News Article etc
$CONFIG['recordname'] = 'Test';

// the field name of the primary key in the database table
$CONFIG['primarykey'] = 'test_ID';

// the field name of the field which will be used to search for records
$CONFIG['searchfield'] = 'description';

$CONFIG['title'] = 'Test results report <a href="../../index.php">Main Menu</a>';

$CONFIG['pagesize'] = 100; // how many records per page?


$FIELDS['test_ID']['description'] = 'Test ID';
$FIELDS['test_ID']['listdisplay'] = 1;
$FIELDS['test_ID']['editdisplay'] = 0; 
$FIELDS['test_ID']['editable'] = 0; 
$FIELDS['test_ID']['type'] = 'input';
$FIELDS['test_ID']['length'] = 10;
$FIELDS['test_ID']['required'] = 0;
$FIELDS['test_ID']['explanation'] = '';

$FIELDS['description']['description'] = 'Description';
$FIELDS['description']['listdisplay'] = 1;
$FIELDS['description']['editdisplay'] = 1;
$FIELDS['description']['editable'] = 1; 
$FIELDS['description']['type'] = 'input';
$FIELDS['description']['length'] = 60;
$FIELDS['description']['required'] = 1;
$FIELDS['description']['explanation'] = '';

$FIELDS['success']['description'] = 'Test success';
$FIELDS['success']['listdisplay'] = 1;
$FIELDS['success']['editdisplay'] = 1;
$FIELDS['success']['editable'] = 1; 
$FIELDS['success']['type'] = 'text';
$FIELDS['success']['length'] = 200;
$FIELDS['success']['required'] = 0;
$FIELDS['success']['explanation'] = '';
$FIELDS['success']['listdisplaysize'] = '20';

$FIELDS['entryDate']['description'] = 'Entry Date';
$FIELDS['entryDate']['listdisplay'] = 1;
$FIELDS['entryDate']['editdisplay'] = 1;
$FIELDS['entryDate']['editable'] = 1; 
$FIELDS['entryDate']['type'] = 'input';
$FIELDS['entryDate']['length'] = 100;
$FIELDS['entryDate']['required'] = 0;
$FIELDS['entryDate']['explanation'] = '';



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $CONFIG['title']; ?></title>
</head>

<body>

<?php include('tm_files/tablemanager.php'); ?>

</body>
</html>
