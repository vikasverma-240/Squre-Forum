<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Squre Forum - For Learners</title>
</head>

<body>
    <?php include './components/_header.php' ?>
    <?php include './components/_dbconnect.php' ?>

    

<?php 

$showAlert = false;

$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST'){
    // Insert into comment into db
    $id = $_GET['thredid'];
    $comment = $_POST['comments'];

    $sql = " INSERT INTO `comments` (`comment_content`, `thred_id`, `comment_by`, `comments_time`) VALUES ('$comment', '$id', '0', CURRENT_TIMESTAMP)";
    $result = mysqli_query($conn, $sql);

    $showAlert = true;

    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your comment has been added.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }


}

?>
<?php


$id = $_GET['thredid'];
$sql = "SELECT * FROM `thred` WHERE thred_id = $id";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {

    $id = $row['thred_id'];
    $thred_ques = $row['thred_title'];
    $thred_ques_desc = $row['thred_desc'];

    echo '<div class="container my-4">
    <div class="jumbotron">
        <h1 class="display-4">' . $thred_ques . '</h1>
        <p class="lead">' . $thred_ques_desc . ' </p>
        <hr class="my-4">
        <p>Hey this is a pear to pear QA platform so keep posting your question and get the answer.</p>
        <p class=""><b>Posted By - Vikas Verma</b></p>
    </div>

</div>';
}

?>
    <div class="container">
        <h2>Post A Comment</h2>
    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
            <div class="mb-3">
                <label for="comments" class="form-label">Type your ans or Comments</label>
                <textarea class="form-control" placeholder="" id="comments" name="comments"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Post A Comments</button>
        </form>
    </div>

    <div class="container">
        <h2 class="py-2">Discussion</h2>
        <?php

        $id = $_GET['thredid'];
        $sql = "SELECT * FROM `comments` WHERE thred_id = $id";
        $result = mysqli_query($conn, $sql);

        $noResult = true;

        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;

            $id = $row['comments_id'];
            $content = $row['comment_content'];
            $comment_time = $row['comments_time'];

            echo '<div class="media d-flex gap-3 my-3">
            <img src="./components/userDefault.png" height="50" width="50" alt="" srcset="">
            <div class="media-body">
                <p class="font-weight-bold my-0">Anonimus User at '. $comment_time .'</p>
                <p>' . $content . '</p>
            </div>
        </div>';

        }

        ?>
    </div>

    


    <?php require './components/_footer.php' ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


</body>

</html>