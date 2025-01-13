<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donation</title>
</head>
<?php
session_start();
include("../Assets/Connection/Connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';
	
	
	if(isset($_POST["btn_insert"]))
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
  
    $mail->Subject = "Donation";
    $mail->Body = "Your Donation Has Been Sended Succesfuly ";
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

	
		$insQry="insert into tbl_donation(donation_name,donation_date,donation_amount,fam_id,category_id)values('".$_POST["na"]."',curdate(),'".$_POST["txt_amount"]."','".$_SESSION["lgid"]."','".$_POST["ddl"]."')";
		if($conn->query($insQry))
		{
			?>
			<script>
			alert("Redirecting to payment page");
			window.location="Payment.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("Data Insertion Failed");
			window.location="Donation.php";
			</script>
			<?php
		}
	
	
	}
include("Head.php");

?>

<body>
<marquee bgcolor="#CCCCCC" <b>Kurbana:5/- ,  Prarthana:5/- ,  Aneedhe:5/- ,Perunnal Share:1000/-, Nercha:500/- </b> </marquee>
</br> <br />
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="3" align="center">
  <tr>
  </tr>  <td><label for="txt_district">Category</label></td>
        <td> 
        	<select class="form-control" name="ddl" id="ddl" autocomplete="off" required >
              	<option value="">-----Select-----</option>
                             <?php
                                     $sel ="select * from tb_category";
                                     $row = $conn->query($sel);
                                      while($data = $row->fetch_assoc())
                                          {
                                           ?>
                                               <option value="<?php echo $data['category_id'];?>"                                               ><?php echo $data['category_name']; ?></option>
                                                     
                                             <?php
                                             }
                                           ?>
 </select></td>
    <tr>
      <td>For</td>
      <td>
      <input type="text" name="na" id="na"  placeholder="Full Name"/></td>
    </tr>
    <tr>
      <td>Amount</td>
      <td>
      <input type="text" name="txt_amount" id="txt_amount"  /></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="btn_insert" id="btn_insert" value="Pay" /></td>
    </tr>
  </table>
  
   <br/> <br/> <br/> <br/>
  <hr/>
  <table width="700" border="3" align="center">
    <tr>
      <td>SI no</td>
      <td>For</td>
      <td>Category</td>
      <td>Date</td>
      <td>Amount</td>
    </tr>

    <?php 
	$selQ="select * from tbl_donation s inner join tb_category st on st.category_id=s.category_id where fam_id='".$_SESSION["lgid"]."'";
	$i=0;
	$row=$conn->query($selQ);
	while($data=$row->fetch_assoc())
	{
		$i++;
	
	?>
        <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["donation_name"]; ?></td>
      <td><?php echo $data["category_name"]; ?></td>
       <td><?php echo $data["donation_date"]; ?></td>
       <td><?php echo $data["donation_amount"]; ?></td>
    
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