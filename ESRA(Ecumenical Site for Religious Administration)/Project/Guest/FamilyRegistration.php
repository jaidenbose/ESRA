<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Family Registration</title>
</head>

<?php
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
  
    $mail->addAddress($_POST["txt_mail"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Registartion";
    $mail->Body = "Your Registartion Succesfuly Completed";
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


	
	$famname=$_POST["txt_name"];
	$occ=$_POST["txt_occ"];
	$famheadname=$_POST["txt_headname"];
	$members=$_POST["txt_number"];
	$address=$_POST["txt_address"];
	$mail=$_POST["txt_mail"];
	$pass=$_POST["txt_pass"];
	$unit=$_POST["sel_unit"];
	$gender=$_POST["rad_gender"];
	$dob=$_POST["txt_dob"];
	$num=$_POST["txt_num"];
	
	$image=$_FILES["file_photo"]["name"];
	$temp=$_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Famphoto/".$image);

	
	$insQry="insert into tb_family(fam_occupation,fam_name,fam_headname,fam_member,fam_address,fam_mail,fam_pass,unit_id,fam_gender,fam_dob,fam_contact,fam_image)values('$occ','$famname','$famheadname','$members','$address','$mail','$pass','$unit','$gender','$dob','$num','$image')";
	if($conn->query($insQry))
	{
		?>
        <script>
		alert("Data Inserted");
		window.location="FamilyRegistration.php";
        </script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("Data Insertion Failed");
		window.location="FamilyRegistration.php";
        </script>
        <?php
	}
}

include("Head.php");
?>

<body>
<div id="tab" align="center">
<h1> <center>*******Family Registration*******</center></h1>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

  <table>
     <tr>
      <td>Family Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required="required" pattern="[A-Za-z ]{2,}"/></td>
    </tr>
    <tr>
      <td>Family Head Name</td>
      <td><label for="txt_headname"></label>
      <input type="text" name="txt_headname" id="txt_headname" required="required" pattern="[A-Za-z ]{2,}"/></td>
    </tr>
   
    <tr>
      <td>Occupation</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_occ" id="txt_occ" required="required" pattern="[A-Za-z ]{2,}"/></td>
    </tr>
     
     <tr>
      <td>No of Members</td>
      <td><label for="txt_number"></label>
      <input type="text" name="txt_number" id="txt_number" pattern="[0-9]{1,}"  /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5" required="required"></textarea>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_mail"></label>
      <input type="Email" name="txt_mail" id="txt_mail" required="required" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pass"></label>
      <input type="password" name="txt_pass" id="txt_pass" required="required" /></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
       <select name="sel_place" id="sel_place" onchange="getUnit(this.value)" required>
         <option value="">-------select-----</option>
        <?php
		$selD="select * from tb_place";
		$row=$conn->query($selD);
		while($data=$row->fetch_assoc())
		{
		?>
        <option value="<?php echo $data["place_id"]?>"> <?php echo $data["place_name"];?> </option>
		<?php	
		}
		 ?>
        </select> 
      </td>
    </tr>
    
      <tr>
      <td>Kudumba Unit</td>
      <td><label for="sel_unit"></label>
        <select name="sel_unit" id="sel_unit" >
        <option value="">-------select-----</option>
        
      </select></td>
    </tr>
    
    <tr>
      <td>Gender</td>
      <td><p>
        <label>
          <input type="radio" name="rad_gender" value="male" id="rad_gender_0" checked="checked"/>
          Male</label>
       
        <label>
          <input type="radio" name="rad_gender" value="female" id="rad_gender_1" />
          Female</label>
        
        <label>
          <input type="radio" name="rad_gender" value="others" id="rad_gender_2" />
          Others</label>
    
      </p></td>
    </tr>
    <tr>
      <td>Date of Birth</td>
      <td><label for="txt_dob"></label>
      <input type="date" name="txt_dob" id="txt_dob" /></td>
    </tr>
    <tr>
      <td>Contact No</td>
      <td><label for="txt_num"></label>
      <input type="text" name="txt_num" id="txt_num" pattern="{0}"/></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="Reset" name="btn_cancel" id="btn_cancel" value="Cancel" />        
      <input type="submit" name="btn_insert" id="btn_insert" value="Sign In" /></td>
    </tr>
  </table>
  .
</form>
</div>
<?php 


include("Foot.php");
?>
</body>
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
