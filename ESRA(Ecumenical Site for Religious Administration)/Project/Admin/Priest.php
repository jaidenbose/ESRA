<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Priest Registration</title>
</head>
<?php
include("../Assets/Connection/Connection.php");


if(isset($_POST["btn_insert"]))
{
	
	$name=$_POST["txt_name"];
	$address=$_POST["txt_address"];
	$mail=$_POST["txt_mail"];
	$pass=$_POST["txt_pass"];
	$place=$_POST["sel_place"];
	$dob=$_POST["txt_dob"];
	$num=$_POST["txt_num"];
	
	$image=$_FILES["file_photo"]["name"];
	$temp=$_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Priestphoto/".$image);

	
	$insQry="insert into tb_priest(priest_name,priest_address,priest_email,priest_pass,priest_number,place_id,priest_dob,priest_image	
)values('$name','$address','$mail','$pass','$num','$place','$dob','$image')";
	if($conn->query($insQry))
	{
		?>
        <script>
		alert("Data Inserted");
		window.location="Priest.php";
        </script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("Data Insertion Failed");
		window.location="Priest.php";
        </script>
        <?php
	}
}


?>

<body>
<a href="HomePage.php">Home</a>
<h1> <center> *****Priest Registration*****</center></h1>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="3" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_mail"></label>
      <input type="text" name="txt_mail" id="txt_mail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pass"></label>
      <input type="password" name="txt_pass" id="txt_pass" /></td>
    </tr>
    <tr>
      <td>Contact NO</td>
      <td><label for="txt_num"></label>
      <input type="text" name="txt_num" id="txt_num" /></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
              <select name="sel_district" id="sel_district" onchange="getPlace(this.value)">
        <option value="">-------select-----</option>
        <?php
		$selD="select * from tb_district";
		$rowD=$conn->query($selD);
		while($dataD=$rowD->fetch_assoc())
		{
		?>
        <option value="<?php echo $dataD["district_id"]?>" > <?php echo $dataD["district_name"];?> </option>
		<?php	
		}
		?>
        
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place">
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

      </select></td>
    </tr>
    <tr>
      <td>Date of Birth</td>
      <td><label for="txt_dob"></label>
      <input type="date" name="txt_dob" id="txt_dob" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="btn_insert" id="btn_insert" value="Sign In" /></td>
    </tr>
  </table>
</form>
</body>
</html>



<script src="../Assets/JQuery/jQuery.js"></script>
<script>
function getPlace(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
	  success: function(html){
		$("#sel_place").html(html);
	  }
	});
}
</script>
</html>
