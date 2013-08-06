<?php
echo "in GetOrganizations.php and Starting login:  <br />"; 
// Testing a problem with this plug in 
//require_once 'loginLocal.php';
//require_once 'loginRemote.php';
require_once 'login.php';
echo "back to getOrganizaions <br />";
$db_server = mysql_connect($db_hostname,$db_username,$db_password);
if (!$db_server) die("unable to connecto to MySQL : " . mysql_error());
echo "Into the server $db_hostname <br /> ";
mysql_select_db($db_database)
	or die ("Unable to select databse: " . mysql_error());
echo "  and connected to :  $db_database database. " ;

$query = "SELECT * FROM organizations";
$result = mysql_query($query);
if (!$result) die ("Databse access failed: ". mysql_error());
echo " now the table <br />";
$rows = mysql_num_rows($result);
echo '<br /> <br />';
for ($j = 0; $j < $rows ; ++$j)
{
    
    echo 'Org_ID: ' . mysql_result ($result, $j, 'Org_ID') . '<br />  ';
    echo 'Name: ' . mysql_result ($result, $j, 'Name') . '<br />';
    echo 'contact_person: ' . mysql_result ($result, $j, 'contact_person') . '<br />';
    echo 'contact_email: ' . mysql_result ($result, $j, 'contact_email') . '<br />';

    echo 'website: ' . mysql_result ($result, $j, 'website') . '<br />';
    echo 'address1: ' . mysql_result ($result, $j, 'address1') . '<br />';
    echo 'address2: ' . mysql_result ($result, $j, 'address2') . '<br />';
    echo 'city: ' . mysql_result ($result, $j, 'city') . '<br />';

    echo 'state: ' . mysql_result ($result, $j, 'state') . '<br />';
    echo 'postal_code: ' . mysql_result ($result, $j, 'postal_code') . '<br />';
    echo 'country: ' . mysql_result ($result, $j, 'country') . '<br />';
    echo 'phone: ' . mysql_result ($result, $j, 'phone') . '<br /> <br />';
    
}
?>
  