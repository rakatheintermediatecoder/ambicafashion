<?php

if (session_start()) {
    if (!$_SESSION['loginStatus']) {
        if (!isset($_COOKIE['logindata'])) {
            header('Location: ./admin.php');
        }
    }
}

$id = (int)$_REQUEST['id'];

include_once "conn.ini.php";
$sqlDelete = "DELETE FROM products WHERE productId = $id";
$sqlGetImgURL = "SELECT productCat,productImgUrl from products where productId = ?";
if (!$conn) {
    echo 'unable to delete your product';
} else {

    $smtm = $conn->prepare($sqlGetImgURL);
    $smtm->bind_param('i', $id);
    $smtm->execute();
    $result = $smtm->get_result();
    $row = $result->fetch_assoc();

    if ($conn->query($sqlDelete)) {
        unlink('../products/' . $row['productCat'] . '/' . $row['productImgUrl']);
        $conn->close();
?>
        <script>
            alert("Product: <?php echo $id; ?> deleted sucessfully");
        </script>
<?php
        header('Refresh: 0.4 , url=dashboard.php');
    }
}
