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
<table width="700" border="3" align="center">
    <tr>
      <td>SI no</td>
      <td>Caption</td>
       <td>Image</td>
    </tr>

    <?php 
	$selQ="select * from tb_gallery where auditorium_id='".$_GET["eid"]."'";
	$i=0;
	$row=$conn->query($selQ);
	while($data=$row->fetch_assoc())
	{
		$i++;
	
	?>
        <tr>
      <td><?php echo $i; ?></td>
   
       <td><?php echo $data["gallery_caption"]; ?></td>
    
       <td><img src="../Assets/Auditorium/<?php echo $data["gallery_photo"]; ?>" height="150" width="150" /> </td>
      
    </tr>
    <?php
	}
	?>
  </table>


</body>
<?php
		include('Foot.php');
		 ob_end_flush();
		?>
</html>