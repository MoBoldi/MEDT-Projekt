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
            <span class="tooltiptext">Tooltip text</span>
            <h1 class="caption">
                Öl
            </h1>
            <div class="bar">
                <div class="filled" id="oil"></div>
            </div>
            <br>
            <div class="info">
                <p>0</p>
                <p>2.600.000.000.000</p>
            </div>
            <div class="numbers">
                <h3>100.000.000 Barrel am Tag</h3>
                <h3 id="usedOil"></h3>
                <h3>Test</h3>
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

    <?php include "./footer.html" ?>

    <script>
        let oilValue;
        let populationValue = "60%";
        let wastedFoodValue = "33%";
        let usedOil = document.getElementById('usedOil');
        //Öl-Werte berechnen
        let oil2017 = 2600000000000;
        let daily = 100000000;
        let guessDate = new Date(2017, 03, 08);
        let today = new Date();
        let daysSince = (today - guessDate) / (1000 * 3600 * 24);
        oilValue = 100*((oil2017 - (daily*daysSince))/oil2017);
        let usedOilPercent = 100 - oilValue;
        usedOil.innerHTML = usedOilPercent + "% seit 2017 verbraucht";
        let values = ['oil', 'population', 'wastedFood'];
        document.getElementById('oil').style.width = '80%';
        document.getElementById('population').style.width = '60%';
        document.getElementById('wastedFood').style.width = '33%';

    </script>
</body>

</html>