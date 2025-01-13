
<title>Service Requests</title>

<?php

include("Head.php");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';
?>

 <table border="1" align="center">
	 <h1 align="center">Bookings</h1>
    <tr>
      <td>SI no</td>
      <td>Service Name</td>
      <td>Service Date</td>
       <td>Service Time</td>
      <td>Service Location</td>
      <td>Bookmark</td>
       <td>Comments</td>
       <td>Requested By</td>
       <td>Contact No.</td>
      <td>Status</td>
    </tr>

    <?php 
	include("../Assets/Connection/Connection.php");
	
	
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
  
    $mail->Subject = "Service Booking Approval";
    $mail->Body = "Your Service Booking Request Has Been Approved ";
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
  






	 $is = "update tb_service set priest_id='".$_SESSION["pid"]."' where service_id='".$_GET["id"]."'";
		$conn->query($is);
		header("Location:ViewServiceBooking.php");
	}

	
	$selQ="select * from tb_service s inner join tb_servicetype st on st.servicetype_id=s.servicetype_id inner join tb_family f on f.fam_id=s.fam_id ";
	$i=0;
	$row=$conn->query($selQ);
	while($data=$row->fetch_assoc())
	{
		$i++;
	
	?>
        <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["servicetype_name"]; ?></td>
       <td><?php echo $data["service_for_date"]; ?></td>
       <td><?php echo $data["service_for_time"]; ?></td>
       <td><?php echo $data["service_location"]; ?></td>
       <td><?php echo $data["service_bookmark"]; ?></td>
       <td><?php echo $data["service_comments"]; ?></td>
        <td><?php echo $data["fam_headname"]; ?></td>
         <td><?php echo $data["fam_contact"]; ?></td>
       <td>
       		<?php
			if($data["priest_id"]==0)
			{
				?>
                <a href="ViewServiceBooking.php?id=<?php echo $data["service_id"]; ?>&email=<?php echo $data["fam_mail"] ?>"><u><b>Accept</b><u></a>
                <?php
			}
			else
			{
				$selQa="select * from tb_priest where priest_id='".$data["priest_id"]."'";
			
				$rowa=$conn->query($selQa);
				$data1=$rowa->fetch_assoc();
				
				echo "Accepted By ".$data1["priest_name"];
				
			}
			
			?>
       </td>
    
    </tr>
    <?php
	}
	?>
  </table>
  
  <?php
  
  include("Foot.php");
  ?>