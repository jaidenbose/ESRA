<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
</head>

<?php
include("../Assets/Connection/Connection.php");
include('Head.php');
?>
<body>

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table align="center">
    
 <tr>
    <?php 
	$selQ="select * from tb_churchgallery ";
	$i=0;
	$row=$conn->query($selQ);
	while($data=$row->fetch_assoc())
	{
		$i++;
	
	?>
       
  
    
       <td><a href="../Assets/ChurchPhoto/<?php echo $data["g_photo"]; ?>"><img src="../Assets/ChurchPhoto/<?php echo $data["g_photo"]; ?>" height="380" width="380" /></a> </td>
      
    
    <?php
	if($i==4)
	{
		echo "</tr><tr>";
		$i=0;
	}
	}
	?>
  </table>


</body>
<?php
		include('Foot.php');
		 ob_end_flush();
		?>
</html>