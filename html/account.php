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
    
    <?php include "./header.php" ?>
    <div class="banner">
        <h1>Account</h1>
    </div>
    <main>
        <div id="account">
            <img id="logo" alt="your logo" src="../data/profile.png" width="100px" height="100px">
            <div>
            <h3>Benutzername</h3>
            <p>email@adresse.com</p>
            </div>
        </div>
        
        <div class="accountData">
                <h3>Eigene Beiträge</h3>
                <button onclick="document.location.href='create.php';">Neu</button>
            </div>
            <div id="userEntrys">
            <div id="entrys">
                <div class="entry" style="background-image:url(../data/kreuzfahrt.jpg)">
                    <h3>3 Dinge über Kreuzfahrten</h3>
                </div>
                <div class="entry" style="background-image:url(../data/fleisch.jpg)">
                    <h3>Fleischkonsum, Umwelt und Klima</h3>
                </div>
                <div class="entry" style="background-image:url(../data/kreuzfahrt.jpg)">
                    <h3>Platzhalter</h3>
                </div>
                <div class="entry" style="background-image:url(../data/fleisch.jpg)">
                    <h3>Platzhalter</h3>
                </div>
            </div>
        </div>
            <div class="accountData">
                <h3>Profilbild</h3>
                <button>Ändern</button>
            </div>
            <hr>
            <div class="accountData">
                <h3>Benutzername</h3>
                <button>Ändern</button>
            </div>
            <hr>
            <div class="accountData">
                <h3>Email-Adresse</h3>
                <button>Ändern</button>
            </div>
            <hr>
            <div class="accountData">
                <h3>Passwort</h3>
                <button>Ändern</button>
            </div>
            <hr>
            <div class="accountData">
                <h3>Author werden</h3>
                <button>Beantragen</button>
            </div>
            <hr>
            <div class="accountData">
                <h3>Konto löschen</h3>
                <button id="delete">Löschen</button>
            </div>
            <hr>
            <div class="accountData">
                <h3>Abmelden</h3>
                <button id="logoff">Abmelden</button>
            </div>
            <hr>
    </main>

    <?php include "./footer.html" ?>
    <script>
        let logoffBtn = document.getElementById('logoff');
        logoffBtn.addEventListener('click', ()=>{
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.href = '/medt-projekt/html/';
                }
            }
            xhttp.open('POST', 'logoff.php', true);
            xhttp.send();
        });
    </script>
</body>

</html>
