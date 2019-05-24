
<b> <center> UPCOMING CLASSES </center> </b> </br> </br>

<img src=./mm.jpg><br><br>

<form action="classlist.php" method="get">
Filter: <input type="text" name="filter" />
<input type="submit" />
</form>

<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include("dbinfo.inc.php");
$con = mysqli_connect('localhost',$username,$password);
//var_dump($con);
//var_dump($database);
@mysqli_select_db($con,$database) or die( "Unable to select database");

if (!$_REQUEST["filter"]) 
     $query="SELECT * FROM classes";
else
     $query="SELECT * FROM classes where name like '%" . $_REQUEST['filter']."'";
     //$filter = $_REQUEST["filter"];
     //$query="SELECT * FROM classes where name like % $filter";

echo $query;
$result=mysqli_query($con, $query);

$num=mysqli_num_rows($result); 

mysqli_close($con);
?>
<table border="0" cellspacing="2" cellpadding="2">
<tr> 
<th><font face="Arial, Helvetica, sans-serif">ID</font></th>
<th><font face="Arial, Helvetica, sans-serif">Name</font></th>
<th><font face="Arial, Helvetica, sans-serif">Date</font></th>
<th><font face="Arial, Helvetica, sans-serif">Location</font></th>
</tr>

<?php
// $i = $row
$i=0;
while ($i = mysqli_fetch_assoc($result)) {
$id = $i['ID'];
$name = $i['name'];
$date = $i['date'];
$location = $i['location'];
//var_dump($i);exit;

?>

<tr> 
<td><font face="Arial, Helvetica, sans-serif"><?php echo "$id"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo "$name"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo "$date"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo "$location"; ?></font></td>
</tr>
<?php
++$i;
} 
echo "</table>";

?>

<a href="/"> HOME PAGE </a><br>
<br><br><br><br>Copyright 2019 - All rights reserved

