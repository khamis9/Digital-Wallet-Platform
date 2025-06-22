<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Digital Wallet</title>
    </head>
    <body>

        <h2>Welcome to Your Digital Wallet</h2>

        <?php if (isset($_SESSION["id"])): ?>
            <p>You are logged in.</p>
            <ul>
                <li><a href="profile.html">View / Edit Profile</a></li>
                <li><a href="deposit.html">Deposit Funds</a></li>
                <li><a href="withdraw.html">Withdraw Funds</a></li>
                <li><a href="history.html">Transaction History</a></li>
            </ul>
        <?php else: ?>
            <p>You are not logged in.</p>
            <ul>
                <li><a href="signup.html">Register</a></li>
                <li><a href="logIn.html">Log In</a></li>
            </ul>
        <?php endif; ?>

    </body>
</html>
