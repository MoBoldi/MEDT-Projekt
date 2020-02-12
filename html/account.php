<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>er - earth resources | Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="../style/general.css" rel="stylesheet" type="text/css">
    <link href="../style/account.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    <?php include "./header.html" ?>
    <h1>Account</h1>

    <main>
        <div id="account">
            <img id="logo" alt="your logo" src="../data/profile.png" width="100px" height="100px">
            <h3>Benutzername</h3>
            <p>email@adresse.com</p>
        </div>
        <div id="userEntrys">
            <h3>Eigene Beiträge</h3>
            <div id="entrys">
                <div class="entry"></div>
                <div class="entry"></div>
                <div class="entry"></div>
                <div class="entry"></div>
            </div>
        </div>
        <div id="accountData">
            <div>
                <h3>Profilbild</h3>
                <button>Ändern</button>
                <hr>
            </div>
            <div>
                <h3>Benutzername</h3>
                <button>Ändern</button>
                <hr>
            </div>
            <div>
                <h3>Email-Adresse</h3>
                <button>Ändern</button>
                <hr>
            </div>
            <div>
                <h3>Passwort</h3>
                <button>Ändern</button>
                <hr>
            </div>
            <div>
                <h3>Author werden</h3>
                <button>Beantragen</button>
                <hr>
            </div>
            <div>
                <h3>Konto löschen</h3>
                <button>Löschen</button>
                <hr>
            </div>
        </div>
    </main>

    <?php include "./footer.html" ?>

</body>

</html>