<?php
session_start();
require "database.php";

header("Content-Type: application/json");

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode([
            "name" => $row["name"],
            "email" => $row["email"],
            "address" => $row["address"],
            "phone" => $row["phone"]
        ]);
    } else {
        echo json_encode(["error" => "user not found"]);
    }
} else {
    echo json_encode(["error" => "not logged in"]);
}
?>
