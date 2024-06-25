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
    <?php require './components/_dbconnect.php' ?>

    <div class="container">
    <h2 class="my-5">Forum - Browse Category</h2>
    <div class="row">


    <!-- Fetch all the categories -->
     <?php
     $sql = "SELECT * FROM `categories`";
     $result = mysqli_query($conn, $sql);
     
     while($row = mysqli_fetch_assoc($result)){

        $id = $row['categories_id'];
        $cat = $row['categories_name'];
        $catDesc = $row['categories_description'];

        echo '<!-- Use a for loop to iterate through categories -->
        <div class="col-md-4 mb-4 my-4">
            <div class="card" style="width: 18rem;">
                <img src="https://img.freepik.com/free-photo/programming-background-with-person-working-with-codes-computer_23-2150010125.jpg?t=st=1719134641~exp=1719138241~hmac=2204457f2b2a4a9e45b9f25d486de1950c1ee567fbd70bb5a333e24eed6f11fc&w=740" class="card-img-top" alt="..." height="200" width="400">
                <div class="card-body">
                    <h5 class="card-title"> <a href="thredlist.php?catid='. $id .'">'. $cat .'</a></h5>
                    <p class="card-text">'. substr($catDesc, 0, 120) .'</p>
                    <a href="thredlist.php?catid='. $id .'" class="btn btn-primary">View threds</a>
                </div>
            </div>
        </div>';
     }
     ?>

    
    </div>
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