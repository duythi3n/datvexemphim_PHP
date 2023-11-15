<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Ticket Booking System</title>

    <?php
        include_once ('templates/styles.php')
    ?>

    <style>

        .container h2 {
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #222;
            font-size: 30px;
        }

        .part-line {
            border-bottom: solid 2px red;
            margin-bottom: 25px;
            margin-top: 25px;
        }

        .image-container {
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.3s ease;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay-buttons {
            text-align: center;
            display: none;
        }

        .image-container:hover .overlay {
            opacity: 1;
        }

        .image-container:hover .overlay-buttons {
            display: block;
        }

        .overlay-buttons a {
            color: #fff;
            padding: 10px 20px;
            margin-right: 10px;
            text-decoration: none;
            border: 1px solid #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .overlay-buttons a:hover {
            background-color: #fff;
            color: #000;
        }

        .image-container h6 {
            text-align: right;
        }

        .overlay-button {
            width: 150px;
        }

        .modal-dialog {
            max-width: 1500px;
            margin-top: -1rem;
        }

    </style>

</head>
<body>

<?php

include("templates/header.php");

?>

<div class="container">
    <img src="assets/images/theatre_2.jpg" alt="" class="image-resize" style="width: 100%; height: 400px;">
</div>

<div class="container">
    <h2 class="part-line">Running Movies</h2>
    <div class="row">
        <?php
        require_once("config/db_connect.php");
        $result = $conn->query("SELECT * FROM movies");

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row['running'] == 1) {
                    ?>

                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="image-container">
                            <img src="admin/image/<?php echo $row['image']; ?>" alt="" class="img-fluid image-resize2">
                            <div class="overlay">
                                <div class="overlay-buttons">
                                    <div class="col">
                                        <div class="row">
                                            <a href="movie_details.php?pass=<?php echo $row['id']; ?>" class="btn btn-primary mx-auto overlay-button">
                                                <i class="fa fa-ticket"></i>
                                                Book Now
                                            </a>
                                        </div>
                                        <div class="row">
                                            <a class="mt-3 btn btn-dark text-center mx-auto overlay-button" data-toggle="modal" data-target="#trailer_modal<?php echo $row['id']; ?>">
                                                <i class="fa fa-play"></i>
                                                Trailer
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mt-2 mb-1"><b><?php echo $row['title']; ?></b></h5>
                            <h6 class="mt-2 mb-1"><?php echo $row['language']; ?></h6>
                        </div>
                    </div>

                    <div class="modal fade" id="trailer_modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog vh-100 vw-100 d-flex align-items-center justify-content-center" role="document">
                                <div class="modal-content mx-auto" style="height: 80%; width: 100%;">
                                    <iframe src="<?php echo $row['trailer_link']; ?>" frameborder="0" class="modal-iframe w-100 h-100" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share; fullscreen"></iframe>
                                </div>
                        </div>
                    </div>



                    <?php
                }
            }
        }

        ?>
    </div>
</div>

<div class="container">
    <h2 class="part-line">Upcoming Movies</h2>
    <div class="row">
        <?php
        $result = $conn->query("SELECT * FROM movies");

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row['running'] == 0) {
                    ?>
                    <div class="image-box">
                        <div class="col-lg-2 col-md-3 col-sm-6">

                            <div class="card" style="width: 12rem;">
                                <img class="card-img-top image-resize4" src="admin/image/<?php echo $row['image']; ?> "
                                     alt="Card image cap">

                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                                    <p class="card-text">Director: <?php echo $row['director']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        }
        ?>

    </div>
</div>


    <?php
    include("templates/footer.php");
    ?>




</body>
</html>