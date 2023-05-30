<?php
if (!isset($_COOKIE['logindata'])) {
    header('Location: admin.php');
} else {
    if (session_start()) {
        $_SESSION['loginStatus'] = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <script src="https://kit.fontawesome.com/581bb64942.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/upload.scss">
    <link rel="stylesheet" href="./assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/581bb64942.js" crossorigin="anonymous"></script>
    <script>
        // Prevent dropdown menu from closing when click inside the form
        $(document).on("click", ".navbar-right .dropdown-menu", function(e) {
            e.stopPropagation();
        });
    </script>

    <script>
        function showHint(str) {
            if (str == "") {
                document.getElementById("searcheditems").innerHTML = "";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("searcheditems").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "searchItem.php?q=" + str, true);
            xmlhttp.send();
        }
    </script>

</head>

<body>
    <!-- importing navbar -->
    <?php
    include "components/navbar.php";
    
    include './conn.ini.php';
    $sql = "SELECT * FROM inqiryProduct WHERE queryId NOT IN (SELECT * FROM checkedInqery)";
    $result = $conn->query($sql);
    $count = count($result->fetch_all());
    $msgcount = '';

    if($count != 0){
        $msgcount = '('.(string)$count.')';
    }


    ?>
    <!-- HTML !-->

    <div class="container">
        <div class="center">
            <a  href="page.php?pid=upload" class="button-52">Upload New Products</a>
        </div>
    </div>
    <div class="container">
        <div class="center">
            <a  href="page.php?pid=inquery" class="button-52">Check inquery <?php echo $msgcount;?></a>
        </div>
    </div>
    <div class="form">
        <form onsubmit="event.preventDefault();" role="search">
            <input id="productSearch" onkeyup="showHint(this.value)" class="search" type="number" placeholder="Search..." autofocus required />
            <span><i class="fa-solid fa-magnifying-glass"></i></span>
        </form>
    </div>

    <table class="table" id="searcheditems"></table>
</body>

</html>