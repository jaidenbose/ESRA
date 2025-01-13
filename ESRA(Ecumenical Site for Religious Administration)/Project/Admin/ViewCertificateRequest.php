<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Certificate</title>
</head>
<?php
session_start();
include("../Assets/Connection/Connection.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

	
	
	if(isset($_GET["aid"]))
	{


		$mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'jaidenbose96@gmail.com'; // Your gmail
    $mail->Password = 'chetijksdrimpptm'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('jaidenbose96@gmail.com'); // Your gmail
  
    $mail->addAddress($_GET["email"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Certification Application Approval";
    $mail->Body = "Your Certificate Application Request Has Been Accepted Succesfuly ";
  if($mail->send())
  {
    ?>
    <script>
    alert("Mail Send");
	</script>
    <?php
  }
  else
  {
    ?>
    <script>
    alert("Mail Failed");
	</script>
    <?php
  }
  


	
		$upQry="update tb_certificate set booking_status=1 where certificate_id='".$_GET["aid"]."'";
		$conn->query($upQry);
		if($conn->query($upQry))
		{
			?>
			<script>
			alert("Accepted");
			window.location="ViewCertificateRequest.php";
			</script>
			<?php
		}
	
	
	}
	
	if(isset($_GET["rid"]))
	{

		$mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'jaidenbose96@gmail.com'; // Your gmail
    $mail->Password = 'chetijksdrimpptm'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('jaidenbose96@gmail.com'); // Your gmail
  
    $mail->addAddress($_GET["email"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Certification Application Approval";
    $mail->Body = "Your Certificate Application Request Has Been Canceled ";
  if($mail->send())
  {
    ?>
    <script>
    alert("Mail Send");
	</script>
    <?php
  }
  else
  {
    ?>
    <script>
    alert("Mail Failed");
	</script>
    <?php
  }
  
	
		$upQry="update tb_certificate set booking_status=2 where certificate_id='".$_GET["rid"]."'";
		$conn->query($upQry);
		if($conn->query($upQry))
		{
			?>
			<script>
			alert("Rejected");
			window.location="ViewCertificateRequest.php";
			</script>
			<?php
		}
	
	
	}
	


?>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">

  
   <br/> <br/> <br/> <br/>
  <hr/>
  <table width="700" border="3" align="center">
    <tr>
      <td>SI no</td>
      <td>Certificate Name</td>
      <td>Certificate Requirements</td>
      <td colspan="2">Action</td>
    </tr>

    <?php 
	$selQ="SELECT * from tb_certificate c inner join tb_family f on f.fam_id=c.fam_id";
	$i=0;
	$row=$conn->query($selQ);
	while($data=$row->fetch_assoc())
	{
		$i++;
	
	?>
        <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["certificate_name"]; ?></td>
      <td><?php echo $data["certificate_requirements"]; ?></td>
      <?php
      if($data["booking_status"]==3)
      {
      echo "<td colspan='2' align='center'>Canceled</td>";
      }
      else {
        ?>
         <td><a href="ViewCertificateRequest.php?aid=<?php echo $data["certificate_id"] ?>&email=<?php echo $data["fam_mail"] ?>">Accept</a></td>
      <td><a href="ViewCertificateRequest.php?rid=<?php echo $data["certificate_id"] ?>&email=<?php echo $data["fam_mail"] ?>">Reject</a></td>
    
        <?php
      }
      ?>
     </tr>
    <?php
	}
	?>
  </table>
  
  
</form>
</body>
</html>