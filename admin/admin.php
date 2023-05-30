<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambica | SignIN</title>
    <link rel="stylesheet" href="./assets/css/admin.css">
</head>

<body>
    <img src="./images/logo.png" alt="ambica">
    <div>
        
        
        <form method="POST" action="login.php">
            <h1>Sign In</h1>
            <label>Email</label>
            <input id="email" type="text" placeholder="Enter email" name="user">
            <span class ="error"><?php ?> </span>
            <label>Password</label>
            <!-- <label for="">Forgot Password?</label> -->
            <input id="pass" type="password" placeholder="Enter password" name="pass">

            <input id="signIn" type="submit" value="Log IN">
        </form>

    </div>
</body>

</html>

<script src="signIn.js"></script>