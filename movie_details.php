<?php
session_start();

require_once("config/db_connect.php");
$id = $_GET['pass'];
$result = mysqli_query($conn, "SELECT * FROM movies WHERE id = '" . $id . "'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>

    <!-- Css Styles -->
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['title']; ?> Movie Details</title>


    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
    <!--    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">-->
    <link rel="stylesheet" href="assets/css/slicknav.min.css" type="  text/css">
    <!--    <link rel="stylesheet" href="assets/css/fonts-googleapis.css" type="  text/css">-->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <style>

        .modal-dialog {
            max-width: 1500px;
            margin-top: -1rem;
        }

        .image-container {
            overflow: hidden;
            position: relative;
        }

        .detail{
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

        .detail-button {
            text-align: center;
            display: none;
        }

        .image-container:hover .detail {
            opacity: 1;
        }

        .image-container:hover .detail-button {
            display: block;
        }

        .detail-buttons a {
            color: #fff;
            padding: 10px 20px;
            margin-right: 10px;
            text-decoration: none;
            border: 1px solid #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .detail-buttons a:hover {
            background-color: #fff;
            color: #000;
        }

        .image-container h6 {
            text-align: right;
        }

        .detail-button {
            width: 150px;
        }

    </style>

</head>
<body>
<?php
include("templates/header.php");
require_once("config/db_connect.php");
$movieId = $_GET['pass'];

$query = "SELECT * FROM movies m JOIN genre g ON m.genre_id = g.id WHERE m.id = '" . $id . "'";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {
$id = $row['id'];
?>

<section id="aboutUs">
    <div class="fluid-container">
        <!-- Trailer Embed -->
        <div class="row mt-4" style="background-color: black;">
            <div class="d-flex justify-content-center w-100">
                <img src="uploads/<?php echo $row['image']; ?>" class="img-fluid position-relative"
                     style="height: 500px; width: 600px;" alt="Movie Image">
                <button type="button"
                        class="btn bg-white btn-play position-absolute rounded-circle d-flex align-items-center justify-content-center"
                        style="top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 24px; width: 64px; height: 64px;"
                        data-toggle="modal" data-target="#trailer_modal<?php echo $row['id']; ?>">
                    <i class="fa fa-play"></i>
                </button>
            </div>
        </div>

        <div class="modal fade" id="trailer_modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog vh-100 vw-100 d-flex align-items-center justify-content-center" role="document">
                <div class="modal-content mx-auto" style="height: 80%; width: 100%;">
                    <iframe src="<?php echo $row['trailer_link']; ?>" frameborder="0" class="modal-iframe w-100 h-100"
                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share; fullscreen"></iframe>
                </div>
            </div>
        </div>

    </div>
    <div class="container">


        <div class="row feature design">

            <div class="col-lg-4"><img src="admin/image/<?php echo $row['image']; ?>" class="resize-detail"
                                       alt="" width="100%"></div>
            <div class="col-lg-5">
                
                <div>
                    <h2 class="mt-5"><?php echo $row['title']; ?></h2>

                    <div class="mb-4">
                        <ion-icon class="text-warning" name="calendar-outline"> </ion-icon> <?php echo $row['release_date']; ?>
                    </div>

                    <div class="mb-4">
                        <h4>Giám đốc: <?php echo $row['director']; ?></h4>
                    </div>

                    <div class="mb-4">
                        <h4>Thể loại: <?php echo $row['genre_name']; ?></h4>
                    </div>

                    <div class="mb-4">
                        <h4>Ngôn ngữ: <?php echo $row['language']; ?></h4>
                    </div>             
                </div>
            </div>
            <div class="col-lg-3">
                <div class="h4 pb-2 mb-4 text-black border-bottom border-danger">
                    Phim đang chiếu
                </div>
                <div class="row">
                    <?php
                    $currentMoviesQuery = "SELECT id, title, image FROM movies WHERE running = 1";
                    $currentMoviesResult = mysqli_query($conn, $currentMoviesQuery);

                    if (mysqli_num_rows($currentMoviesResult) > 0) {
                        while ($currentMovie = mysqli_fetch_assoc($currentMoviesResult)) {
                            ?>
                            <div class="col-md-12 mb-3">
                                <div class="image-container">
                                    <div class="text-center position-relative">
                                        <img src="uploads/<?php echo $currentMovie['image']; ?>" class="img-fluid mb-4" alt="Movie Image">
                                        <h5 class="card-title"><?php echo $currentMovie['title']; ?></h5>
                                        <div class="detail">
                                            <div class="detail-button">
                                                <div class="col">
                                                    <div class="row">
                                                        <a class="btn btn-primary" href="movie_details.php?pass=<?php echo $currentMovie['id']; ?>">
                                                            Xem chi tiết
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        echo "No currently running movies.";
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if ($row['running'] == 1) { ?>
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-12 pb-2 mb-4 text-black border-bottom border-danger">
                            <h4>Lịch chiếu</h4>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $query = "SELECT st.id as showtime_id, s.screen_number, t.theater_name, st.showtime 
                                              FROM showtimes st 
                                              INNER JOIN theaters t ON st.theater_id = t.id
                                              INNER JOIN screens s ON st.screen_id = s.id
                                              WHERE st.movie_id = '$movieId'";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($showtime = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="col-md-3 mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $showtime['theater_name']; ?>
                                            (<?php echo date('F j, Y', strtotime($showtime['showtime'])); ?>)</h5>
                                        <p class="card-text">Screen
                                            Number: <?php echo $showtime['screen_number']; ?></p>
                                        <a class="btn btn-primary"
                                           href="seatbooking.php?movieId=<?php echo $movieId; ?>&showtimeId=<?php echo $showtime['showtime_id']; ?>">
                                            <p class="card-text text-white d-flex align-items-center"><?php echo date('H:i A', strtotime($showtime['showtime'])); ?></p>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "No showtimes available.";
                        } ?>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class="row">
            <div class="description">
                <h4>Description</h4>
                <p>
                    <!--                                            Jeff Lang (Tobey Maguire), an OBGYN, and his wife Nealy (Elizabeth Banks), who owns a small-->
                    <!--                                            shop, live in Seattle with their two-year-old son named Miles. Considering a second child, they-->
                    <!--                                            decide to enlarge their small home and lay expensive new grass in their backyard. Worms in the-->
                    <!--                                            grass attract raccoons, who destroy the grass, and Jeff goes to great lengths to get rid of the-->
                    <!--                                            raccoons, mixing poison with a can of tuna. Their neighbor Lila (Laura Linney) tells Jeff that-->
                    <!--                                            her cat Matthew is missing, and Jeff does not yet realize he may be responsible.-->
                    <?php echo $row['description']; ?>
                </p>
            </div>
        </div>
        <?php
        }
        }
        ?>
    </div>

</section>

<?php
include("templates/footer.php");
?>

<!-- Gio tét thay này -->

<!-- Js Plugins -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery.nicescroll.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.countdown.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/mixitup.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>     