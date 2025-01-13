<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Auditorium</title>
</head>
<?php
ob_start();
include('Head.php');

include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_save"]))
{
	$name=$_POST["txt_name"];
	$seat=$_POST["txt_seat"];
	$rate=$_POST["txt_rate"];
	
	$image=$_FILES["file_photo"]["name"];
	$temp=$_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Auditorium/".$image);


		$insQry="insert into tb_auditorium(auditorium_name,auditorium_seating,auditorium_rate,auditorium_image)values('$name','$seat','$rate','$image')";
		if($conn->query($insQry))
		{
			?>
			<script>
			alert("Data Inserted");
			window.location="Auditorium.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("Data Insertion Failed");
			window.location="Auditorium.php";
			</script>
			<?php
		}

}
if(isset($_GET['did']))
{
	$delQ="delete from tb_auditorium where auditorium_id='".$_GET["did"]."'";
	$conn->query($delQ);
	?>

 <script>
		alert("Data deleted");
		window.location="Auditorium.php";
        </script>
	
<?php
	}
?>

<body>
        <section class="main_content dashboard_part">
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="QA_section">
                                <!--Form-->
                                <div class="white_box_tittle list_header">
                                    <div class="col-lg-12">
                                        <div class="white_box mb_30">
                                            <div class="box_header ">
                                                <div class="main-title">
                                                    <h3 class="mb-0" >Table Auditorium</h3>
                                                </div>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="txt_district">Auditorium Name</label>
                                                    <input required="" type="text" class="form-control" id="txt_name" name="txt_name" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_district">Seating</label>
                                                    <input required="" type="text" class="form-control" id="txt_seat" name="txt_seat" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_district">Rate</label>
                                                    <input required="" type="text" class="form-control" id="txt_rate" name="txt_rate" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_district">Image</label>
                                                    <input required="" type="file" class="form-control" id="file_photo" name="file_photo" autocomplete="off" required>
                                                </div>
                                                <div class="form-group" align="center">
<input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px " name="btn_save" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">Auditorium Name</td>
                                                <td align="center" scope="col">Seating Capacity</td>
                                                 <td align="center" scope="col">Rate</td>
                                                <td align="center" scope="col">Image</td>
                                                <td align="center" scope="col">Action</td>
                                                                                         
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                     
                                            
                                            
                                             <?php 
	$selQ="select * from tb_auditorium";
	$i=0;
	$row=$conn->query($selQ);
	while($data=$row->fetch_assoc())
	{
		$i++;
	
	?>
        <tr>
      <td align="center"><?php echo $i; ?></td>
      <td align="center"><?php echo $data["auditorium_name"]; ?></td>
       <td align="center"><?php echo $data["auditorium_seating"]; ?></td>
       <td align="center"><?php echo $data["auditorium_rate"]; ?></td>
       <td align="center"><img src="../Assets/Auditorium/<?php echo $data["auditorium_image"]; ?>" width="120" height="120" /> </td>
      <td align="center">
      <a href="Auditorium.php?did=<?php echo $data["auditorium_id"] ?>" class="status_btn">DELETE</a>
      <a href="Gallery.php?eid=<?php echo $data["auditorium_id"] ?>" class="status_btn">Gallery</a></td>
    
    </tr>
    <?php
	}
	?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <?php
		include('Foot.php');
		 ob_end_flush();
		?>
</body>
</html>