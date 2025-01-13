<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
</head>

<body>

<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
$sel="select * from tb_priest u inner join tb_place p on p.place_id=u.place_id  where u.priest_id='".$_SESSION["pid"]."'";

$row=$conn->query($sel);
$data=$row->fetch_assoc();
if(isset($_POST["btn_edit"]))
{
	$name=$_POST["txt_name"];
	$address=$_POST["txt_address"];
	$mail=$_POST["txt_mail"];
	$dob=$_POST["txt_dob"];
	$contact=$_POST["txt_contact"];
	
	
  $upQry="update tb_priest set priest_name='$name',priest_address='$address',priest_email='$mail' ,priest_dob='$dob',priest_number='$contact'where priest_id='".$_SESSION["pid"]."'";
  $conn->query($upQry);
  if($conn->query($upQry))
	{
		?>
        <script>
		alert("Data Edited");
		window.location="Editprofilep.php";
        </script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("Data Not Edited");
		window.location="Editprofilep.php";
        </script>
        <?php
	}



}
?>
<form id="form1" name="form1" method="post" action="">
<table align="center" border="1">
  <tr>
    <td>Name</td>
    <td> <input type="text" name="txt_name" id="txt_name"  value="<?php echo $data["priest_name"];?>"/></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><input type="text" name="txt_address" id="txt_address"  value="<?php echo $data["priest_address"];?>"/></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="txt_mail" id="txt_mail"  value="<?php echo $data["priest_email"];?>"/></td>
  </tr>
  
 
    <td>DoB</td>
    <td><input type="text" name="txt_dob" id="txt_dob"  value="<?php echo $data["priest_dob"];?>"/></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><input type="text" name="txt_contact" id="txt_contact"  value="<?php echo $data["priest_number"];?>"/></td>
  </tr>

  <tr>
    <td colspan="2" align="right"><input type="submit" name="btn_edit" id="btn_edit" value="Edit" /></td>
  </tr>
</table>
<?php
include("Foot.php");
?>
</form>
</body>
</html>
