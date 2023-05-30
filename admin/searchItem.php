<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include "conn.ini.php";
    ?>
    <?php
    if ($conn) {
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        $conn->close();

        $q = $_REQUEST["q"];
        ?>
        <thead>
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Delete Product</th>
            </tr>
        </thead>
        </tbody>
    <?php
        foreach ($result as $val) {
            if (stristr($val['productId'], $q)) {
                echo '
                    <tr>
                        <th scope="row">'.$val['productId'].'</th>
                        <td>'.$val['productName'].'</td>
                        <td><a href="delete.php?id='.$val['productId'].'"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                ';
            }
        }
        ?>
        </tbody>
        <?php
    } else {
        $hint = "Could not load hint";
    }
    ?>
</body>

</html>