
<?php
// Working form a project folder now
// echo "In getEvents.php and Starting login  <br />";

require_once 'login.php';
$db_server = mysql_connect($db_hostname,$db_username,$db_password);
if (!$db_server) die("unable to connecto to MySQL : " . mysql_error());
echo "Into the server $db_hostname <br /> ";
mysql_select_db($db_database)
	or die ("Unable to select databse: " . mysql_error());
echo "  and connected to :  $db_database database. " ;

$query = "SELECT * FROM events";
$result = mysql_query($query);
if (!$result) die ("Databse access failed: ". mysql_error());
echo " now the table <br />";
$rows = mysql_num_rows($result);
echo '<br /> <br />';
for ($j = 0; $j < $rows ; ++$j)
{
    
    echo 'time_stamp: ' . mysql_result ($result, $j, 'time_stamp') . '<br />';
    echo 'mac: ' . mysql_result ($result, $j, 'mac') . '<br />';
    
    echo 'latitude: ' . mysql_result ($result, $j, 'latitude') . '<br />';
    echo 'longitude: ' . mysql_result ($result, $j, 'longitude') . '<br />';
    echo 'wnR: ' . mysql_result ($result, $j, 'wnR') . '<br />';
    echo 'towMsR: ' . mysql_result ($result, $j, 'towMsR') . '<br />';
    echo 'towSubMsR: ' . mysql_result ($result, $j, 'towSubMsR') . '<br /><br />';
    
}
?>
  