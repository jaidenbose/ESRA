<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Profile</title>
</head>

<body>
<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
 $sel="select * from tb_priest u inner join tb_place s on s.place_id =u.place_id where u.priest_id='".$_SESSION["pid"]."'";
$row=$conn->query($sel);
if($data=$row->fetch_assoc())
{



?>
<table align="center" border="1">

  <tr>
    <td>Photo</td>
    <td><img src="../Assets/PriestPhoto/<?php echo $data["priest_image"];?>" width="150" height="150" /></td>
  </tr>
  <tr>
    <td>Name</td>
    <td><?php echo $data["priest_name"];?></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo $data["priest_address"];?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $data["priest_email"];?></td>
  </tr>
  <tr>
    <td>Place</td>
    <td><?php echo $data["place_name"];?></td>
  </tr>
  <tr>
    <td>DoB</td>
    <td><?php echo $data["priest_dob"];?></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $data["priest_number"];?></td>
  </tr>
</table>
<?php
}
include("Foot.php");
?>
</body>
</html>