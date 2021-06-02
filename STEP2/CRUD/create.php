<?php

// Include database file
include 'connection.php';

$article = new Article();

// Insert Record in Article table
if (isset($_POST['submit'])) {
    $article->createArticle($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Article</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <style>
        #datepicker {
            width: 180px;
        }

        #datepicker>span:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1>Edit Article</h1>
        <form action="create.php" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Enter Description" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" rows="5" cols="40" placeholder="Enter Content" required></textarea>
            </div>
            <div class="form-group">
                <label for="name">Tanggal</label>
                <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                    <input class="form-control" type="text" name="date" readonly />
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
        </form>
    </div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>
    $(function() {
        $("#datepicker").datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());
    });
</script>

</html>