<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');


if(isset($_POST['btn_save']))
	{
		$unit = $_POST['txt_unit'];
		$place = $_POST['sel_place'];
		
		
			$ins = "insert into tb_unit (unit_name,place_id) values('".$unit."','".$place."')";
		
			if($conn->query($ins))
			{
				header("location:KudumbaUnit.php");
			}
		
		
		
	}

	
	if(isset($_GET['id']))
	{
		$del = "delete from tb_unit where unit_id = '".$_GET['id']."'";
		if($conn->query($del))
		{
			header("location:KudumbaUnit.php");
		}
	}

?>

<body>
        <section class="main_content dashboard_part">

            <!--/ menu  -->
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
                                                    <h3 class="mb-0" >Table KudumbaUnit</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                             <div class="form-group">
                                                    <label for="txt_place">Place</label>
                                                    <select class="form-control" name="sel_place" id="sel_place" autocomplete="off" required >
                                                    <option value="">-----Select-----</option>
                                                    <?php
                                                          $sel ="select * from tb_place";
                                                  $row = $conn->query($sel);
                                                  while($data = $row->fetch_assoc())
                                                  {
                                                 ?>
                                                     <option value="<?php echo $data['place_id'];?> " 
                                                      ><?php echo $data['place_name']; ?></option >
                                                     
                                                     <?php
                                                     }
                                                     ?>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="txt_place">KudumbaUnit</label>
        <input type="text" name="txt_unit" id="txt_unit" class="form-control" autocomplete="off" required/>
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
                                              	<td align="center" scope="col">Place</td>
                                                <td align="center" scope="col">KudumbaUnit </td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
	$i=0;
	  $sel = "select * from tb_unit p inner join tb_place d on d.place_id=p.place_id";
	  $row = $conn->query($sel);
	  while($data = $row->fetch_assoc())
	  {
		  $i++;
		  ?>  
                                            <tr>
                                               <td align="center"><?php echo $i; 	?></td>
                   
            <td align="center"><?php echo $data['place_name']; ?></td>
            <td align="center"><?php echo $data['unit_name']; ?></td>
            <td align="center">
            <a class="status_btn"  href="KudumbaUnit.php?id=<?php echo $data['unit_id']; ?>">Delete </a>
		
         </td>
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
        
         
	  </script>
</body>
</html>