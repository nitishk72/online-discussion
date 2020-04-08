<?php 
    require('./utils/nav_links.php'); 

    $isAuth = $_SESSION["isLoggedIn"] ?? false; 
    
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="./">Discussion Forum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <?php foreach ($nav_links as $nav_link): ?>
                <?php if($nav_link['auth'] == $isAuth): ?>
                <li class="nav-item active p-2">
                    <a class="nav-link" href="<?= $nav_link['link'] ?>"><?= $nav_link['name'] ?></a>
                </li>
                <?php endif ?>
            <?php endforeach ?>
            </ul>
        </div>
    </div>
</nav>