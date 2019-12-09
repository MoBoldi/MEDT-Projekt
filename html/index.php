<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>er - earth resources | home site</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="../style/general.css" rel="stylesheet" type="text/css">
    <link href="../style/index.css" rel="stylesheet" type="text/css">
</head>

<body scroll="no" style="overflow-y: hidden" id="0">
    <?php include "./header.html" ?>

    <main>
        <h1>earth resources</h1>
        <section id="1">
            <div class="imgCol">
                <img src="../data/statistics.jpg" alt="Statistiken Bild">
            </div>
            <div class="textCol">
                <h2>resources</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to </p>
            </div>
        </section>
        <section id="2">
            <div class="textCol left">
                <h2>protests</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to </p>
            </div>
            <div class="imgCol">
                <img src="../data/climate01.jpg" alt="Climate Protests">
            </div>
        </section>
        <section id="3">
            <div class="imgCol">
                <img src="../data/statistics.jpg" alt="Statistiken Bild">
            </div>
            <div class="textCol">
                <h2>about us</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to </p>
            </div>
        </section>
    </main>
    <?php include "./footer.html" ?>
    <script>
        document.getElementsByTagName('section')[0].style.paddingTop = "80px";
    </script>
    <script>
        let index = 0;
        let bookmarks = [];
        let maxBookmarks = 4;
        document.getElementsByTagName('footer')[0].id = maxBookmarks;
        for (let i = 0; i < maxBookmarks+1; i++){
            bookmarks.push(document.getElementById(''+i));
        }
        let scrollValue = 470;
        let html = document.getElementsByTagName('html')[0];
        let maxScrollHeight = html.scrollHeight - html.clientHeight;
        html.addEventListener('wheel', function(event) {
            if (event.deltaY < 0) {
                //scrolling up
                if (index > 0){
                    goto(index -= 1);
                }
            } else if (event.deltaY > 0) {
                //scrolling down
                if (index <= maxBookmarks-1){
                    goto(index += 1);
                }
            }
        });        
        function goto(anchor){
            window.location.href = "#"+anchor;
        }
    </script>
</body>

</html>