<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>er - earth resources | Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="../style/general.css" rel="stylesheet" type="text/css">
    <link href="../style/register.css" rel="stylesheet" type="text/css">
</head>
<?php
if (isset($_POST["send"])) {
    $eingabe = array();
    $error = array();
    $pattern = "/^[a-z0-9_-]{3,16}$/i";
    if (isset($_POST['user']) && preg_match($pattern, $_POST['user']) == 1) {
        $eingabe['user'] = htmlentities(trim($_POST['user']));
    } else {
        $error['user'] = 'user';
    }
    $pattern = "/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$/";
    if (isset($_POST['email']) && preg_match($pattern, $_POST['email']) == 1) {
        $eingabe['email'] = htmlentities(trim($_POST['email']));
    } else {
        $error['email'] = 'Email';
    }
    $pattern = "/^(?=.*[\d\W])(?=.*[a-z])(?=.*[A-Z]).{8,100}$/";
    if (isset($_POST['password1']) && preg_match($pattern, $_POST['password1']) == 1 && $_POST['password1'] == $_POST['password2']) {
        $eingabe["password"] = htmlentities(trim($_POST["password1"]));
    } else {
        $error['password'] = 'Passwort';
    }

    //DB conn für insertion einfügen 
    include 'db_connect.php';
    //Nachschauen ob Mail verbegen
    if (empty($error)) {
        $email = $eingabe['email'];
        $result = $conn->query("SELECT * FROM login_user WHERE email = $email");
        if ($result !== false) {
            $error['email'] = 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            include 'db_disconnect.php';
        }
    }


    if (empty($error)) {


        //Passwort zu hash-wert
        $passwort_hash = password_hash($eingabe['password'], PASSWORD_DEFAULT);
        $username = $eingabe['user'];
        $email = $eingabe['email'];
        $token = bin2hex(random_bytes(64));
        //DB-Insertion
        $result = $conn->query("INSERT INTO `login_user` (`id`, `username`, `email`, `password`, `status`, `last_login`, `Token`) VALUES (NULL, '$username', '$email', '$passwort_hash', '1', NULL, '$token'); ");
        echo mysqli_error($conn);
        if ($result) {
            include 'db_disconnect.php';
            require('send_auth.php');
            //header("Location: login.php");
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    } else {
        $errors = implode(', ', $error);
        $err = 'Es sind Fehler aufgetreten: ' . $errors;
    }
}
?>

<body>

    <?php include "./header.php" ?>
    <div class="banner">
        <h1>Register</h1>
    </div>
    <div id="loginScreen">
        <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="post">
            <p>Benutzername</p>
            <input type="text" pattern="[a-zA-Z0-9_-]{3,16}$" required name="user" <?php if (isset($eingabe["user"])) echo " value='" . $eingabe["user"] . "'"; ?>>
            <p>Email-Adresse</p>
            <input type="text" name="email" required pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" <?php if (isset($eingabe["email"])) echo " value='" . $eingabe["email"] . "'"; ?>>
            <p>Passwort</p>
            <input type="password" name="password1" required pattern="^(?=.*[\d\W])(?=.*[a-z])(?=.*[A-Z]).{8,100}$" <?php if (isset($eingabe["password"])) echo " value='" . $eingabe["password"] . "'"; ?>>
            <p>Passwort wiederholen</p>
            <input type="password" name="password2" required pattern="^(?=.*[\d\W])(?=.*[a-z])(?=.*[A-Z]).{8,100}$" <?php if (isset($eingabe["password"])) echo " value='" . $eingabe["password"] . "'"; ?>>
            <br>
            <input type="submit" value="Absenden" id="submit" name="send">
        </form>
        <p id="errors" style="text-align: center;">
            <?php if (isset($err)) {
                echo $err;
            } ?></p>
    </div>

    <?php include "./footer.html" ?>
</body>

</html>