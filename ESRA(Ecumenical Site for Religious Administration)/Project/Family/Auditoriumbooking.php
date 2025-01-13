<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Auditorium Booking</title>
</head>

<?php
include("../Assets/Connection/Connection.php");
include('Head.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';
?>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="700" border="3" align="center">
    <tr>
      <td>SI no</td>
      <td>Auditorium Name</td>
      <td>Seating Capacity</td>
      <td>Rate</td>
      <td>Image</td>
      <td>Action</td>
    </tr>

    <?php 
	$selQ="select * from tb_auditorium";
	$i=0;
	$row=$conn->query($selQ);
	while($data=$row->fetch_assoc())
	{
		$i++;
	
	?>
        <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["auditorium_name"]; ?></td>
       <td><?php echo $data["auditorium_seating"]; ?></td>
       <td><?php echo $data["auditorium_rate"]; ?></td>
       <td><img src="../Assets/Auditorium/<?php echo $data["auditorium_image"]; ?>" width="120" height="120" /> </td>
      <td>
      <a href="Booking.php?did=<?php echo $data["auditorium_id"] ?>">Book</a>/
      <a href="Gallerypics.php?eid=<?php echo $data["auditorium_id"] ?>">Gallery</a></td>
    
    </tr>
    <?php
	}
	?>
  </table>
</body>
<?php
		include('Foot.php');
		 ob_end_flush();
		?>
</html>