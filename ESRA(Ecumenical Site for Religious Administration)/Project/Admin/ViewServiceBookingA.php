 <table width="700" border="3" align="center">
    <tr>
      <td>SI no</td>
      <td>Service Name</td>
      <td>Service Date</td>
       <td>Service Time</td>
      <td>Service Location</td>
      <td>Bookmark</td>
       <td>Comments</td>
       <td>Requested By</td>
       <td>Contact No.</td>
      <td>Status</td>
    </tr>

    <?php 
	include("../Assets/Connection/Connection.php");

	
	$selQ="select * from tb_service s inner join tb_servicetype st on st.servicetype_id=s.servicetype_id inner join tb_family f on f.fam_id=s.fam_id ";
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
        <td><?php echo $data["fam_headname"]; ?></td>
         <td><?php echo $data["fam_contact"]; ?></td>
          <td>
       		<?php
			if($data["priest_id"]!=0)
			
			{
				$selQa="select * from tb_priest where priest_id='".$data["priest_id"]."'";
			
				$rowa=$conn->query($selQa);
				$data1=$rowa->fetch_assoc();
				
				echo "Accepted By ".$data1["priest_name"];
				
			}
			
			?>
       </td>
    
    </tr>
    <?php
	}
	?>
  </table>