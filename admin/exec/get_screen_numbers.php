<?php
require_once('../../config/db_connect.php');

if (isset($_GET['theater_id'])) {
    $theaterId = mysqli_real_escape_string($conn, $_GET['theater_id']);

    $resultScreens = mysqli_query($conn, "SELECT id, screen_number FROM screens WHERE theater_id = $theaterId");

    if (mysqli_num_rows($resultScreens) > 0) {
        while ($rowScreens = mysqli_fetch_array($resultScreens)) {
            echo '<option value="' . $rowScreens['id'] . '">' . $rowScreens['screen_number'] . '</option>';
        }
    } else {
        echo '<option>No Screen Available</option>';
    }
}
?>
