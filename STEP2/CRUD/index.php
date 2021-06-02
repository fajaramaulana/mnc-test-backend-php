<?php

// Include database file
include 'connection.php';

$article = new Article();
$s_keyword = "";
if (isset($_POST['search'])) {
    $s_keyword = $_POST['s_keyword'];
}
// Delete record from table
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $article->deleteArticle($deleteId);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Article</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>

    <div class="container mt-5">
        <h2>Articles
            <a href="create.php" class="btn btn-primary" style="float:right;">Create Article</a>
        </h2>
        <form method="POST" action="">
            <div class="row mb-3">
                <div class="col-sm-12">
                    <h4>Cari</h4>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" placeholder="Keyword" name="s_keyword" id="s_keyword" class="form-control" value="<?php echo $s_keyword; ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <button id="search" name="search" class="btn btn-warning">Cari</button>
                </div>
            </div>
        </form>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Content</th>
                    <th>Publish Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (@$_POST['s_keyword'] == null) {
                    $articles = $article->showData();
                } else {
                    $articles = $article->searchArticle();
                }
                $i = 1;
                foreach ($articles as $dataArticle) {
                    
                ?>
                    <tr>
                        <td><?php echo $i;
                            $i++; ?></td>
                        <td><?php echo $dataArticle['title'] ?></td>
                        <td><?php echo $dataArticle['description'] ?></td>
                        <td><?php echo $dataArticle['content'] ?></td>
                        <td><?php echo $dataArticle['publish_date'] ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="edit.php?editId=<?php echo $dataArticle['id'] ?>">Edit</a> <br>
                            <a class="btn btn-danger btn-sm" href="index.php?deleteId=<?php echo $dataArticle['id'] ?>" onclick="confirm('Are you sure want to delete this record')">Delete</i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>