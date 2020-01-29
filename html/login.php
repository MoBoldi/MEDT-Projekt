<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>er - earth resources | home site</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="../style/general.css" rel="stylesheet" type="text/css">
    <link href="../style/login.css" rel="stylesheet" type="text/css">
    <!--<script src="../js/verifyInput.js"></script>-->
    <script>
        console.log('test');
        function verify (){
    let email = document.forms['email'];
    console.log(email);
}
    </script>
</head>

<body>
    <?php include "./header.html" ?>
    <h1>Login</h1>
    <div id="loginScreen">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <p>Email-Adresse</p>
            <input type="text" title="soon" name="email" required pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$">
            <p>Passwort</p>
            <input type="password" title="soon" name="password" required pattern="^(?=.*[\d\W])(?=.*[a-z])(?=.*[A-Z]).{8,100}$">
            <br>
            <input type="submit" value="Absenden">
        </form>
    </div>
    
    <?php include "./footer.html" ?> 
</body>

</html>