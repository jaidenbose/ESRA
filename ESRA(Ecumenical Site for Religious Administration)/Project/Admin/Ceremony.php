<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Events</title>
</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');


$did = "";
$dname = "";

	if(isset($_POST['btn_save']))
	{
		
		$news=$_POST["txt_news"];
		$date=$_POST["txt_date"];
		$content=$_POST["txt_content"];
		
		$image=$_FILES["text_file"]["name"];
	$temp=$_FILES["text_file"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Famphoto/".$image);
		
		
			$ins = "insert into tb_ceremony(ceremony_name, ceremony_date, ceremony_data,ceremony_image) values('".$news."','".$date."','".$content."','".$image."')";
			
			
			if($conn->query($ins))
			{
				//header("Content:Event.php");
			}
		
		
		
		
	}
	
	if(isset($_GET['id']))
	{
		$del = "delete from tb_ceremony where ceremony_id = '".$_GET['id']."'";
		if($conn->query($del))
		{
			header("Content:News.php");
		}
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
                                                    <h3 class="mb-0" >Table News</h3>
                                                </div>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="txt_news">name</label>
                                                    <input required="" type="text" class="form-control" id="txt_news" name="txt_news" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_date">Date</label>
                                                    <input required="" type="date" class="form-control" id="txt_date" name="txt_date" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_date">Data</label>
                                                    <input required="" type="text" class="form-control" id="text_email" name="txt_content" autocomplete="off" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_date">Image</label>
                                                    <input required="" type="file" class="form-control" id="text_file" name="text_file" autocomplete="off" required>
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
                                                <td align="center" scope="col">ceremony Date</td>
                                                 <td align="center" scope="col">Content</td>

                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                $selQry = "select * from tb_ceremony";
                                                $rs = $conn->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["ceremony_date"];?></td>
                                                <td align="center"><?php echo $data["ceremony_name"];?></td>
                                                <td align="center"><a href="Ceremony.php?id=<?php echo $data["ceremony_id"];?>" class="status_btn">Delete</a> &nbsp;&nbsp;&nbsp;&nbsp;
</td>                                            </tr>
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