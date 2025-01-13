<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Hallbooking</title>
</head>
<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');


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
			
				$mail->Subject = "Hall Booking";
				$mail->Body = "Your Hall Booking Request Has Been Canceled Succesfuly ";
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


					$upQry="delete from tb_bookauditorium where book_id='".$_GET["id"]."'";
					$conn->query($upQry);
					if($conn->query($upQry))
					{
						?>
						<script>
						alert("Canceled");
						window.location="ViewHallBooking.php";
						</script>
						<?php
					}



				}





?>
<body>
  <table  border="3" align="center">
    <tr>
      <td>SI no</td>
      <td>auditorium</td>
      <td>Date</td>
      <td>Comments</td>
    </tr>

    <?php 
	$selQ="select * from tb_bookauditorium b inner join tb_auditorium a on a.auditorium_id=b.auditorium_id where fam_id='".$_SESSION["lgid"]."'";
	$i=0;
	$row=$conn->query($selQ);
	while($data=$row->fetch_assoc())
	{
		$i++;
	
	?>
     <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["auditorium_name"]; ?></td>
      <td><?php echo $data["book_date"]; ?></td>
      <td><?php echo $data["book_details"]; ?></td>
    <?php
	}
	?>
  </table>
  <blockquote>&nbsp;</blockquote>
</form>
</body>
<?php
		include('Foot.php');
		 ob_end_flush();
		?>
</html>


<script src="../Assets/JQuery/jQuery.js"></script>
<script>
function getUnit(pid)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxUnit.php?uid="+pid,
	  success: function(html){
		$("#sel_unit").html(html);
	  }
	});
}
</script>
</html>
