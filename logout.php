<?php
   require('./utils/env.php');
   session_start();
    $PAGE_TITLE = "Logout";
    require('./services/auth.php');
    $auth = new Auth("LOGOUT");
    if($auth->do()){
        header("Location: ${BASE_URL}index"); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php require('./partials/head.php') ?>
</head>
<body>
    <?php require('./partials/navigation.php') ?>
    <div class="row mt-4  d-flex justify-content-center align-items-center" style="min-height:70vh">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <h1>Logged OUT</h1>
                </div>
            </div>
        </div>
    </div>
    <?php require('./partials/footer.php') ?>
</body>
</html>