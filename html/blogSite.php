<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="../style/general.css" rel="stylesheet" type="text/css">
    <link href="../style/create.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php 
        include "header.php";
        require('db_connect.php');

        $result = $conn->query("select Titel, text from blog where Blog_ID = " . $_GET['id']);
        $result = $result->fetch_assoc();

        require('db_disconnect.php');

    ?>
    <div class="banner" style="background-image:url(../data/kreuzfahrt.jpg)">
        <h1><?php echo $result['Titel']; ?></h1>
    </div>
    <main>
        <?php echo trim($result['text']); ?>
    </main>

    <?php include "footer.html" ?>
</body>

</html>