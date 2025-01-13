<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
</head>

<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
$sel="select * from tb_priest where priest_id='".$_SESSION["pid"]."'";
$row=$conn->query($sel);
$data=$row->fetch_assoc();


if(isset($_POST["btn_change"]))
{
	$new=$_POST["txt_new"];
	$confirm=$_POST["txt_confirm"];
	if(($new==$confirm)&&($_POST["txt_old"]==$data["priest_pass"]))
	{
		
     $pass=$_POST["txt_new"];
	$upQry="update tb_priest set priest_pass='$pass' where priest_id='".$_SESSION["pid"]."'";
	$conn->query($upQry);
	if($conn->query($upQry))
	{
		?>
        <script>
		alert("Password Changed");
		window.location="Passchangep.php";
        </script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("Password not changed");
		window.location="Passchangep.php";
        </script>
        <?php
	}
	}
	else
    {
		?>
        <script>
		alert("Passwords does not match");
		window.location="Passchangep.php";
        </script>
        <?php
	}
}
?>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1">
    <tr>
      <td>Old Password</td>
      <td><label for="txt_old"></label>
      <input type="text" name="txt_old" id="txt_old" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_new"></label>
      <input type="text" name="txt_new" id="txt_new" /></td>
    </tr>
    <tr>
      <td>Confirm New Password</td>
      <td><label for="txt_confirm"></label>
      <input type="text" name="txt_confirm" id="txt_confirm" /></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="btn_change" id="btn_change" value="Change Password" /></td>
    </tr>
  </table>
</form>
<?php
include("Foot.php");
?>
</body>
</html>