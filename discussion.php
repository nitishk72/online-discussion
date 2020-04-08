<?php
    require('./utils/env.php');
   session_start();

    $PAGE_TITLE = "Discussion";
    $id = $_GET['q'];
    include './utils/env.php';
    $con = new mysqli($SERVER,$USERNAME,$PASSWORD,$DATABASE);
    $query = "SELECT * from`question` where id = $id";
    $result = $con->query($query);
    $row = $result->fetch_assoc();
    $con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php require('./partials/head.php') ?>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

</head>
<body>
    <?php require('./partials/navigation.php') ?>
    <div class="container my-4"  style="min-height:70vh">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mb-4">
                    <div class="card-body">
                        <h1>
                        <?= $row['title'] ?>
                        </h1>
                        <hr>
                        <?= $row['question'] ?>
                        <hr>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea class="form-control" name="answer" id="answer" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit Answer" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require('./partials/footer.php') ?>
</body>
</html>