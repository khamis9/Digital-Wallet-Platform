<?php
require 'database.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    
    if($name == "" || $email == "" || $password == "" || $address == "" || $phone == ""){
        echo "please fill in all the fields";
    }else{
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "Select * from user where email = '$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            echo "email already in use";
        }else{
            $sql = "insert into user(name, email, password, address,phone) values('$name', '$email', '$hashed_password', '$address', '$phone')";

            if(mysqli_query($conn, $sql)){
                header("Location: ./../frontend/login.html");
            } else{
                echo "Error";
            }
        } 
    }

}

?>