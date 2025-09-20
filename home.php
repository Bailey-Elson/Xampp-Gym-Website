<?php 
include 'shared-components/header.php'; 
include 'dblib/db_exercise.php';
include 'dblib/db_config.php';

$exerciseProvider = ExerciseProviderFactory::createProvider("db");
$result = $exerciseProvider->getExercises();

print_r($result,true);
error_log(print_r($result,true));

// if ($result->num_rows > 0) {
//     echo "<h2>Exercise Table</h2><ul>";
//     while($row = $result->fetch_assoc()) {
//         echo "<li>ID: " . $row["id"] . " - Name: " . $row["name"] . "11</li>";
//     }
//     echo "</ul>";
//     echo "<div class='row'><div class='col-6'>test</div><div class='col-6'>test 2</div><div>";
// } else {
//     echo "No results found.";
// }
try {
    $provider = ExerciseProviderFactory::createProvider("db");
    $exercises = $provider->getExercises();

    foreach ($exercises as $ex) {
        echo "Exercise: " . $ex->getname() . "<br>";
    }
} catch (DBAccessException $e) {
    error_log($e);
    echo "Failed to fetch exercises.";
}
include 'shared-components/footer.php'; 
?>