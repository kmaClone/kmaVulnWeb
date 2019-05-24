<b> <center> DETAILED OUTPUT UPCOMING CLASSES </center> </b> </br> </br>

<img src=./mm.jpg><br><br>

<form action="classdetails.php" method="post">

<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include("dbinfo.inc.php");
$con = mysqli_connect('localhost',$username,$password);
@mysqli_select_db($con,$database) or die( "Unable to select database");
echo "Filter: <select name=\"filter\">";
echo "<option value=\"\">Select Value</option>";
$strQuery = "select name from instructors order by name asc";
$rsrcResult = mysqli_query($con,$strQuery);
while($arrayRow = mysqli_fetch_assoc($rsrcResult))
{
    $opt = $arrayRow["name"];
    echo "<option value=\"$opt\">$opt</option>";
};
echo "</select>";
?>

<input type="submit" />
</form>


<?php

if (!$_REQUEST["filter"]) 
     $query="SELECT classes.name as classname, instructors.name as iname, classes.date, classes.location FROM classes, instructors where classes.instructorid = instructors.instructorid";
else
     $query="SELECT classes.name as classname, instructors.name as iname, classes.date, classes.location FROM classes, instructors where classes.instructorid = instructors.instructorid and instructors.name ='".$_REQUEST["filter"]."'";

echo $query;
$result=mysqli_query($con,$query);

$num=mysqli_num_rows($result); 

mysqli_close($con);
?>
<table border="0" cellspacing="2" cellpadding="2">
<tr> 
<th><font face="Arial, Helvetica, sans-serif">Instructor</font></th>
<th><font face="Arial, Helvetica, sans-serif">Name</font></th>
<th><font face="Arial, Helvetica, sans-serif">Date</font></th>
<th><font face="Arial, Helvetica, sans-serif">Location</font></th>
</tr>

<?php
// $i = $row
$i=0;
while ($i = mysqli_fetch_assoc($result)) {
$id = $i['iname'];
$name = $i['classname'];
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
