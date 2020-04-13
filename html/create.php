<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>er - earth resources | Statistics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="../style/general.css" rel="stylesheet" type="text/css">
    <link href="../style/create.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <?php include "./header.php" ?>
    <div class="banner" style="background-image:url(../data/statistics.jpg)">
        <h1 id="Titel" contenteditable="true"><?php 
            include "db_select_entry.php";
            echo $titel;
        ?></h1>
    </div>
    <main>
        <div id="editable">
            <?php echo $text ?>
        </div>
        <button id="deleteBtn">Löschen</button>
        <button id="addBtn">Einfügen</button>
        <button id="saveBtn">Speichern</button>
        <button id="publishBtn">Veröffentlichen</button>
        <button id="cancelBtn">Cancel</button>
        <div id="test"></div>
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
        let deleteBtn = document.getElementById('deleteBtn');
        let deleteBlockBtn = document.getElementById('deleteBlockBtn');
        let addBlockBtn = document.getElementById('addBlockBtn');
        let addBtn = document.getElementById('addBtn');
        let saveBtn = document.getElementById('saveBtn');
        let publishBtn = document.getElementById('publishBtn');
        let cancelBtn = document.getElementById('cancelBtn');
        let modal = document.getElementById('modal');
        let span = document.getElementsByClassName("close")[0];
        let addSpan = document.getElementsByClassName("close")[1];
        let bloecke = document.getElementById('bloecke');
        let editable = document.getElementById('editable');
        let blockType = document.getElementById('blockType');
        let end = document.getElementById('addEnd');
        cancelBtn.addEventListener('click', () => {
            save(2);
            window.history.back();
        });
        end.addEventListener('click', () => {
            editable.appendChild(addElement());
        });
        publishBtn.addEventListener('click', () => {
            save(1);
            hideElements('addModal', 'deleteModal', 'publishModal');
            bloecke.style.display = 'none';
            modal.style.display = "block";
        });
        deleteBtn.addEventListener('click', () => {
            getBloecke();
            hideElements('addModal', 'publishModal', 'deleteModal');
            bloecke.style.display = 'inline-block';
            modal.style.display = "block";
        });
        addBtn.addEventListener('click', () => {
            getBloecke();
            hideElements('deleteModal', 'publishModal', 'addModal');
            bloecke.style.display = 'inline-block';
            modal.style.display = "block";
        });

        deleteBlockBtn.addEventListener('click', () => {
            editable.removeChild(editable.children[(bloecke.selectedOptions[0].innerHTML) - 1]);
            getBloecke();
        });

        addBlockBtn.addEventListener('click', () => {
            editable.insertBefore(addElement(), editable.children[(bloecke.selectedOptions[0].innerHTML) - 1]);
        });

        saveBtn.addEventListener('click', () => {
            save(2);
            
        })

        function addElement() {
            blockType = document.getElementById('blockType');
            switch (blockType.value) {
                case "Textblock":
                    let p = document.createElement('p');
                    let text = document.createTextNode(
                        'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,justo.'
                    );
                    p.append(text);
                    p.setAttribute('contenteditable', 'true');
                    return p;
                case "Überschrift":
                    let h2 = document.createElement('h2');
                    let ueberschrift = document.createTextNode('Überschrift');
                    h2.setAttribute('contenteditable', 'true');
                    h2.append(ueberschrift);
                    return h2;
                case "Unterüberschrift":
                    let h3 = document.createElement('h3');
                    let unterueberschrift = document.createTextNode('Unterüberschrift');
                    h3.setAttribute('contenteditable', 'true');
                    h3.append(unterueberschrift);
                    return h3;
            }
        }

        function save(status) {
            let text = editable.innerHTML;
            text = text.replace(/contenteditable="true"/g, 'contenteditable="false"');
            let titel = document.getElementById('Titel').innerHTML;
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    document.getElementById('test').innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", 'db_insert_blog.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`titel=${titel}&text=${text}&status=${status}`);
        }

        function getBloecke() {
            editable = document.getElementById('editable');
            bloecke.innerHTML = '';
            for (let i = 0; i < editable.children.length; i++) {
                bloecke.innerHTML += "<option>" + (i + 1) + "</option>";
            }
            bloecke.value = bloecke.lastChild.innerHTML;
        }
        
        span.addEventListener('click', () => {
            modal.style.display = "none";
        });
        window.addEventListener('click', (event) => {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });

        function hideElements(hide1, hide2, show) {
            let toHide1 = document.getElementsByClassName(hide1);
            let toHide2 = document.getElementsByClassName(hide2);
            let toShow = document.getElementsByClassName(show);
            let i;
            for (i = 0; i < toHide1.length; i++) {
                toHide1[i].style.display = "none";
            }
            for (i = 0; i < toHide2.length; i++){
                toHide2[i].style.display = "none";
            }
            for (i = 0; i < toShow.length; i++) {
                toShow[i].style.display = "block";
                if (i > 0) {
                    toShow[i].style.display = "inline-block";
                }
            }
        }
    </script>

</body>

</html>