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

<body>

    <div style="margin-top: 10%; margin-bottom: 10%">
      <center><h3>Store Survey</h3></center>
    </div>

  	<div class="w3-container w3-card">

    	<section class="container">
      	
      	<br><a class="button-small button-outline" href="index.php">HOME 🏡</a><a style="float: right;" class="button-small button-outline" href="view_item.php">LIST <img style="width: 15px" src="img/menu.png"></a><br><br>

          <section class="cameras">
            <h4 >Store : <?=$store;?></h3>
              <div id="sourceSelectPanel" style="display: block;">
                <!-- <label for="sourceSelect">Video source:</label> -->
                <select id="sourceSelect" style="width:100%" hidden="true">
                <option value="256e2672f0d971154bdc48d0350c9748404555b1e1ece38ed8649e2863a0d669">Video device 1</option></select>
              </div>

              <div class="preview-container">
                <video id="video" style="border: 1px solid lightgray; width:100%" autoplay="true" muted="true" playsinline="true"></video>
              </div><br>
               
              <form method="get" action="to_price.php" enctype="multipart/form-data">
              	<input type="hidden" name="store" value='<?=$store;?>'>
                <input type='text' name='barcode' style="width: 100%" id='result' placeholder="Barcode" :value="result.text" />
                <div id="<?=$handed;?>"><a class="button" style="width: 110px; text-align: center;" id="resetButton">Rescan</a></div>
                <div id="<?=$handed;?>"><input type="submit" style="width: 110px; text-align: center;" value="Next"></div>
                <!-- <div id="<?=$handed;?>"><a class="button" style="width: 110px; text-align: center;" href="view_item">Scanned</a></div> -->
                <div id="<?=$handed;?>"><a class="button" style="width: 110px; text-align: center;" href="index.php">Finish</a></div>
                <input type="hidden" name="H" value="<?=$handed;?>">
              </form>
          </section>

		</section>

</div>

<?php
  include("footer.php");
?>

      <script type="text/javascript">
        window.addEventListener('load', function () {
          let selectedDeviceId;
          const codeReader = new ZXing.BrowserMultiFormatReader()
          console.log('ZXing code reader initialized')
          codeReader.getVideoInputDevices()
            .then((videoInputDevices) => {
              const sourceSelect = document.getElementById('sourceSelect')
              selectedDeviceId = videoInputDevices[0].deviceId
              if (videoInputDevices.length >= 1) {
                videoInputDevices.forEach((element) => {
                  const sourceOption = document.createElement('option')
                  sourceOption.text = element.label
                  sourceOption.value = element.deviceId
                  sourceSelect.appendChild(sourceOption)
                })

                sourceSelect.onchange = () => {
                  selectedDeviceId = sourceSelect.value;
                };

                const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                sourceSelectPanel.style.display = 'block'
              }

              // document.getElementById('startButton').addEventListener('click', () => {
                codeReader.decodeFromInputVideoDeviceContinuously(selectedDeviceId, 'video', (result, err) => {
                  if (result) {
                    console.log(result)
                    document.getElementById('result').textContent = result.text
                    document.getElementById('result').value = result.text
                    // alert(result.text.length)
                    if (result.text.length>1) {
                      $("#video").hide();
                    }
                  }
                  if (err && !(err instanceof ZXing.NotFoundException)) {
                    console.error(err)
                    document.getElementById('result').textContent = err
                  }
                })
                console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
              // })

              document.getElementById('resetButton').addEventListener('click', () => {
                // codeReader.reset()
                document.getElementById('result').textContent = '';
                document.getElementById('result').value = '';
                $("#video").show();
                
              })

            })
            .catch((err) => {
              console.error(err)
            })
        })
      </script>

      <script type="text/javascript">
        
        var store = '<?=$store;?>'

        if (store=='') {
          alert('Choose store to proceed')
          window.location = 'index.php';
        }
      </script>

</body>
</html>