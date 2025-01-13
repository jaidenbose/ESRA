 <table width="700" border="3" align="center">
    <tr>
      <td>SI no</td>
      <td>Date</td>
      <td>Family</td>
      <td>Booked By</td>
      <td>Contact No.</td>
      <td>Function</td>
      <td>Details</td>
      
    </tr>

    <?php 
	include("../Assets/Connection/Connection.php");

	
	$selQ="select * from tb_bookauditorium s inner join tb_family st on st.fam_id=s.fam_id inner join tb_auditorium a on a.auditorium_id=s.auditorium_id";
	$i=0;
	$row=$conn->query($selQ);
	while($data=$row->fetch_assoc())
	{
		$i++;
	
	?>
        <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["booked_date"]; ?></td>
       <td><?php echo $data["fam_name"]; ?></td>
        <td><?php echo $data["fam_headname"]; ?></td>
         <td><?php echo $data["fam_contact"]; ?></td>
       <td><?php echo $data["booking_name"]; ?></td>
      
       <td><?php echo $data["book_details"]; ?></td>
    
    </tr>
    <?php
	}
	?>
  </table>