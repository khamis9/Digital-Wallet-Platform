<?php
session_start();
require "database.php";

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_SESSION["id"])){
        $user_id = $_SESSION["id"];
        $amount = $_POST["amount"];

        if($amount == "" || !is_numeric($amount) || $amount <= 0){
            echo "Invalid amount";
        }else{
            $sql = "INSERT INTO transactions (user_id, type, amount, transaction_date) VALUES ($user_id, 'withdraw', $amount, NOW())";

            if(mysqli_query($conn, $sql)){
                header("Location: ./../frontend/index.php");
                exit();
            }else{
                echo "error";
            }
        }
    }else{
        echo "not logged in";
    }
}

?>