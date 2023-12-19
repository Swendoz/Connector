<?php

include "../db/db_conn.php";

if (isset($_POST["username"]) && isset($_POST["message"])) {

    $username = $_POST["username"];
    $message = $_POST["message"];

    if ($username == null || $username == "" ||  $username == " ") {
        header("Location: ../index.php?status=error-Username can't be empty");
        exit();
    } else if ($message == null || $message == "" ||  $message == " ") {
        header("Location: ../index.php?status=error-Message can't be empty");
        exit();
    } else if (strlen($username) > 120) {
        header("Location: ../index.php?status=error-Username can't be longer than 120 characters.");
        exit();
    } else if (strlen($message) > 255) {
        header("Location: ../index.php?status=error-Message can't be longer than 255 characters.");
        exit();
    }

    try {
        $sql = "INSERT INTO connects(username, message) VALUES(:username, :message)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["username" => $username, "message" => $message]);

        header("Location: ../index.php?status=success-Succesfuly added your connect.");
    } catch (Exception $e) {
        $pdo->rollback();
        throw $e;
    }
} else {
    header("Location: ../index.php?status=error-Problem 2522");
}
