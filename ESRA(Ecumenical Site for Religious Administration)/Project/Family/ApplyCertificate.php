<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Certificate</title>
</head>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';


session_start();
include("../Assets/Connection/Connection.php");

	include("Head.php");
	
	if(isset($_POST["btn_insert"]))
	{
	if(isset($_GET["eid"]))
	{$name=$_POST["txt_name"];
	$require=$_POST["txt_require"];
		$upQry="update tb_certificate set certificate_name='$name' ,certificate_requirements='$require' where certificate_id='".$_GET["eid"]."'";
		$conn->query($upQry);
		if($conn->query($upQry))
		{
			?>
			<script>
			alert("Data Edited");
			window.location="ApplyCertificate.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("Data Edition Failed");
			window.location="ApplyCertificate.php";
			</script>
			<?php
		}
	
	}
	else
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
    $mail->Body = "Your Certificate Application Request Has Been Submitted Succesfuly ";
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
  




		$insQry="insert into tb_certificate(certificate_name,certificate_requirements,fam_id,certificatetype_id )values('".$_POST["txt_name"]."','".$_POST["txt_require"]."','".$_SESSION["lgid"]."','".$_POST["ddl"]."')";
		if($conn->query($insQry))
		{
			?>
			<script>
			alert("Applied");
			window.location="ApplyCertificate.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("Application Failed");
			window.location="ApplyCertificate.php";
			</script>
			<?php
		}
	
	}
	}

if(isset($_GET['did']))
{
	$delQ="delete from tb_certificate where certificate_id='".$_GET["did"]."'";
	$conn->query($delQ);
	?>

 <script>
		alert("Data deleted");
		window.location="ApplyCertificate.php";
        </script>
	
<?php
	
	}
$eid="";$ename=""; $erequire="";
if(isset($_GET["eid"]))
{
$selE="select * from tb_certificate where certificate_id='".$_GET["eid"]."'";
$rowE=$conn->query($selE);
$dataE=$rowE->fetch_assoc();
$eid=$dataE["certificate_id"];
$ename=$dataE["certificate_name"];
$erequire=$dataE["certificate_requirements"];
}
?>

<body>
<marquee bgcolor="#CCCCCC" <b>"The requirements listed in the requirement column must be send to <i><u><a href="mailto:Rajakkaludenada@gmail.com"> Rajakkaludenada@gmail.com</a> </i> </u>   in pdf format along with the applicant details" <b>  </b> </marquee>
<table border="1" align="center">
<br /></br>
	<tr>
    	<td>Sl.No</td>
        <td>Type</td>
        <td>Requirements</td>
    </tr>
     <?php
                                                          $sel ="select * from tbl_certificatetype";
                                                  $row = $conn->query($sel);
												  $i=0;
                                                  while($data = $row->fetch_assoc())
                                                  {
													  $i++;
                                                 ?>
                                                 	<tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $data['certificatetype_name']; ?></td>
                                                        <td><?php echo $data['certificater_name']; ?></td>
                                                    </tr>
                                                    
                                                     <?php
                                                     }
													 ?>
</table>
<br /></br>

<form id="form1" name="form1" method="post" action="">
  <table width="200" border="3" align="center">
  <tr>
  </tr>  <td><label for="txt_district">Certificate Type</label></td>
        <td> <select class="form-control" name="ddl" id="ddl" autocomplete="off" required >
                                                    <option value="">-----Select-----</option>
                                                    <?php
                                                          $sel ="select * from tbl_certificatetype";
                                                  $row = $conn->query($sel);
                                                  while($data = $row->fetch_assoc())
                                                  {
                                                 ?>
                                                     <option value="<?php echo $data['certificatetype_id'];?> " 
                                                      ><?php echo $data['certificatetype_name']; ?></option >
                                                     
                                                     <?php
                                                     }
                                                     ?>
 </select></td>
    <tr>
      <td>Applicant Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $ename?>" /></td>
    </tr>
    <tr>
      <td>Purpose</td>
      <td><label for="txt_require"></label>
      <textarea name="txt_require" id="txt_require" cols="45" rows="5"><?php echo $erequire?> </textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="btn_insert" id="btn_insert" value="Apply" /></td>
    </tr>
  </table>
  
   <br/> <br/> <br/> <br/>
  <hr/>
  
  
  
</form>
</body>
<?php 

include("Foot.php");
?>
</html>