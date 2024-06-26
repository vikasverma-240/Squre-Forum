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
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE categories_id=$id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $catName = $row['categories_name'];
        $catDescription = $row['categories_description'];
    }

    ?>


<?php 

$showAlert = false;

$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST'){
    // Insert into thred into db

    $th_title = $_POST['title'];
    $th_desc =$_POST['desc'];

    $sql = "INSERT INTO `thred` (`thred_title`, `thred_desc`, `thred_cat_id`, `thred_user_id`, `date`) VALUES ('$th_title', '$th_desc', '$id', '0', CURRENT_TIMESTAMP)";
    $result = mysqli_query($conn, $sql);

    $showAlert = true;

    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your Question has been saved.Please wait for community response.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }


}

?>

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Hello, Welcome to the <?php echo $catName; ?> forum!</h1>
            <p class="lead"><?php echo $catDescription; ?></p>
            <hr class="my-4">
            <p>Hey this is a pear to pear QA platform so keep posting your question and get the answer.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>

    </div>
    <div class="container">
        <h2>Start a Discussion</h2>
    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Eleborate Your Concern </label>
                <textarea class="form-control" placeholder="" id="desc" name="desc"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <div class="container">
        <h2 class="py-2">Browse Questions</h2>

        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `thred` WHERE thred_cat_id = $id";
        $result = mysqli_query($conn, $sql);

        // If any question is not forund in anuy of the category
        $noResult = true;

        while ($row = mysqli_fetch_assoc($result)) {

            $noResult = false;

            $id = $row['thred_id'];
            $thred_ques = $row['thred_title'];
            $thred_ques_desc = $row['thred_desc'];
            $thred_time = $row['date'];

            echo '<div class="media d-flex gap-3 my-3">
            <img src="./components/userDefault.png" height="50" width="50" alt="" srcset="">
            <div class="media-body">
                <p class="font-weight-bold my-0">Anonimus User at '. $thred_time .'</p>
                <h5 class="mt-0"><a href="thred.php?thredid=' . $id . ' ">' . $thred_ques . '</a></h5>
                <p>' . $thred_ques_desc . '</p>
            </div>
        </div>';
        }
        echo var_dump($noResult);
        if ($noResult) {
            echo '<div class="h-100 p-5 bg-light border rounded-3 mb-3">
          <p class="display-4">No threads Found.</p>
          <p class="lead">Be the first person to ask a question.</p>
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