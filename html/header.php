<header>
    <div class="headerSides">
        <img id="logo" src="../data/logo.png" alt="Logo">
    </div>
    <nav>
        <div><a href="index.php">home</a></div>
        <!--<div>|</div>-->
        <div class="dropdown">
            <button class="dropbtn"><span>ressourcen</span> 
              <i class="fa fa-caret-down" style="padding-left: 10px;position: absolute;"></i>
            </button>
            <div class="dropdown-content">
              <a href="stats.php">Statistik</a>
              <a href="earths.php">ökologischer Fußabdruck</a>
              <a href="numbers.php">Zahlen</a>
            </div>
        </div>
        <!--<div>|</div>-->
        <div><a href="protests.php">proteste</a></div>
        <!--<div>|</div>-->
        <div><a href="blog.php">blog</a></div>
    </nav>
    <div class="headerSides" id="login">
        <?php 
            session_start();
            if (isset($_SESSION['user'])){
                echo "<p><a href='account.php'>Profil</a></p>";
            } else {
                echo "<p><a href='login.php'>Login</a></p>";
            }
        ?>
    </div>
</header>
