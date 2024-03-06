<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Queries</title>
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="root.css">
</head>
<body>
<?php

include('establish_connection.php'); // Ensure this path is correct relative to this file's location
error_reporting(E_ALL);
ini_set('display_eroors', 1);

mysqli_select_db($conn, "mj-knguyen26");

echo "<h1>Recipes with Ratings</h1>";
// Query to find all recipes along with their ratings
$query_1 = "SELECT RECIPE.RECIPE_ID, RECIPE_NAME, DURATION, DIFFICULTY_RATING, TASTE_RATING
            FROM RECIPE
            INNER JOIN RATING ON RECIPE.RECIPE_ID = RATING.RECIPE_ID";

$result_1 = $conn->query($query_1);
if ($result_1->num_rows > 0) {
    echo "<table class='table'>";
    echo "<thead><tr class='color'><th class='th'>Recipe ID</th><th class='th'>Recipe Name</th><th class='th'>Duration</th><th class='th'>Difficulty Rating</th><th class='th'>Taste Rating</th></tr></thead><tbody>";
    while ($row = $result_1->fetch_assoc()) {
        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_NAME']) . "</td><td class='td'>" . htmlspecialchars($row['DURATION']) . "</td><td class='td'>" . htmlspecialchars($row['DIFFICULTY_RATING']) . "</td><td class='td'>" . htmlspecialchars($row['TASTE_RATING']) . "</td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No data found for recipes with ratings";
}

echo "<h1>Average Taste Rating</h1>";
// Query to calculate the average taste rating from the RATING table
$query_2 = "SELECT AVG(TASTE_RATING) AS average_taste_rating
            FROM RATING";

$result_2 = $conn->query($query_2);
if ($result_2->num_rows > 0) {
    $row = $result_2->fetch_assoc();
    echo "Average Taste Rating: " . htmlspecialchars($row['average_taste_rating']);
} else {
    echo "No data found for average taste rating";
}

echo "<h1>Recipes with Taste Rating Higher than Average</h1>";
// Query to find all recipes that have a taste rating higher than the average taste rating of all recipes
$query_3 = "SELECT R.RECIPE_ID, R.RECIPE_NAME, RA.TASTE_RATING
            FROM RECIPE R
            JOIN RATING RA ON R.RECIPE_ID = RA.RECIPE_ID
            WHERE RA.TASTE_RATING > (
                SELECT AVG(TASTE_RATING)
                FROM RATING
            )";

$result_3 = $conn->query($query_3);
if ($result_3->num_rows > 0) {
    echo "<table class='table'>";
    echo "<thead><tr class='color'><th class='th'>Recipe ID</th><th class='th'>Recipe Name</th><th class='th'>Taste Rating</th></tr></thead><tbody>";
    while ($row = $result_3->fetch_assoc()) {
        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_NAME']) . "</td><td class='td'>" . htmlspecialchars($row['TASTE_RATING']) . "</td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No recipes found with taste rating higher than average";
}

echo "<h1>Users Who Have Rated Recipes</h1>";
// Query to find users who have rated more than 0 recipes
$query_4 = "SELECT USER_ID, COUNT(RECIPE_ID) AS rated_recipes_count
            FROM RATING
            GROUP BY USER_ID
            HAVING COUNT(RECIPE_ID) > 0";

$result_4 = $conn->query($query_4);
if ($result_4->num_rows > 0) {
    echo "<table class='table'>";
    echo "<thead><tr class='color'><th class='th'>User ID</th><th class='th'>Rated Recipes Count</th></tr></thead><tbody>";
    while ($row = $result_4->fetch_assoc()) {
        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['USER_ID']) . "</td><td class='td'>" . htmlspecialchars($row['rated_recipes_count']) . "</td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No users found who have rated recipes";
}

echo "<h1>Recipes with Ratings (Left Outer Join)</h1>";
// Query for left outer join between RECIPE and RATING
$query_5 = "SELECT R.RECIPE_ID, R.RECIPE_NAME, R.DURATION, RA.DIFFICULTY_RATING, RA.TASTE_RATING
            FROM RECIPE R
            LEFT OUTER JOIN RATING RA ON R.RECIPE_ID = RA.RECIPE_ID";

$result_5 = $conn->query($query_5);
if ($result_5->num_rows > 0) {
    echo "<table class='table'>";
    echo "<thead><tr class='color'><th class='th'>Recipe ID</th><th class='th'>Recipe Name</th><th class='th'>Duration</th><th class='th'>Difficulty Rating</th><th class='th'>Taste Rating</th></tr></thead><tbody>";
    while ($row = $result_5->fetch_assoc()) {
        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_NAME']) . "</td><td class='td'>" . htmlspecialchars($row['DURATION']) . "</td><td class='td'>" . htmlspecialchars($row['DIFFICULTY_RATING']) . "</td><td class='td'>" . htmlspecialchars($row['TASTE_RATING']) . "</td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No data found for recipes with ratings (left outer join)";
}

?>
</body>
</html>
