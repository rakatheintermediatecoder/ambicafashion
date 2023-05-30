<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer inquery</title>



    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://kit.fontawesome.com/581bb64942.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/upload.scss">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/581bb64942.js" crossorigin="anonymous"></script>

    <style>
        table,
        th,
        tr,
        thead,
        tbody {
            font-size: 1.5rem;
        }

        table * {
            text-align: center;
            align-items: center;
            margin: 1rem;
        }

        table tbody tr td a {
            background: green;
            font-size: 1rem;
            padding: 1.3rem;
            color: #FFF;
            border-radius: 5px;
            transition: all 0.1s ease-in-out;
        }

        table tbody tr td a:hover {
            color: red;
            background: transparent;
            border: 1px solid green;
        }
    </style>

</head>

<body>

    <?php
    include './components/navbar.php';
    include_once './conn.ini.php';


    ?>
    <div class="container">
        <h1 class="text-center">
            Customer Enqueries
        </h1>
    </div>
    <table class="table" id="searcheditems">
        <thead>
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <?php

        if ($conn) {
            $sql = "SELECT * FROM inqiryProduct WHERE queryId NOT IN (SELECT * FROM checkedInqery)";
            $result = $conn->query($sql);
            foreach ($result as $row) {
        ?>
                <tr>
                    <td scope="row"><?php echo $row["productId"]; ?></td>
                    <td scope="row"><?php echo $row["name"]; ?></td>
                    <td scope="row"><?php echo $row["mobile"]; ?></td>
                    <td scope="row"><?php echo $row["email"]; ?></td>
                    <td scope="row"><?php echo $row["query"]; ?></td>
                    <td><a href="check.php?id=<?php echo $row["queryId"]; ?>"><i class="fa-sharp fa-solid fa-check"></i></a></td>
                </tr>
            <?php
            }
            ?>
    </table>
<?php
        }

?>
</body>

</html>