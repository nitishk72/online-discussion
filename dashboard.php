<?php
    require('./utils/env.php');
    session_start();
    $PAGE_TITLE = "Dashboard";
    include './utils/env.php';
    $con = new mysqli($SERVER,$USERNAME,$PASSWORD,$DATABASE);
    $query = "SELECT * from`question` order by id desc";
    $result = $con->query($query);
    $con->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('./partials/head.php') ?>
</head>

<body>
    <?php require('./partials/navigation.php') ?>
    <div class="container" style="min-height:70vh">
        <div class="row mt-4 ">
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-header">Technology</div>

                <ul class="list-group">
                    <?php foreach(['php','javascript','laravel','html','css'] as $item): ?>
                    <li class="list-group-item"><?= $item ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-9">
                <?php while($row = $result->fetch_assoc()): ?>
                <div class="card mb-4">
                    <div class="card-header"><?= $row['title'] ?></div>
                    <div class="card-body">
                        <?= $row['question'] ?>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div>
                            <?= $row['timestamp'] ?>
                        </div>
                        <div>
                            <a href="./discussion/<?= $row['id'] ?>" class="btn btn-secondary">Read Discussion</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php require('./partials/footer.php') ?>
</body>

</html>