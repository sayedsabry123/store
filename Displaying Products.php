<?php
include 'db.php';

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='product'>";
    echo "<img src='images/" . $row['image'] . "' alt='" . $row['product_name'] . "'>";
    echo "<h3>" . $row['product_name'] . "</h3>";
    echo "<p>" . $row['description'] . "</p>";
    echo "<p>" . $row['price'] . " جنيه</p>";
    echo "</div>";
}
?>
