<?php
include 'dblib/db_config.php'; // or 'includes/db_config.php' if you moved it

$sql = "SELECT * FROM exercise";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Exercise Table</h2><ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>ID: " . $row["id"] . " - Name: " . $row["name"] . "</li>";
        // Adjust based on your table fields
    }
    echo "</ul>";
} else {
    echo "No results found.";
}

$conn->close();
?>
