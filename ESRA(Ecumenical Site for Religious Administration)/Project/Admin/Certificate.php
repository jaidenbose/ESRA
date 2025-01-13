<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Certificate</title>
</head>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_insert"]))
{
	$name=$_POST["txt_name"];
	$require=$_POST["txt_require"];
	if(isset($_GET["eid"]))
	{
		$upQry="update tb_certificate set certificate_name='$name' ,certificate_requirements='$require' where certificate_id='".$_GET["eid"]."'";
		$conn->query($upQry);
		if($conn->query($upQry))
		{
			?>
			<script>
			alert("Data Edited");
			window.location="Certificate.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("Data Edition Failed");
			window.location="Certificate.php";
			</script>
			<?php
		}
	
	}
	else
	{
		$insQry="insert into tb_certificate(certificate_name,certificate_requirements)values('$name','$require')";
		if($conn->query($insQry))
		{
			?>
			<script>
			alert("Data Inserted");
			window.location="Certificate.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("Data Insertion Failed");
			window.location="Certificate.php";
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
		window.location="Certificate.php";
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
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="3" align="center">
    <tr>
      <td>Certicicate Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $ename?>" /></td>
    </tr>
    <tr>
      <td>Requirements</td>
      <td><label for="txt_require"></label>
      <textarea name="txt_require" id="txt_require" cols="45" rows="5"><?php echo $erequire?> </textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="btn_insert" id="btn_insert" value="Insert" /></td>
    </tr>
  </table>
  
   <br/> <br/> <br/> <br/>
  <hr/>
  <table width="700" border="3" align="center">
    <tr>
      <td>SI no</td>
      <td>Certificate Name</td>
      <td>Certificate Requirements</td>
      <td>Action</td>
    </tr>

    <?php 
	$selQ="select * from tb_certificate";
	$i=0;
	$row=$conn->query($selQ);
	while($data=$row->fetch_assoc())
	{
		$i++;
	
	?>
        <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["certificate_name"]; ?></td>
       <td><?php echo $data["certificate_requirements"]; ?></td>
      <td><a href="Certificate.php?did=<?php echo $data["certificate_id"] ?>">DELETE</a>/<a href="Certificate.php?eid=<?php echo $data["certificate_id"]?>">EDIT</a></td>
    
    </tr>
    <?php
	}
	?>
  </table>
  
  
</form>
</body>
</html>