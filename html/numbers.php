<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>er - earth resources | The World in numbers.</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="../style/general.css" rel="stylesheet" type="text/css">
    <link href="../style/numbers.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "./header.html" ?>
    <div class="banner">
    <h1>Numbers</h1>
    </div>
    <main>
        <table>
            <tr>
                <th>Numbers</th>
                <th>Bezeichnung</th>
            </tr>
            <tr>
                <td>7.760.842.903</td>
                <td>Aktuelle Weltbevölkerung</td>
            </tr>
            <tr>
                <td>410.452</td>
                <td>Verlorene Hektar Wald</td>
            </tr>
            <tr>
                <td>552.521</td>
                <td>Verlorenes Land durch Bodenerosionen (ha)</td>
            </tr>
            <tr>
                <td>2.849.985.952</td>
                <td>CO2 Emissionen</td>
            </tr>
            <tr>
                <td>947.100</td>
                <td>Desertifikation (ha)</td>
            </tr>
        </table>
    </main>
    
    <?php include "./footer.html" ?> 

    <script>
        let numbers = document.getElementsByTagName('tr');
        setInterval(function(){
            increase(1, 40);
            increase(2, 3);
            increase(3, 4);
            increase(4, 30);
            increase(5, 5);
        }, 1000);

        function increase(i, raise){
            numbers[i].children[0].innerHTML = (parseInt(numbers[i].children[0].innerHTML.replace(/[.]/g, ""))+raise).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
        }
    </script>
</body>

</html>