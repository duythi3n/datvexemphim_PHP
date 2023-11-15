<?php

session_start();

require_once ('../../config/db_connect.php');

if (isset($_POST['add-screen-btn'])) {
    $theater_id = mysqli_real_escape_string($conn, $_POST['theater-id']);
    $screen_number = mysqli_real_escape_string($conn, $_POST['screen-number']);

    try {

        $insert_record = mysqli_query($conn, "INSERT INTO screens (`theater_id`, `screen_number`) VALUES ('" . $theater_id . "','" . $screen_number . "')");

        if ($insert_record) {
            $msg = "Insert successful";
            $error = 0;
        } else {
            throw new Exception("Insert unsuccessful");
        }
    } catch (Exception $e) {
        $msg = "An error occurred: " . $e->getMessage();
        $error = 1;
    }

    header("Location: ../screens.php?msg=" . urlencode($msg) . "&error=" . $error);
    exit();
}

if (isset($_POST['update-screen-btn'])) {
    $e_id = mysqli_real_escape_string($conn, $_POST['e_id']);
    $edit_theater_id = mysqli_real_escape_string($conn, $_POST['edit-theater-id']);
    $edit_screen_number = mysqli_real_escape_string($conn, $_POST['edit-screen-number']);


    try {
        $update_record = mysqli_query($conn, "UPDATE `screens` SET `theater_id` = '$edit_theater_id', `screen_number` = '$edit_screen_number' WHERE `id` = '$e_id'");

        if ($update_record) {
            $msg = "Update successful";
            $error = 0;
        } else {
            throw new Exception("Update unsuccessful");
        }
    } catch (Exception $e) {
        $msg = "An error occurred: " . $e->getMessage();
        $error = 1;
    }

    header("Location: ../screens.php?msg=" . urlencode($msg) . "&error=" . $error);
    exit();
}

if (isset($_POST['delete-screen-btn'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);


    try {
        $delete_record = mysqli_query($conn, "DELETE FROM screens WHERE id=$id");

        if ($delete_record) {
            $msg = "Delete successful";
            $error = 0;
        } else {
            throw new Exception("Delete unsuccessful");
        }
    } catch (Exception $e) {
        $msg = "An error occurred: " . $e->getMessage();
        $error = 1;
    }

    header("Location: ../screens.php?msg=" . urlencode($msg) . "&error=" . $error);
    exit();
}
