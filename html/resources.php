<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="../style/resources.css" rel="stylesheet" type="text/css">
    <link href="../style/general.css" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/zdog@1/dist/zdog.dist.min.js"></script>
    <!--<script src="zdog-demo.js"></script>-->
    <script>
        function hide(obj) {
            obj.style.display = "none";
        }
    </script>
</head>

<body>
    <?php include "./header.html" ?>
    <div id="resourceNav">
        <p class="test" id="charts">charts</p>
        <p>-</p>
        <p class="test" id="earth">earth</p>
        <p>-</p>
        <p class="test" id="numbers">numbers</p>
    </div>
    <p onclick="hide(this)">//Hier kommt später eine Slideshow.</p>

    <div id="resourceContent">
        <main>
            <div class="stats">
                <h1 class="caption">
                    oil
                </h1>
                <div class="bar">
                    <div class="filled" id="oil"></div>
                </div>
            </div>
            <div class="stats">
                <h1 class="caption">
                    population
                </h1>
                <div class="bar">
                    <div class="filled" id="population"></div>
                </div>
            </div>
            <div class="stats">
                <h1 class="caption">
                    wasted food
                </h1>
                <div class="bar">
                    <div class="filled" id="wastedFood"></div>
                </div>
            </div>
        </main>
        <main style="display: flex; margin-top: -10vh">
            <div class="container">
                <canvas class="illo"></canvas>
            </div>
            <div class="container">
                <canvas class="illo"></canvas>
            </div>
        </main>
        <main>
            <p onclick="animate()">Dies ist ein Typoblindtext. An ihm kann man sehen, ob alle Buchstaben da sind und wie
                sie aussehen. Manchmal benutzt man Worte wie Hamburgefonts, Rafgenduks oder Handgloves, um Schriften zu
                testen. Manchmal Sätze, die alle Buchstaben des Alphabets enthalten - man nennt diese Sätze »Pangrams«.
                Sehr bekannt ist dieser: The quick brown fox jumps over the lazy old dog. Oft werden in Typoblindtexte
                auch fremdsprachige Satzteile eingebaut (AVAIL® and Wefox™ are testing aussi la Kerning), um die Wirkung
                in anderen Sprachen zu testen. In Lateinisch sieht zum Beispiel fast jede Schrift gut aus. Quod erat
                demonstrandum. Seit 1975 fehlen in den meisten Testtexten die Zahlen, weswegen nach TypoGb. 204 § ab dem
                Jahr 2034 Zahlen in 86 der Texte zur Pflicht werden. Nichteinhaltung wird mit bis zu 245 € oder 368 $
                bestraft. Genauso wichtig in sind mittlerweile auch Âçcèñtë, die in neueren Schriften aber fast immer
                enthalten sind. Ein wichtiges aber schwierig zu integrierendes Feld sind OpenType-Funktionalitäten. Je
                nach Software und Voreinstellungen können eingebaute Kapitälchen, Kerning oder Ligaturen (sehr pfiffig)
                nicht richtig dargestellt werden.Dies ist ein Typoblindtext. An ihm kann man sehen, ob alle Buchstaben
                da sind und wie sie aussehen. Manchmal benutzt man Worte wie Hamburgefonts, Rafgenduks oder Handgloves,
                um Schriften zu testen. Manchmal Sätze, die alle Buchstaben des Alphabets enthalten - man nennt diese
                Sätze »Pangrams«. Sehr bekannt ist dieser: The quick brown fox jumps over the lazy old dog. Oft werden
                in Typoblindtexte auch fremdsprachige Satzteile eingebaut (AVAIL® and Wefox™ are testing aussi la
                Kerning), um die Wirkung in anderen Sprachen zu testen. In Lateinisch sieht zum Beispiel fast jede
                Schrift gut aus. Quod erat demonstrandum. Seit 1975 fehlen in den meisten Testtexten die Zahlen,
                weswegen nach TypoGb. 204 § ab dem Jahr 2034 Zahlen in 86 der Texte zur Pflicht werden. Nichteinhaltung
                wird mit </p>
        </main>
    </div>
    <?php include "./footer.html" ?>
    <script>
        function animate() {
            console.log("test" + this);
            switch (this.innerHTML) {
                case "charts":
                    resourceContent.style.right = "0vw";
                    break;
                case "earth":
                    resourceContent.style.right = "100vw";
                    break;
                case "numbers":
                    resourceContent.style.right = "200vw";
                    break;
            }
        }
    </script>
    <script>
        let oilValue = "40%";
        let populationValue = "60%";
        let wastedFoodValue = "33%";
        let values = ['oil', 'population', 'wastedFood'];
        document.getElementById('oil').style.width = '80%';
        document.getElementById('population').style.width = '60%';
        document.getElementById('wastedFood').style.width = '33%';
        //document.getElementById('resourceContent').style.right = "00vw";

        let chartsButton = document.getElementById("charts");
        let earthButton = document.getElementById("earth");
        let numbersButton = document.getElementById("numbers");
        let resourceContent = document.getElementById("resourceContent");
        let buttons = document.getElementsByClassName('test');
        console.log(buttons);
        for (let i = 0; i < buttons.length; i++) {
            console.log('test');
            buttons[i].addEventListener('click', animate);
        }

        function animate() {
            console.log('test');
        }
    </script>
    <script src="../js/earth.js"></script>
</body>

</html>