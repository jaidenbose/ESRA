<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Auditorium Booking</title>
</head>


<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../Assets/phpMail/src/Exception.php';
	require '../Assets/phpMail/src/PHPMailer.php';
	require '../Assets/phpMail/src/SMTP.php';

include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btn_book"]))
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
  
    $mail->Subject = "Auditorium Booking";
    $mail->Body = "Your Auditorium Booking Request Has Been Submitted Succesfuly ";
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

	$date=$_POST["txt_date"];
	$details=$_POST["txt_details"];
	$name=$_POST["txt_name"];
	$aud=$_GET["did"];
	$user=$_SESSION["lgid"];
	
	
	$sel = "select * from tb_bookauditorium where book_date='$date'";
	$r = $conn->query($sel);
	if($d = $r->fetch_assoc())
	{
	
	?>
    <script>
			alert("Already Booked in this date");
			window.location="Booking.php";
			</script>
    <?php
	}
	else
	{
		
	$insQry="insert into tb_bookauditorium(book_date,book_details,booked_date,fam_id,auditorium_id,booking_name)
										values('$date','$details',curdate(),'$user','$aud','$name')";
		if($conn->query($insQry))
		{
			?>
			<script>
			/*alert("Data Inserted");*/
			window.location="Payment.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("Data Insertion Failed");
			window.location="Booking.php";
			</script>
			<?php
		}
	}
	}
	include('Head.php');
?>

<body>

<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center">
  <tr>
      <td>Function</td>
      <td>
      
      	  <input type="text" name="txt_name" id="txt_name" />
      </td>
    </tr>
    <tr>
      <td>Date(Booking To)</td>
      <td><label for="txt_date"></label>
      	  <input type="date" name="txt_date" id="txt_date" />
      </td>
    </tr>
    <tr>
      <td>Comments</td>
      <td><label for="txt_details"></label>
      <textarea name="txt_details" id="txt_details" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2">
      <input type="submit" name="btn_book" id="btn_book" value="Book" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </td>
    </tr>
  </table>
</form>
</body>
<?php
		include('Foot.php');
		 ob_end_flush();
		?>
</html>