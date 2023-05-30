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
$sql = "INSERT INTO checkedInqery VALUES (?)";
if (!$conn) {
    echo 'unable to delete your product';
} else {

    $smtm = $conn->prepare($sql);
    $smtm->bind_param('i', $id);
    $smtm->execute();
    $conn->close();
    header('Refresh: 0.4 , url=page.php?pid=inquery');
}