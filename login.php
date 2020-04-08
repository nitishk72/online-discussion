<?php
    require('./utils/env.php');
    session_start();
    $isAuth = $_SESSION["isLoggedIn"] ?? false; 
    
    $PAGE_TITLE = "Login";
    
    if($isAuth){
        header("Location: ${BASE_URL}dashboard"); 
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require('./services/auth.php');
         $auth = new Auth("LOGIN", $_POST);
          $auth->do();
          if($auth->status)
              header("Location: ${BASE_URL}dashboard"); 
          else
                header("Location: ${BASE_URL}login?msg={$auth->msg}"); 
         return;
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
            <?php if(isset($_GET['msg'])):?>
                <div class="alert alert-danger">
                    <?= $_GET['msg'] ?>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="./login" method="post">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit"  name="submit" value="Login" class="btn btn-block btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require('./partials/footer.php') ?>
</body>
</html>