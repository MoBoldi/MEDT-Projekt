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
                <h3><?php
                    //Username und Mail ausgeben in Account.php
                    require('db_connect.php');
                    //username ausgeben
                    $result = $conn->query("SELECT username FROM login_user where email='" . $_SESSION["user"] . "'");


                    if ($result->num_rows > 0) {
                        echo $result->fetch_row()[0];
                    }
                    require('db_disconnect.php');
                    ?></h3>
                <p><?php echo $_SESSION['user']; ?></p>
            </div>
        </div>
        <?php
        //Blog-Beiträge des Users auflisten 
        require('db_connect.php');
        $result = $conn->query("select status, id from login_user where email = '" . $_SESSION['user'] . "'");
        $result = $result->fetch_assoc();
        //check ob User Admin oder Autor
        if ($result['status'] == 3 || $result['status'] == 2) {
            $result = $conn->query("SELECT titel, Blog_ID FROM blog WHERE Autor = " . $result['id']);
            $rows = $result->num_rows;
            $result = $result->fetch_all();
            //Blog-Beiträge ausgeben
            echo '
                <div class="accountData">
                    <h3>Eigene Beiträge</h3>
                    <button id="neuBtn">Neu</button>
                </div>
                    <div id="userEntrys">
                    <div id="entrys">';
            for ($i = 0; $i < $rows; $i++) {
                echo '<div class="entry" style="background-image:url(../data/kreuzfahrt.jpg)">
                    <a style="all:unset" href="blogSite.php?id=' . $result[$i][1] . '"><h3>' . $result[$i][0] . '</h3>
                    </a>
                    <div style="display: flex; ">
                    <a href="create.php?id='. $result[$i][1] .'" style="margin: 5px"><img src="../data/edit.png" alt="edit" width="30px" height="30px"></a>
                    <a onclick="deleteBlog(event)" style="margin: 7px" id='. $result[$i][1] .'><img src="../data/delete.png" alt="delete" width="30px" height="30px"></a>
                    </div></div>';
            }
            echo "</div></div>";
        }
        require('db_disconnect.php');
        ?>

        <div class="accountData">
            <h3>Profilbild</h3>
            <button id="chgProfilbild">Ändern</button>
        </div>
        <hr>
        <div class="accountData">
            <h3>Author werden</h3>
            <button id="becomeAutor">Beantragen</button>
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

    <div id="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p class="addModal">Vor welchem Block soll der Neue hinzugefügt werden?</p>
            <p class="deleteModal">Welcher Block soll gelöscht werden? (Überschriften werden auch als Block gezählt.)</p>
            <p class="publishModal">Der Beitrag wird bald von einem Mitarbeiter überprüft und dann endgültig veröffentlicht. Wenn sie den Beitrag erneut Speichern, dann wird dieser wieder zu einem Entwurf und sie müssen erneut auf "Veröffentlichen" klicken.</p>
            <select id="bloecke"></select>
            <select class="addModal" id="blockType">
                <option>Textblock</option>
                <option>Überschrift</option>
                <option>Unterüberschrift</option>
            </select>
            <button class="addModal" id="addBlockBtn">Hinzufügen</button>
            <button class="addModal" id="addEnd">Am Schluss einfüggen</button>
            <button class="deleteModal" id="deleteBlockBtn">Wirklich löschen?</button>
        </div>
    </div>

    <?php include "./footer.html" ?>
    <script>
        //MODAL 
        let modal = document.getElementById('modal');
        let span = document.getElementsByClassName("close")[0];

        span.addEventListener('click', () => {
            modal.style.display = "none";
        });

        window.addEventListener('click', (event) => {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });


        let neuBtn = document.getElementById("neuBtn");
        let logoffBtn = document.getElementById('logoff');

        logoffBtn.addEventListener('click', () => {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.href = '/medt-projekt/html/';
                }
            }
            xhttp.open('POST', 'logoff.php', true);
            xhttp.send();
        });

        //Custom Buttons
        neuBtn.addEventListener('click', function() {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.reload();
                }
            }
            xhttp.open('POST', 'db_create_blog.php', true);
            xhttp.send();
        });

        let chgProfilbild = document.getElementById('chgProfilbild');
        let becomeAutor = document.getElementById('becomeAutor');

        chgProfilbild.addEventListener('click', function() {

        });

        function edit(event){
            window.location.href = "localhost/medt-projekt/html/create.php?id="+event.id;
        }
        function deleteBlog(event){
            console.log(event.target);
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200){
                    console.log(this.responseText);
                }
            }
            xhttp.open('POST', 'db_delete_blog.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + event.target.parentElement.id); 
        }
    </script>
</body>

</html>