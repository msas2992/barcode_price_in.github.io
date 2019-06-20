<!DOCTYPE html>
<html lang="en">

<?php
include("connection.php");
include("header.php");
?>

<head>

</head>

<body>

    
    <div style="margin-top: 10%; margin-bottom: 10%">
      <center><h3>Store Survey</h3></center>
    </div>

    <div class="w3-container w3-card">

        <section class="container">
            <div class="table-responsive"  style="width: 100%"><br>
                <a class="button-small button-outline" href="index.php">HOME 🏡</a> 
                <!-- <a style="float: right;" href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Previous</a> -->
                <br><br>
                <h4 class="title">List item scanned</h4>
                <table  id = "tablemain"  style="width: 100%">
                    <thead>
                        <tr>
                            <th style="vertical-align : middle;text-align:center;">#</th>
                            <th style="vertical-align : middle;text-align:center;">Barcode</th>
                            <th style="vertical-align : middle;text-align:center;">Store</th>
                            <th style="vertical-align : middle;text-align:center;">Price</th>
                            <th style="vertical-align : middle;text-align:center;"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //initialize first sequence
                        $no = 1;
                        $cmd = "SELECT * FROM `item` ORDER BY `item`.`date` ASC";
                        $query = mysqli_query($conn,$cmd);
                        while($result = mysqli_fetch_array($query))
                        {
                    ?> 
                        <tr>
                            <td><?=$no;?></td>
                            <td><?=$result['barcode'];?></td>
                            <td><?=$result['store'];?></td>
                            <td><?=$result['price'];?></td>
                            <td></td>
                        </tr>
                    <?php
                        $no++;
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>


 

</body>

<?php
include("footer.php");
?>


</html>
