<?php

include("connection.php");
include("header.php");

if (isset($_GET['H'])) {
  $handed = $_GET['H'];
}else{
  $handed = '';
}

if (isset($_GET['store'])) {
  $store = $_GET['store'];
}else{
  $store = '';
}

?>
<!DOCTYPE html>
<html>

<style type="text/css">
	#right {
    width: 100%;
    text-align: -webkit-right;
  }

  #left {
    width: 100%;
    text-align: -webkit-left;
  }
</style>

<body>

    <div style="margin-top: 10%; margin-bottom: 10%">
      <center><h3><b>Store Survey</b></h3></center>
    </div>

  	<div class="w3-container w3-card">

    	<section class="container">
      	
      	<br><a class="button-small button-outline" href="index.php"><b>HOME</b> 🏡</a><a style="float: right;" class="button-small button-outline" href="view_item.php"><b>LIST</b> <img style="width: 15px" src="img/menu.png"></a><br><br>


    <?php    
    if (strcasecmp($store, '')==0) {
    ?>
      <form method="get" action="" enctype="multipart/form-data">
        <center>Choose your dominant hand</center><br>
        <input type="submit" name="H" value="left"><input style="float: right;" name="H" type="submit" value="right">
      </form>
    <?php
    }

    if (strcasecmp($handed, '')<>0) {
		?>
			<!-- <h4 class="title">Barcode Scanner</h4> -->
			<form method="get" action="to_barcode.php" enctype="multipart/form-data">
                <!-- <label>Choose a store</label> -->
                <select class="form-control" name="store" style="width:100%" >
                    <option value="" selected="selected">Choose your store</option>
                    <option value="Tesco">Tesco</option>
                    <option value="Mydin">Mydin</option>
                    <option value="Aeon">Aeon</option>
                    <option value="Aeon Big">Aeon Big</option>
                    <option value="Giant">Giant</option>
                </select><br>
				<div id="<?=$handed;?>"><input type="submit" value="Next"></div>
        <input type="hidden" name="H" value="<?=$handed;?>">
      </form>
		</section>

    <?php
  }
  ?>

</div>

<?php
  include("footer.php");
?>


</body>
</html>