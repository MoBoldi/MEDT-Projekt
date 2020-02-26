<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>er - earth resources | login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="../style/general.css" rel="stylesheet" type="text/css">
    <link href="../style/login.css" rel="stylesheet" type="text/css">

</head>
<?php 
    if (isset($_POST["send"])) {
        $eingabe = array();
        $error = array();
        $pattern = '/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$/';
        if(isset($_POST["email"]) && preg_match($pattern, $_POST["email"]) == 1){
            $eingabe["email"] = htmlentities(trim($_POST["email"]));
        } else {
            $error['email'] = 'Email';
        }
        $pattern = '/^(?=.*[\d\W])(?=.*[a-z])(?=.*[A-Z]).{8,100}$/';
        if(isset($_POST["password"]) && preg_match($pattern, $_POST["password"]) == 1){
            $eingabe["password"] = htmlentities(trim($_POST["password"]));
        } else {
            $error['password'] = 'Passwort';
        }

        if (empty($error)) {
            session_start();
            if (!isset($_SESSION['email'])){
                $_SESSION['email'] = $eingabe['email'];
                $_SESSION['eingeloggt'] = true;
            }
            $filename = "log.csv";
            $mode = "a";
            $handle = fopen($filename, $mode);
            $logEntry = "\nlogin;".date('Y-m-d').";-;".$eingabe['email'].";".$eingabe['password'];
            fwrite($handle, $logEntry);
            fclose($handle);
            //header("Location: index.php");
            //die();
        } else {
            $errors = implode(', ', $error);
            $err = 'Es sind Fehler aufgetreten: '.$errors;
        }
    }
?>

<body>
    <?php include "./header.php" ?>
    <div class="banner">
    <h1>Login</h1>
    </div>
    <div id="loginScreen">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <p>Email-Adresse</p>
            <input type="text" title="soon" name="email" required
                pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                <?php if(isset($eingabe["email"])) echo " value='".$eingabe["email"]."'"; ?>>
            <p>Passwort</p>
            <input type="password" title="soon" name="password" required
                pattern="^(?=.*[\d\W])(?=.*[a-z])(?=.*[A-Z]).{8,100}$"
                <?php if(isset($eingabe["password"])) echo " value='".$eingabe["password"]."'"; ?>>
            <br>
            <input type="submit" value="Absenden" name="send">
        </form>
        <p>Noch kein Account?<a href="register.php">Hier registrieren!</a></p>
        <p id="errors" style="text-align: center;">
            <?php if(isset($err)){ echo $err; }?></p>
    </div>
    <div id="loggedIn">
        <p>You are already logged in.</p>
    </div>
    <?php include "./footer.html" ?>
    
    <script>
        let loginScreen = document.getElementById('loginScreen');
        let loggedIn = document.getElementById('loggedIn');
        if (<?php echo isset($_SESSION['eingeloggt']);?>){
            loginScreen.style.display = 'none';
            loggedIn.style.display = 'block';
        }
    </script>
</body>

</html>