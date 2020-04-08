<?php
   require('./utils/env.php');
   session_start();
   $isAuth = $_SESSION["isLoggedIn"] ?? false; 
   
   $PAGE_TITLE = "ASK ";

   if(!$isAuth){
        header("Location: ${BASE_URL}login"); 
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('./partials/head.php') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
</head>

<body>
    <?php require('./partials/navigation.php') ?>
    <div class="container" style="min-height:70vh">
        <h1 class="text-center"></h1>
        <div class="row">
            <div class="col-md-8 offset-md-2 my-4">
                <div class="card">
                    <div class="card-header">
                        Query Form
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="topic">Topic</label>
                            <select name="topic" id="topic" class="form-control">
                                <?php foreach(['php','javascript','laravel','html','css'] as $item): ?>
                                <option value="<?= $item ?>"><?= $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea name="question" id="question" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="button" onclick="addQuestion()" value="Submit"
                                class="btn btn-primary btn-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require('./partials/footer.php') ?>
    <script>
        var simplemde = new SimpleMDE({
            element: document.getElementById("question"),
            spellChecker: false
        });
        let title = document.getElementById('title');
        let topic = document.getElementById('topic');
        let question = document.getElementById('question');
        function addQuestion() {
            let iTitle = title.value;
            let iTopic = topic.value;
            if (!simplemde.isPreviewActive())
                simplemde.togglePreview();
            let iQuestion = document.getElementsByClassName("editor-preview")[0].innerHTML;
            send2Server({ iTitle, iTopic, iQuestion });
        }

        function send2Server({ iTitle, iTopic, iQuestion }) {
            fetch('<?= $BASE_URL.'api/ask' ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `title=${iTitle}&topic=${iTopic}&question=${iQuestion}`
            })
            .then(res => res.json())
            .then(handleSuccess)
                .catch(handleError)
        }

        function handleSuccess(res){
            window.location.href = `<?= $BASE_URL?>/discussion/${res}`;
            // console.log(res);
        }
        function handleError(err){
            console.log(err);
        }
    </script>
</body>

</html>