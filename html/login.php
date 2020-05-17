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
            include 'db_connect.php';

            $stmt = "SELECT status from login_user where email='" . $eingabe["email"]."'";
            $result = $conn->query($stmt);
            if ($result->fetch_row()[0] == 1){
                $error['authentication'] = 'Authentication';
            }

            include 'db_disconnect.php';
        }

        if (empty($error)) {
            session_start();
            include 'db_connect.php';
            $passwort_hash = password_hash($eingabe['password'], PASSWORD_DEFAULT);
            $result = $conn->query("SELECT * FROM login_user WHERE email = '".$eingabe["email"]."' AND password = '" . $passwort_hash . "'");
            //$user = $result->fetch_all();
                
            //Überprüfung des Passworts
            if ($result !== false) {
                //Mail-Adresse des Users in Session speichern 
                $_SESSION['user'] = $eingabe['email'];
                header("Location: index.php");
                die();
            } else {
                $error['Datenbank'] = "E-Mail oder Passwort war ungültig<br>";
            }

            

            include 'db_disconnect.php';

            
            
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
        <p style="text-align: center">Noch kein Account?<a href="register.php">Hier registrieren!</a></p>
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