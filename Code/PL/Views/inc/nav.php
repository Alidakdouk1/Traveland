<?php
session_start()
?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php"><span>Traveland</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto" id="navLinks">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="destination.php" class="nav-link">Destination</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="checkPage.php" class="nav-link">Check</a></li>
                <?php if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){ ?>
                <li class="nav-item cta" style="margin-right: 10px;"><a href="Login1.php" class="nav-link">Sign in</a></li>
                <?php }else{ ?>
                <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
                    
                <?php } ?>
                <li class="nav-item cta"><a href="LogoutServerSide.php" class="nav-link">LogOut</a></li>
            </ul>
        </div>
    </div>
</nav>