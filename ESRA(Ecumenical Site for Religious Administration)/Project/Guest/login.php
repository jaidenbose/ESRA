<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>
<?php
include("../Assets/Connection/Connection.php");
session_start();

if(isset($_POST["btn_insert"]))
{  
   $sel="select * from tb_family where fam_mail='".$_POST["txt_id"]."' and fam_pass='".$_POST["txt_pass"]."'";
   $rowFamily=$conn->query($sel);
   
   $selD="select * from tb_priest where priest_email='".$_POST["txt_id"]."' and priest_pass='".$_POST["txt_pass"]."'";
  $rowD=$conn->query($selD);
  
  $selAdmin="select * from tb_admin where admin_mail='".$_POST["txt_id"]."' and admin_pass='".$_POST["txt_pass"]."'";
  $rowAdmin=$conn->query($selAdmin);
  
 if($dataD=$rowD->fetch_assoc())
  {
	$_SESSION["pid"]=$dataD["priest_id"]; 
	$_SESSION["pname"]=$dataD["priest_name"];
	header("location:../Priest/Priesthomepage.php");  
  }
  	
   else if($dataAdmin=$rowAdmin->fetch_assoc())
  {
	$_SESSION["lgid"]=$dataAdmin["admin_id"]; 
	$_SESSION["lgname"]=$dataAdmin["admin_name"];
	header("location:../Admin/HomePage.php");  
  }
  
   else if($dataFamily=$rowFamily->fetch_assoc())
  {
	$_SESSION["lgid"]=$dataFamily["fam_id"]; 
	$_SESSION["lgname"]=$dataFamily["fam_name"];
  $_SESSION["lgemail"]=$dataFamily["fam_mail"];
	header("location:../Family/Famhomepage.php");  
  }
  
  
  else
  {
		?>
        <script>
		alert("Username and Password doesn't match");
		//window.location="Login.php";
        </script>
        <?php
	}
}


include("Head.php");
?>

<body>
<div id="tab" align="center">
<h1>Login</h1>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td>User ID</td>
      <td><label for="txt_id"></label>
      <input type="text" name="txt_id" id="txt_id" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pass"></label>
      <input type="password" name="txt_pass" id="txt_pass" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_insert" id="btn_insert" value="LOGIN" /></td>
    </tr>
  </table>
</form>
</div>
</body>
<?php
include("Foot.php");
?>
</html>