<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Service</title>
</head>
<?php
session_start();
include("../Assets/Connection/Connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';



if(isset($_GET["id"]))
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
    
      $mail->addAddress($_SESSION["lgemail"]);
    
      $mail->isHTML(true);
    
      $mail->Subject = "Service Booking";
      $mail->Body = "Your Service Booking Has Been Canceled Succesfuly";
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


        $upQry="delete tb_service where service_id='".$_GET["id"]."'";
        $conn->query($upQry);
        if($conn->query($upQry))
        {
          ?>
          <script>
          alert("Canceled");
          window.location="BookService.php";
          </script>
          <?php
        }



      }




	
	
	if(isset($_POST["btn_insert"]))
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
  
    $mail->addAddress($_SESSION["lgemail"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Service Booking";
    $mail->Body = "Your Service Booking Request Has Been Submitted Succesfuly ";
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


	
		$insQry="insert into tb_service(service_date,service_location,service_for_date,service_for_time,fam_id,servicetype_id,service_bookmark,service_comments)values(curdate(),'".$_POST["txt_require"]."','".$_POST["txt_date"]."','".$_POST["txt_time"]."','".$_SESSION["lgid"]."','".$_POST["ddl"]."','".$_POST["txt_bookmark"]."','".$_POST["txt_comments"]."')";
		if($conn->query($insQry))
		{
			?>
			<script>
			alert("Booked Successfully");
			window.location="BookService.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("Booking Failed");
			window.location="BookService.php";
			</script>
			<?php
		}
	
	
	}
include("Head.php");

?>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="3" align="center">
  <tr>
  </tr>  <td><label for="txt_district">Service Type</label></td>
        <td> 
        	<select class="form-control" name="ddl" id="ddl" autocomplete="off" required >
              	<option value="">-----Select-----</option>
                             <?php
                                     $sel ="select * from tb_servicetype";
                                     $row = $conn->query($sel);
                                      while($data = $row->fetch_assoc())
                                          {
                                           ?>
                                               <option value="<?php echo $data['servicetype_id'];?>"                                               ><?php echo $data['servicetype_name']; ?></option>
                                                     
                                             <?php
                                             }
                                           ?>
 </select></td>
    <tr>
      <td>Date</td>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date"  /></td>
    </tr>
     <tr>
      <td>Time</td>
      <td><label for="txt_date"></label>
      <input type="time" name="txt_time" id="txt_time"  /></td>
    </tr>
    <tr>
  
      <td>Location</td>
      <td><label for="txt_require"></label>
      <input type="text" name="txt_require" id="txt_require"  /></td>
    </tr>
     <tr>
  
      <td>Bookmark</td>
      <td><label for="txt_bookmark"></label>
       <textarea name="txt_bookmark" id="txt_bookmark" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
  
      <td>Comments</td>
      <td><label for="txt_comments"></label>
       <textarea name="txt_comments" id="txt_comments" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="btn_insert" id="btn_insert" value="Book" /></td>
    </tr>
  </table>
  
   <br/> <br/> <br/> <br/>
  <hr/>
  <table width="700" border="3" align="center">
    <tr>
      <td>SI no</td>
      <td>Service Name</td>
      <td>Service Date</td>
      <td>Service Time</td>
      <td>Location</td>
       <td>Bookmark</td>
       <td>Comments</td>
      <td>priest</td>
      <td>Action</td>
    </tr>

    <?php 
	$selQ="select * from tb_service s inner join tb_servicetype st on st.servicetype_id=s.servicetype_id where fam_id='".$_SESSION["lgid"]."'";
	$i=0;
	$row=$conn->query($selQ);
	while($data=$row->fetch_assoc())
	{
		$i++;
	
	?>
        <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["servicetype_name"]; ?></td>
      <td><?php echo $data["service_for_date"]; ?></td>
      <td><?php echo $data["service_for_time"]; ?></td>
       <td><?php echo $data["service_location"]; ?></td>
       <td><?php echo $data["service_bookmark"]; ?></td>
       <td><?php echo $data["service_comments"]; ?></td>
    <td>
       		<?php
			if($data["priest_id"]==0)
			{
				?>
Not Yet Accepted                <?php
			}
			else
			{
				$selQa="select * from tb_priest where priest_id='".$data["priest_id"]."'";
			
				$rowa=$conn->query($selQa);
				$data1=$rowa->fetch_assoc();
				
				echo "Accepted by ".$data1["priest_name"];
				
			}
			
			?>
       </td>
       <td>
       <a href="BookService.php?id=<?php echo $data["service_id"] ?>">Cancel</a>
       </td>
    </tr>
    <?php
	}
	?>
  </table>
  
  
</form>
</body>
<?php
include("Foot.php"); 
?>
</html>