<?php

session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Squre Forum</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Topic
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Contact</a>
                    </li>
                </ul>';
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    echo '<form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <p class="text-white mb-0 mx-2">Welcome '. $_SESSION['user_email'] .'</p>
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal" type="submit">Log Out</button>';

                }
                else{
                echo '<form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <p>Welcome Vikas</p>
                <div class="mx-2">
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal" type="submit" >login</button>

                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal" type="submit">Sign Up</button>
                </div>';
                }

            echo'</div>
        </div>
    </nav>';

    include '_loginmodal.php';
    include '_signupmodal.php';

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Sign Up Successfully!</strong> Please go to the login page.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }

?>