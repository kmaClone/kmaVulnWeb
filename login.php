<b> <center> Public login page </center> </b> </br> </br>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$myusername=addslashes($_POST['username']);
$mypassword=addslashes($_POST['password']);

if($_COOKIE["isadmin"]=="True")
{
echo "The CAPTCHA is strong with this one.  This maybe helpful someday.";
};

setcookie("isadmin","False");

if(($myusername=="hacker" && $mypassword=="hacker")||($myusername=="admin" && $mypassword=="qwerty"))
{
echo "Login Successful!
Try to set cookie value equal to 'isadmin'
";
exit();
}

else
{
echo "Sorry.  The username or password is incorrect.";
$error="Your Login Name or Password is invalid";
}

}
?>

<form action="/login.php" method="post">
<label>UserName :</label>
<input type="text" name="username"/><br />
<label>Password :</label>
<input type="password" name="password"/><br/>
<input type="submit" value=" Submit "/><br />
</form>

<a href="/"> HOME PAGE </a><br>
