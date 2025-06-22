<?php
session_start();
require "database.php";

if (!isset($_SESSION["id"])) {
    echo "not logged in";
    exit;
}

$user_id = $_SESSION["id"];

$type = isset($_GET["type"]) ? $_GET["type"] : "";
$from = isset($_GET["from"]) ? $_GET["from"] : "";
$to = isset($_GET["to"]) ? $_GET["to"] : "";

$query = "SELECT * FROM transactions WHERE user_id = $user_id";

if ($type != "") {
    $query .= " AND type = '$type'";
}
if ($from != "") {
    $query .= " AND created_at >= '$from'";
}
if ($to != "") {
    $query .= " AND created_at <= '$to'";
}

$query .= " ORDER BY created_at DESC";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h3>Transaction History</h3>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["type"]."</td>
                <td>".$row["amount"]."</td>
                <td>".$row["created_at"]."</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "no transactions found";
}

?>
