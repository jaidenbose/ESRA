<?php
	include("../Connection/Connection.php");
?>

<option value="">---SELECT----</option>
<?php
    $AjaxQ="select * from tb_place where district_id='".$_GET["did"]."'";
	//echo $AjaxQ;
    $AjaxR=$conn->query($AjaxQ);
    while($AjaxD=$AjaxR->fetch_assoc())
    {
        ?>
        <option value="<?php echo $AjaxD["place_id"]?>"> <?php echo $AjaxD["place_name"]?> </option>
        <?php
    }
?>
<body>
</body>
</html>