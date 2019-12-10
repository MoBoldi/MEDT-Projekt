<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="../style/resources.css" rel="stylesheet">
    <link href="../style/general.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <?php include "./header.html" ?>
    <div id="resourcesNav">
        <p>charts</p>
        <p>-</p>
        <p>earth</p>
        <p>-</p>
        <p>numbers</p>
    </div>
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
    <script>
        let oilValue = "40%";
        let populationValue = "60%";
        let wastedFoodValue = "33%";
        let values = ['oil', 'population', 'wastedFood'];
        document.getElementById('oil').style.width = '80%';
        document.getElementById('population').style.width = '60%';
        document.getElementById('wastedFood').style.width = '33%';
        
        /*$(function () {
            $('[data-toggle="tooltip"]').tooltip({
                trigger: 'manual'
            }).tooltip('show');
        });

        // $( window ).scroll(function() {   
        // if($( window ).scrollTop() > 10){  // scroll down abit and get the action   
        $(".progress-bar").each(function () {
            each_bar_width = $(this).attr('aria-valuenow');
            $(this).width(each_bar_width + '%');
        });

        //  }  
        // });*/
    </script>
</body>

</html>