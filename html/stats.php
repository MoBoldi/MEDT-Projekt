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
    <link href="../style/stats.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "./header.php" ?>
    <div class="banner" style="background-image:url(../data/statistics.jpg)">
    <h1>Statistik</h1>
    </div>
    <main>
        <div class="stats">
            <span class="tooltiptext">Hinweis: In Farbe sieht man hier das noch übrige Öl der Erde. <br>Man sieht hier die Differenz seit 2017. <br>Öl wird in den nächsten Jahren immer teurer, da die Öl-Gewinnungsmethoden immer aufwendiger werden. Außerdem ist davon auszugehen, dass das Öl nicht bis zum berechneten Zeitpunkt hält, da unsesr Ölverbrauch stetig steigt. </span>
            <h1 class="caption">
                Wie viel Öl haben wir noch auf der Erde? 
            </h1>
            <div class="bar">
                <div class="filled" id="oil"></div>
            </div>
            <br>
            <div class="info" style="top: -30px;">
                <p>0</p>
                <p>2.600.000.000.000</p>
            </div>
            <div class="numbers" style="margin-top: -40px">
                <h3>100.000.000 Barrel pro Tag verbraucht</h3>
                <h3 id="usedOil"></h3>
                <h3 id="oilOvershoot"></h3>
            </div>
        </div>
        
        <div class="stats">
            <span class="tooltiptext">Hinweis: Hier sieht man wie viele Lebensmittel jährlich weggeschmissen werden. In Farbe sieht man, die Menge an noch genießbaren Essen.</span>
            <h1 class="caption">
                Wie viele Lebensmittel sind noch genießbar und werden weggeschmissen?
            </h1>
            <div class="bar">
                <div class="filled" id="wastedFood"></div>
            </div>
            <div class="info">
                <p>0</p>
                <p>1.300.000.000.000 Tonnen</p>
            </div>
            <div class="numbers">
                <h3>2 Drittel sind noch genießbar</h3>
                <h3>2 Mrd. Menschen könnte man damit ernähren</h3>
                <h3>821 Mio. Menschen hungern</h3>
            </div>
        </div>

        <div class="stats">
            <span class="tooltiptext">Hinweis: Bis 2015 wurden 6.9 Mrd. Tonnen Plastik produziert. Nur 9% (in Farbe) davon wurden recycelt. <br>Plastik hält 450 bis "unendlich" Jahre.</span>
            <h1 class="caption">
                Wie viel Plastik wird recycelt? 
            </h1>
            <div class="bar">
                <div class="filled" id="plastic"></div>
            </div>
            <div class="info">
                <p>0</p>
                <p>6.900.000.000.000 Tonnen</p>
            </div>
            <div class="numbers">
                <h3>79% landen auf einem Depot oder in der Umwelt</h3>
                <h3>12% wurden verbrannt</h3>
                <h3>450 Jahre hält Plastik mindestens</h3>
            </div>
        </div>
    </main>

    <?php include "./footer.html" ?>

    <script>
        let oilValue;
        let plasticValue = "9%";
        let wastedFoodValue = "66%";
        let usedOil = document.getElementById('usedOil');
        let oilOvershoot = document.getElementById('oilOvershoot');
        
        //Öl-Werte berechnen
        let oil2017 = 2600000000000;
        let daily = 100000000;
        let guessDate = new Date(2017, 03, 08);
        let today = new Date();
        let daysSince = (today - guessDate) / (1000 * 3600 * 24);
        oilValue = 100*((oil2017 - (daily*daysSince))/oil2017);
        let usedOilPercent = 100 - oilValue;
        usedOil.innerHTML = usedOilPercent.toFixed(2) + "% seit 2017 verbraucht";
        let oilLeft = oil2017 / daily;
        oilOvershoot.innerHTML = ((oilLeft / 350) + 2017).toFixed(0) + " geht unser Öl aus"; 
 


        //Balken füllen
        document.getElementById('oil').style.width = oilValue + "%";
        document.getElementById('wastedFood').style.width = wastedFoodValue;
        document.getElementById('plastic').style.width = plasticValue;


    </script>
</body>

</html>