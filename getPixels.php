<?php
// Test Test Test
//echo "in GetPixels.php and Starting login: <br />";

require_once 'login.php';

 
$db_server = mysql_connect($db_hostname,$db_username,$db_password);
if (!$db_server) die("unable to connecto to MySQL : " . mysql_error());
echo "Into the server $db_hostname <br /> ";
mysql_select_db($db_database)
	or die ("Unable to select databse: " . mysql_error());
echo "  and connected to :  $db_database database. " ;

$query = "SELECT * FROM pixels";
$result = mysql_query($query);
if (!$result) die ("Databse access failed: ". mysql_error());
echo " now the table <br />";
$rows = mysql_num_rows($result);
echo '<br /> <br />';
for ($j = 0; $j < $rows ; ++$j)
{
    
    echo 'Org_ID: ' . mysql_result ($result, $j, 'Org_ID') . '<br />';
    echo 'mac: ' . mysql_result ($result, $j, 'mac') . '<br />';
    echo 'birthday: ' . mysql_result ($result, $j, 'birthday') . '<br />';

    echo 'first_light: ' . mysql_result ($result, $j, 'first_light') . '<br />';
    echo 'last_seen: ' . mysql_result ($result, $j, 'last_seen') . '<br /><br />';
    echo 'pixelType: ' . mysql_result ($result, $j, 'pixelType') . '<br />';
    echo 'shieldType: ' . mysql_result ($result, $j, 'shieldType') . '<br /><br />';
    
    
}
?>
  