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
<body>
    <?php include "./header.php" ?>
    <div class="banner" style="background-image: url(../data/about.jpg)">
    <h1>Blog</h1>
    </div>
    <main>
        <?php
            require('db_connect.php');
            $result = $conn->query("select blog_id, titel, vorschau, u.username from blog join login_user u on (blog.autor=u.id) where blog.status = 0");
            
            $rows = $result->num_rows;
            $result = $result->fetch_all();
            //Blog-Beiträge ausgeben
            for ($i = 0; $i < $rows; $i++){
                echo '<section>
                <div class="imgCol">
                    <img src="../data/kreuzfahrt.jpg" alt="Kreuzfahrt">
                </div>
                <div class="textCol">
                    <h2><a href="blogSite.php?id=' . $result[$i][0] . '">'. $result[$i][1] . '</a></h2> 
                    <div class="authorCol">
                        <img src="../data/profile.png" alt="profile picture">
                        <p class="authorName">by ' . $result[$i][3] . '</p>
                    </div>
                    <p class="articlePreview">' . substr($result[$i][2], 0, 400) . ' ...</p> <!-- max.: 400 Zeichen -->
                </div>
            </section>';
            }

            require('db_disconnect.php');
        ?>
        
    </main>
    <?php include "./footer.html" ?>

</body>
</html>