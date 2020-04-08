<?php
    require('./utils/env.php');
    session_start();

    $PAGE_TITLE = "Homepage";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('./partials/head.php') ?>
</head>

<body>
    <?php require('./partials/navigation.php') ?>
    <div class="jumbotron text-white" style="background: #00539c;">
        <div class="container extra-spacing">
            <h1 class="display-4 text-center">Discussion Forum</h1>
            <h2 class="text-center" style="font-weight:100;">
                Place where you can discuss anything and everything.
            </h2>
        </div>
    </div>
    <div class="extra-spacing">
        <div class="container mt-4">
            <div class="row featurette d-flex align-items-center">
                <div class="col-md-7 mb-2">
                    <h2 class="featurette-heading">We are open to everyone.<br>
                        <span class="text-muted">Ask you doubts, let's help each other</span>
                    </h2>
                    <p class="lead"> I help you, you help me. Let's help each other in growing and build an awesome
                        career.</p>
                </div>
                <div class="col-md-5">
                    <img src="https://nitishk72.tk/images/undraw_publish_article_icso.svg" style="width:100%"
                        alt="Publish article">
                </div>
            </div>
        </div>
    </div>

    <div style="background:#f7f7f7" class="extra-spacing">
        <div class="container extra-spacing">
            <div class="row d-flex align-items-center extra-spacing">
                <div class="col-md-7 order-md-2">
                    <h2>Sharing is <span class="text-muted">Caring</span></h2>
                    <p class="lead"><br>Share your knowledge with community and community will forward to
                        others.<br><b>#ThrowBackTimes</b><br><br></p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img src="https://nitishk72.tk/images/undraw_shared_workspace_hwky.svg" style="width:100%"
                        alt="Share Knowledge">
                </div>
            </div>
        </div>
    </div>


    <div class="extra-spacing">
        <div class="container mt-4">
            <div class="row featurette d-flex align-items-center">
                <div class="col-md-7 mb-2">
                    <h2 class="featurette-heading">I want to be Professional<br>
                        <span class="text-muted">We can be professional by growing each day by 1%.</span>
                    </h2>
                    <p class="lead">
                        Every professional was once a beginner and 
                        there is only one thing which made them Professional : Handwork. 
                    </p>
                </div>
                <div class="col-md-5">
                    <img src="https://nitishk72.tk/images/undraw_publish_article_icso.svg" style="width:100%"
                        alt="publish article">
                </div>
            </div>
        </div>
    </div>

    <?php require('./partials/footer.php') ?>
</body>

</html>