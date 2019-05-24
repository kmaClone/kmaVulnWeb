<?php
include("dbinfo.inc.php");
$con = mysqli_connect('localhost',$username,$password);
@mysqli_select_db($con, $database) or die( "Unable to select database");
$query="SELECT * FROM instructors";
$result=mysqli_query($con, $query);

$num=mysqli_num_rows($result); 

mysqli_close($con);

echo "<b><center>Database Output</center></b><br><br>";

?>
<table border="1" cellspacing="2" cellpadding="4">
<tr> 
<th><font face="Arial, Helvetica, sans-serif">Instructor Num</font></th>
<th><font face="Arial, Helvetica, sans-serif">Name</font></th>
<th><font face="Arial, Helvetica, sans-serif">Hobbies</font></th>
<th><font face="Arial, Helvetica, sans-serif">Quotes</font></th>
</tr>

<?php
// $i = $row
$i=0;
while ($i = mysqli_fetch_assoc($result)) {
$inid = $i['instructorid'];
$name = $i['name'];
$hobbies = $i['hobbies'];
$quotes = $i['quotes'];
//var_dump($i);exit;
?>

<tr> 
<td><font face="Arial, Helvetica, sans-serif"><?php echo "$inid"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo "$name"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo "$hobbies"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo "$quotes"; ?></font></td>
</tr>
<?php
++$i;
} 
echo "</table>";


?>
