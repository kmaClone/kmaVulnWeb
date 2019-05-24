<b> <center> Private login page </center> </b> </br> </br>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$myusername=addslashes($_POST['username']);
$mypassword=addslashes($_POST['password']);

if(($myusername=="hacker" && $mypassword=="beast")||($myusername=="admin" && $mypassword=="lacrosse"))
{
echo "<font color='White'>Fail</font>Welcome!!<font color='White'>Fail</font>";
exit();
}
else
{
echo "<font color='White'>Success</font>Fail<font color='White'>Success</font>";
exit();
}
}
?>
<form action="/admin.php" method="post">
<label>UserName :</label>
<input type="text" name="username"/><br />
<label>Password :</label>
<input type="password" name="password"/><br/>
<input type="submit" value=" Submit "/><br />
</form>

<a href="/"> HOME PAGE </a><br>
