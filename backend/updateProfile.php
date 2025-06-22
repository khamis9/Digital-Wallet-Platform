<?php
session_start();
require "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION["id"])) {
        $id = $_SESSION["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];

        if ($name == "" || $email == "" || $address == "" || $phone == "") {
            echo "please fill in all the fields";
        } else {
            $sql = "UPDATE user SET name = '$name', email = '$email', address = '$address', phone = '$phone' WHERE id = $id";

            if (mysqli_query($conn, $sql)) {
                echo "profile updated successfully";
            } else {
                echo "error updating profile";
            }
        }
    } else {
        echo "user not logged in";
    }

}
?>
