<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Registration</title>
</head>





<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
$selcount="select * from tb_family where fam_id='".$_SESSION["lgid"]."'";
	$rowcount=$conn->query($selcount);
	$datacount=$rowcount->fetch_assoc();
	$count=$datacount["fam_member"]-1;
if(isset($_POST["btn_insert"])&&($count>0))
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
  $mail->Body = "New User Added";
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



	
	$name=$_POST["txt_name"];
	$address=$_POST["txt_address"];
	$mail=$_POST["txt_mail"];
	$pass=$_POST["txt_pass"];
	$unit=$_POST["sel_unit"];
	$gender=$_POST["rad_gender"];
	$dob=$_POST["txt_dob"];
	$num=$_POST["txt_num"];
	
	
	$image=$_FILES["file_photo"]["name"];
	$temp=$_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Userphoto/".$image);

	
	$insQry="insert into tb_user(user_name,user_address,user_mail,user_pass,unit_id,user_gender,user_dob,user_contact,user_image,fam_id,occupation)values('".$name."','".$address."','".$mail."','".$pass."','".$unit."','".$gender."','".$dob."','".$num."','".$image."','".$_SESSION["lgid"]."','".$_POST["occupation"]."')";
	echo $insQry;
	if($conn->query($insQry))
	{
		$new=$count-1;
		$up="update tb_family set fam_member='".$new."' where fam_id='".$_SESSION["lgid"]."'";
		$conn->query($up);
		?>
        <script>
		alert("Data Inserted");
		window.location="User.php";
        </script>
        <?php
	}
	
	
}

else
if(isset($_GET['did']))
{
	$delQ="delete from tb_user where user_id='".$_GET["did"]."'";
	if($conn->query($delQ))
	{
		?>
 		<script>
		alert("Data deleted");
		window.location="User.php";
        </script>
        <?php
	}
}


?>

<body>
<h1> <center>*******User Registration*******</center></h1>
<form action="" method="post" enctype="multipart/form-data">

  <table width="200" border="3" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea>
      </td>
    </tr>
  
      <td>Email</td>
      <td><label for="txt_mail"></label>
      <input type="text" name="txt_mail" id="txt_mail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pass"></label>
      <input type="password" name="txt_pass" id="txt_pass" /></td>
    </tr>
    
    </tr>
    <tr>
      <td>Occupation</td>
      <td><label for="txt_pass"></label>
      <input type="text" name="occupation" id="occupation" /></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
       <select name="sel_place" id="sel_place" onchange="getUnit(this.value)">
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
          <input type="radio" name="rad_gender" value="male" id="rad_gender_0" />
          Male</label>
        <br />
        <label>
          <input type="radio" name="rad_gender" value="female" id="rad_gender_1" />
          Female</label>
        <br />
        <label>
          <input type="radio" name="rad_gender" value="others" id="rad_gender_2" />
          Others</label>
        <br />
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
      <input type="text" name="txt_num" id="txt_num" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="btn_insert" id="btn_insert" value="Add User" /></td>
    </tr>
  </table>
  
  <br/> <br/> <br/> <br/>
  <hr/>
  <table width="200" border="3" align="center">
    <tr>
      <td>SI no</td>
      <td>Name</td>
      <td>Address</td>
       <td>Email</td>
        <td>Gender</td>
        <td>Kudumba Unit</td>
         <td>DoB</td>
          <td>Contact</td>
           
    </tr>

    <?php 
	$selQ="select * from tb_user u inner join tb_unit p on u.unit_id=p.unit_id";
	$i=0;
	$row=$conn->query($selQ);
	while($data=$row->fetch_assoc())
	{
		$i++;
	
	?>
        <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["user_name"]; ?></td>
      <td><?php echo $data["user_address"]; ?></td>
      <td><?php echo $data["user_mail"]; ?></td>
      <td><?php echo $data["user_gender"]; ?></td>
      <td><?php echo $data["unit_name"]; ?></td>
      <td><?php echo $data["user_dob"]; ?></td>
      <td><?php echo $data["user_contact"]; ?></td>
      
     
      
      
      <td><a href="User.php?did=<?php echo $data["user_id"] ?>">DELETE</a></td>
    
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>
<?php

include("Foot.php");
?>

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
