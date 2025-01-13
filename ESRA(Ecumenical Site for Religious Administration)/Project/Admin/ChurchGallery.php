<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Church Gallery</title>
</head>

<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_upload"]))
{
		
	$image=$_FILES["file_image"]["name"];
	$temp=$_FILES["file_image"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/ChurchPhoto/".$image);


	
	$insQry="insert into tb_churchgallery(g_photo)values('$image')";
	if($conn->query($insQry))
		{
			?>
			<script>
			alert("Photo Uploaded");
			window.location="ChurchGallery.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("Photo Upload Failed");
			window.location="ChurchGallery.php";
			</script>
			<?php
		}
		}
		?>

<body>
<a href="HomePage.php">Home</a>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="279" border="3">
    <tr>
      <td width="179">Image for Church Gallery</td>
      <td width="80"><label for="file_image"></label>
      <input type="file" name="file_image" id="file_image" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_upload" id="btn_upload" value="Upload" required="required" /></td>
    </tr>
  </table>
</form>
</body>
</html>