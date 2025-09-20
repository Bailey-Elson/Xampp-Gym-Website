<?php 
include 'shared-components/header.php'; 
include 'dblib/db_exercise.php';
include 'dblib/db_config.php'; // or 'includes/db_config.php' if you moved it

$sql = "SELECT * FROM exercise";
$result = $conn->query($sql);

$exercise = 

if ($result->num_rows > 0) {
    echo "<h2>Exercise Table</h2><ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>ID: " . $row["id"] . " - Name: " . $row["name"] . "11</li>";
        // Adjust based on your table fields
    }
    echo "</ul>";
    echo "<div class='row'><div class='col-6'>test</div><div class='col-6'>test 2</div><div>";
} else {
    echo "No results found.";
}

$conn->close();
include 'shared-components/footer.php'; 
?>