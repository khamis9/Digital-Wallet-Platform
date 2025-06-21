<?php
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
                if($password == $row["password"]){
                    header("Location: ./../frontend/index.html");
                }else{
                    echo "password incorect";
                }
            }
        }
    }
?>

