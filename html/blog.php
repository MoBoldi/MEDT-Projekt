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
    <link href="../style/blog.css" rel="stylesheet" type="text/css">
</head>
<!--<body scroll="no" style="overflow-y: hidden" id="0">-->
<body>
    <?php include "./header.html" ?>
    <div class="banner">
    <h1>Tipps für ein besseres Klima</h1>
    </div>
    <main>
    <section id="1">
        <div class="imgCol">
            <img src="../data/kreuzfahrt.jpg" alt="Kreuzfahrt">
        </div>
        <div class="textCol">
            <h2><a href="blogSite.php">3 Dinge über Kreuzfahrten</a></h2> <!-- max. 38 Zeichen -->
            <div class="authorCol">
                <img src="../data/profile.png" alt="profile picture">
                <p class="authorName">by Max Mustermann</p>
            </div>
            <p class="articlePreview">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the ...</p> <!-- max.: 400 Zeichen -->
        </div>
    </section>
    <section id="2">
        <div class="textCol left">
            <h2>Fleischkonsum, Umwelt und Klima</h2> <!-- max. 38 Zeichen -->
            <div class="authorCol">
                <img src="../data/profile.png" alt="profile picture">
                <p class="authorName">by Max Mustermann</p>
            </div>
            <p class="articlePreview">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the ...</p> <!-- max.: 400 Zeichen -->
        </div>
        <div class="imgCol">
            <img src="../data/fleisch.jpg" alt="fleisch">
        </div>
    </section>
    </main>
    <?php include "./footer.html" ?>

    <!--<script>
        document.getElementsByTagName('section')[0].style.paddingTop = "80px";
        let maxBookmarks = 2;

        let left = document.getElementsByClassName('left');
        for (let i = 0; i < left.length; i++){
            let obj = left[i].children[1];
            console.log(left[i].children[1]);
            left[i].children[1].style.flexDirection = "row-reverse";
            obj.children[0].style.marginLeft = "10px";
            obj.children[0].style.marginRight= "0";
            
        }
    </script>
    <script src="../js/scroll.js"></script>-->
</body>
</html>