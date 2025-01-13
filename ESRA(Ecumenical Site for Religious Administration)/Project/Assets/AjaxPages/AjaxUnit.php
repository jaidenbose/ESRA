<option value="">-------select-----</option>
        <?php
		include("../Connection/Connection.php");
		
		$selm="select * from tb_unit where place_id='".$_GET["uid"]."'";
		$rowm=$conn->query($selm);
		while($datam=$rowm->fetch_assoc())
		{
		?>
        <option value="<?php echo $datam["unit_id"]?>"> <?php echo $datam["unit_name"];?> </option>
		<?php	
		}
		 ?>