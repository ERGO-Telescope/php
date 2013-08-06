<?php
//echo "In setEvents2.php <br />";   
//require_once 'login.php';  
require_once '../login.php';  
echo "</br > setEvent here... ";

$mac = $_GET["mac"];

$instring = $_GET["lat"];
$rightside = substr($instring,-7);
$leftside = substr($instring,0,strlen($instring)-7);
$Latitude= $leftside.=".";// M A K E   T H I S   S H I T  S M A R T E R   
$Latitude .=$rightside;

$instring = $_GET["lon"];
$rightside = substr($instring,-7);
$leftside = substr($instring,0,strlen($instring)-7);
$Longitude= $leftside.="."; 
$Longitude .=$rightside;
 
$instring = $_GET["hMSL"];
$rightside = substr($instring,-3);
$leftside = substr($instring,0,strlen($instring)-3);
$Mean_Sealevel= $leftside.="."; 
$Mean_Sealevel .=$rightside;

$Week_Number= $_GET["wnR"];


$instring = $_GET["towMsR"];
$rightside = substr($instring,-3);
$leftside = substr($instring,0,strlen($instring)-3);
$towMsR = $leftside.="."; 
$towMsR .=$rightside;

$towSubMsR = $_GET["towSubMsR"];
$Rising_Edge = $towMsR.$towSubMsR;

$analog = $_GET["analog"];


$db_server = mysql_connect($db_hostname,$db_username,$db_password);
if (!$db_server) die("unable to connecto to MySQL : " . mysql_error());
//echo "Into the server $db_hostname <br /> ";
mysql_select_db($db_database)
	or die ("Unable to select databse: " . mysql_error());

//echo "  and connected to :  $db_database database. " ;
 
$UTCtime = gmdate("Y/m/d H:i:s", time()); // Generate UTC date/time for the post
 
$query = "SELECT * FROM pixels";
$result = mysql_query($query);

$NumRows = mysql_num_rows($result);
//echo " <br />There are $NumRows rows. <br />";

for ($j =0; $j < $NumRows; ++$j)
{
    $OneRow = mysql_fetch_row($result);
    //  echo "mac: $OneRow[2] <br />"  ; 
    $OneMAC = $OneRow[2];
    //echo ("<br />OneMAC: $OneMAC  ");
    if($OneMAC == $mac)
    {
       // echo ("   FOUND <br />  "); 
              
        $query = "INSERT INTO events (UTC, MAC,Latitude,Longitude,Mean_Sealevel,Week_Number,Rising_Edge,analog)
                              VALUES('$UTCtime', '$mac','$Latitude','$Longitude','$Mean_Sealevel','$Week_Number','$Rising_Edge','$analog')";//  
        
        if (!mysql_query($query,$db_server))
        {
            echo "INSERT failed; $query <br />". mysql_error() . " <br /><br />";
        }
        else
        {
            echo "Insert Complete: ";
        }
        
        $query = "UPDATE pixels SET last_seen=NOW() WHERE mac='$mac'";  
       //   $query = "UPDATE pixels SET last_seen=LOCALTIMESTAMP() WHERE mac='$mac'";  
        if (!mysql_query($query,$db_server))
        {
            echo "UPDATE failed; $query <br />". mysql_error() . " <br /><br />";
        }
        else
        {
            echo "UPDATE Complete: ";
        }
       
    }
    
}
// =====================================================================   =======

?>