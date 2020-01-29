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
    <?php include "./header.html" ?>
    <h1>Statistik</h1>

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

    <?php include "./footer.html" ?>

    <script>
        let oilValue = "40%";
        let populationValue = "60%";
        let wastedFoodValue = "33%";
        let values = ['oil', 'population', 'wastedFood'];
        document.getElementById('oil').style.width = '80%';
        document.getElementById('population').style.width = '60%';
        document.getElementById('wastedFood').style.width = '33%';

    </script>
</body>

</html>