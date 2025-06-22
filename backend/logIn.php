<?php
session_start();
require "database.php";
    

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    if($email == "" || $password == ""){
        echo "please fill in all the fields";
    }else{
        $sql = "select * from user where email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password ,$row["password"])){
                $_SESSION["id"]=$row["id"];
                header("Location: ./../frontend/index.php");
                exit();
            }else{
                echo "password incorect";
            }
        }
    }
}
?>

