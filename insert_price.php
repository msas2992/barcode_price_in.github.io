<?php


include ("connection.php");



if(isset($_POST["submit"])){

$barcode = $_POST['barcode'];
$price = $_POST['price'];
$store = $_POST['store'];
$handed = $_POST['H'];

		$cmd = "INSERT INTO `item` (`item_id`, `barcode`, `name`, `price`, `date`, `store`, `add2`) VALUES (NULL, '$barcode', '', '$price', '".date('Y-m-d H:i:s')."', '$store', '');";

		if ($conn->query($cmd)) {
			?>
			<script>
			 	window.location = "to_barcode.php?store=<?=$store;?>&H=<?=$handed;?>";
			</script>

		<?php
		}else
		{
			?>
			<script>
			 	window.location = 'index.php';
			 	alert('error');
			</script>

		<?php

		}

}



?>
