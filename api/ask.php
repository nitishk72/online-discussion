<?php

$title = $_POST['title'];
$topic = $_POST['topic'];
$question = $_POST['question'];
include '../utils/env.php';
$con = new mysqli($SERVER,$USERNAME,$PASSWORD,$DATABASE);

$query = "INSERT INTO 
            `question`(`title`, `topic`, `question`) 
            VALUES 
            ('$title', '$topic', '$question')";

$con->query($query);

echo $con->insert_id;

$con->close();