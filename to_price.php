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

if (isset($_GET['barcode'])) {
  $barcode = $_GET['barcode'];
}else{
  $barcode = '';
}

?>
<!DOCTYPE html>
<html>

<body>

    <div style="margin-top: 10%; margin-bottom: 10%">
      <center><h3>Store Survey</h3></center>
    </div>

  	<div class="w3-container w3-card">

    	<section class="container">
      	
      	<br><a class="button-small button-outline" href="index.php">HOME 🏡</a><a style="float: right;" class="button-small button-outline" href="view_item.php">LIST <img style="width: 15px" src="img/menu.png"></a><br><br>

          <section class="price">
              <div hidden="true">
              <div id="sourceSelectPanel" style="display: block;">
                <!-- <label for="sourceSelect">Video source:</label> -->
                <select id="sourceSelect" style="width:100%" hidden="true">
                <option value="256e2672f0d971154bdc48d0350c9748404555b1e1ece38ed8649e2863a0d669">Video device 1</option></select>
              </div>

              <div class="preview-container">
                <video id="video" style="border: 1px solid lightgray; width:100%" autoplay="true" muted="true" playsinline="true"></video>
              </div><br><div id="<?=$handed;?>"><a class="button" style="width: 110px; text-align: center;" id="resetButton">Rescan</a></div>
              </div>


              <form method="post" action="insert_price.php" enctype="multipart/form-data">
                <input type="hidden" name="store" value='<?=$store;?>'>
                <input type="hidden" name="barcode" value='<?=$barcode;?>'>
                <input type="hidden" name="H" value="<?=$handed;?>">
                <input id="price" type="text" name="price" style="width: 310px" placeholder="Price">
                    <div  id="<?=$handed;?>">
                      <div class="fuzy-numKey">
                      <table>
                      <tr>
                      <td class="fuzy-numKey-lightgray fuzy-numKey-active">1</td>
                      <td class="fuzy-numKey-lightgray fuzy-numKey-active">2</td>
                      <td class="fuzy-numKey-lightgray fuzy-numKey-active">3</td>
                      </tr>
                      <tr>
                      <td class="fuzy-numKey-lightgray fuzy-numKey-active">4</td>
                      <td class="fuzy-numKey-lightgray fuzy-numKey-active">5</td>
                      <td class="fuzy-numKey-lightgray fuzy-numKey-active">6</td>
                      </tr>
                      <tr>
                      <td class="fuzy-numKey-lightgray fuzy-numKey-active">7</td>
                      <td class="fuzy-numKey-lightgray fuzy-numKey-active">8</td>
                      <td class="fuzy-numKey-lightgray fuzy-numKey-active">9</td>
                      </tr>
                      <tr>
                      <td class="fuzy-numKey-darkgray fuzy-numKey-active">.</td>
                      <td class="fuzy-numKey-lightgray fuzy-numKey-active">0</td>
                      <td class="fuzy-numKey-darkgray fuzy-numKey-active">&larr;</td>
                      </tr>
                      </table>
                      </div>
                    </div>
                <div id="<?=$handed;?>"><input style="width: 60%" type="submit" name = "submit" value="Next"></div>
              </form>
          </section>





		</section>

</div>

<?php
  include("footer.php");
?>


      <script type="text/javascript">
        
      var defaults = {
        limit: 100,
      }
      var input = $('#price');
      $(".fuzy-numKey table tr td").on("click", function() {
        if(isNaN($(this).text())) {
          if($(this).text() == '.') {
            input.val(input.val() + $(this).text());
          } else {
            input.val(input.val().substring(0, input.val().length - 1));
          }
        } else {
          input.val(input.val() + $(this).text());
          if(input.val().length >= options.limit) {
            input.val(input.val().substring(0, options.limit));
            remove();
          }
        }
      });

      </script>

      <script type="text/javascript">
        
        var barcode = '<?=$barcode;?>'
        var store = '<?=$store;?>'
        var handed = '<?=$handed;?>'

        if (barcode=='') {
          alert('Please properly scan the barcode')
          window.location = "to_barcode.php?store=" + store + "&H=" + handed;
        }
      </script>

</body>
</html>