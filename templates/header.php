<!-- Page Preloder -->
<!--<div id="preloder">-->
<!--    <div class="loader"></div>-->
<!--</div>-->
<!-- css option -->
<style>
.dropdown_menu {
    position: relative;
    display: inline-block;
}

.dropdown_content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    right: 0;
}

.dropdown_menu:hover .dropdown_content {
    display: block;
}

.dropdown_content a {
    color: black;
    padding: 12px 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    white-space: nowrap;
    text-align: center;
}

.dropdown_content a:hover {
    background-color: #f1f1f1;
}
.dropbtn {
    color: black;
    border: none;
    background: none;
    cursor: pointer;
}
.dropdown_content {
    text-align: center;
}
</style>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">
            <a href="login.html">Sign in</a>

        </div>

    </div>

    <div id="mobile-menu-wrap"></div>

</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 bg-dark">

                </div>
                <?php
                require_once("config/db_connect.php");
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    $result = $conn->query("SELECT * FROM users WHERE username ='" . $username . "'") ;

                    ?>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right bg-dark">
                            <div class="header__top__links">
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        if ($row['image'] == '') {
                                            echo '<img src="../assets/images/img_avatar.png" alt="Avatar" class="avatar">';
                                        } else {
                                            ?>  <img src="uploads/<?php echo $row["image"]; ?>" alt="Avatar"
                                                     class="avatar">
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                <span>Hii <?php echo $_SESSION['username']; ?></span>
                                <div class="dropdown_menu">
                                    <button class="dropbtn">&#9662;</button>
                                    <div class="dropdown_content">
                                        <a href="#">account</a>
                                        <a href="#">history buy</a>
                                        <a href="../logout.php"> Logout</a>
                            </div>

                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a href="login.php">Sign in</a>
                                <a href="register.php">Register</a>
                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="assets/images/logo.png" alt="" style="width: 150px;"></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="all_movie.php">All Movie</a></li>
                        <li><a href="about.php">About US</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                        <li><a href="contact.php">Contacts</a></li>
                    </ul>
                </nav>
            </div>

        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->
