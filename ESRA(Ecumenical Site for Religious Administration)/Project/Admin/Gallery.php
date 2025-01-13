<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
</head>

<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_save"]))
{
		$caption=$_POST["txt_caption"];
	
	$image=$_FILES["file_image"]["name"];
	$temp=$_FILES["file_image"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Auditorium/".$image);


	
	$insQry="insert into tb_gallery(gallery_photo,gallery_caption,auditorium_id)values('$image','$caption','".$_GET["eid"]."')";
		if($conn->query($insQry))
		{
			?>
			<script>
			alert("Data Inserted");
			window.location="Gallery.php?eid=<?php echo $_GET["eid"]?>";
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("Data Insertion Failed");
			window.location="Gallery.php?eid=<?php echo $_GET["eid"]?>";
			</script>
			<?php
		}
		}
		?>

<body>
<a href="HomePage.php">Home</a>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="3">
    <tr>
      <td>Image</td>
      <td><input type="file" name="file_image" id="file_image" /></td>
    </tr>
    <tr>
      <td>Caption</td>
      <td><label for="txt_caption"></label>
      <textarea name="txt_caption" id="txt_caption" cols="45" rows="5"></textarea>        <label for="file_image"></label></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_save" id="btn_save" value="Save" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>
