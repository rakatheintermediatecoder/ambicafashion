<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ambica <?php echo $gender; ?> store</title>

    <link rel="stylesheet" href="./stylesheet/shop.css">
    <link rel="stylesheet" href="./stylesheet/loader.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>


    <?php
    include_once './components/loader.php';
    include_once './components/navbar.php';

    include './misc/conn.ini.php';

    if (!$conn) {
    ?>
        <div class="error">
            <span>UNABLE TO REACH SERVER<br>reload page</span>
        </div>
    <?php
    } else {

        $g = $_REQUEST['g'];
        $sql = "SELECT * FROM products where productCat = '$g'";
        $result = $conn->query($sql);
        $row = $result->fetch_all();
    ?>
<!-- required box are printed-->
        <div class="container mydiv">
            <?php
            $rowCount = count($row) / 3;
            $elementsCout = count($row);
            $initialElements = 0;
            $loopCount = 0;
            for ($rowPrint = 0; $rowPrint < $rowCount; $rowPrint++) {
            ?>
                <div class="row">
                    <?php

                    

                    for ($printable = 0; $printable < 3; $printable++) {
                        if($loopCount < $elementsCout){
                            ?>
                        <div class="col-md-4">
                            <div class="bbb_deals">
                                <div class="bbb_deals_slider_container">
                                    <div class=" bbb_deals_item">
                                        <div class="bbb_deals_image"><img src="./products/<?php echo $row[$initialElements][3].'/'.$row[$initialElements][5]; ?>" alt="" width="300px" height="300px"></div>
                                        <div class="bbb_deals_content">
                                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                                <div class="bbb_deals_item_category"><a href="#"><?php echo $row[$initialElements][3]; ?></a></div>
                                            </div>
                                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                                <div class="bbb_deals_item_name"><?php echo $row[$initialElements][1]; ?></div>
                                                <div class="bbb_deals_item_price ml-auto">₹<?php echo $row[$initialElements][2]; ?></div>
                                            </div>
                                            <a href="page.php?pid=contact&p=<?php echo $row[$initialElements][0]; ?>" type="button" class="align-self-end btn btn-lg btn-block btn-primary" style="margin-top: auto;">Mark for me</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $loopCount++;
                        }
                    $initialElements++;
                    }
                    echo "</div>";
                }
                echo "</div>";
            }
        ?>

</body>

</html>