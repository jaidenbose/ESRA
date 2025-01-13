<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Certificate</title>
</head>
<?php
session_start();
include("../Assets/Connection/Connection.php");
include("Head.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';


	if(isset($_GET["id"]))
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
			
				$mail->addAddress($_SESSION["lgemail"]);
			
				$mail->isHTML(true);
			
				$mail->Subject = "Certification Application";
				$mail->Body = "Your Certificate Application Request Has Been Canceled Succesfuly ";
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


					$upQry="update tb_certificate set booking_status=3 where certificate_id='".$_GET["id"]."'";
					$conn->query($upQry);
					if($conn->query($upQry))
					{
						?>
						<script>
						alert("Canceled");
						window.location="ViewCertificateBookingStatus.php";
						</script>
						<?php
					}



				}


	
?>	

  
  <table width="1151" border="3" align="center">
    <tr>
      <td width="66">SI no</td>
      <td width="213">Certificate Name</td>
      <td width="612">Certificate Requirements</td>
      <td width="151">Status</td>
    </tr>

    <?php 
	$selQ="select * from tb_certificate where fam_id='".$_SESSION["lgid"]."'";
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
       <td><?php
	   if($data["booking_status"]==3)
	   {
		 echo "Canceled";
	   }
	   else  if($data["booking_status"]==0)
	   {
		 ?>
			Pending / <a href="ViewCertificateBookingStatus.php?id=<?php echo $data["certificate_id"] ?>">Cancel</a>

		<?php
	   }
	   else if($data["booking_status"]==1)
	   {
	   
	  	?>
			Your request accepted / <a href="ViewCertificateBookingStatus.php?id=<?php echo $data["certificate_id"] ?>">Cancel</a>
		<?php
		
	   }
		 else if($data["booking_status"]==2)
	   {
	   
		 echo "Your request rejected";
		
	   }
		
		?>
        </td>
     
    
    </tr>
    <?php
	}
	?>
  </table>
  
  
</form>
</body>
<?php
include("Foot.php");
?>
</html>