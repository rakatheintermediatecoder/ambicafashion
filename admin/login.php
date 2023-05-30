<?php
include_once "conn.ini.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if (!$conn) {
        echo "failed";
    }
    else {
        $sql = "SELECT * FROM admin where user = ?";
        $smtm = $conn->prepare($sql);
        $smtm->bind_param('s', $user);
        $smtm->execute();

        $result = $smtm->get_result();
        // print_r($result);

        $row = $result->fetch_assoc();
        // print_r($row);

        if($user == $row['user'] && $pass == $row['pass']){
            $conn->close();
            setcookie("logindata", "true", time()+1800, "/");
            header("Location: dashboard.php");
        }
    }
}
?>