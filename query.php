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

include('establish_connection.php'); 
error_reporting(E_ALL);
ini_set('display_eroors', 1);

mysqli_select_db($conn, "mj-lebia");

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'query1':
        executeQuery1();
        break;
    case 'query2':
        executeQuery2();
        break;
    case 'query3':
        executeQuery3();
        break;
    case 'query4':
        executeQuery4();
        break;
    case 'query5':
        executeQuery5();
        break;
    default:
        echo "No valid action specified.";
}

function executeQuery1() {
    global $conn;
    $query = "SELECT RECIPE.RECIPE_ID, RECIPE_NAME, DURATION, DIFFICULTY_RATING, TASTE_RATING
              FROM RECIPE
              INNER JOIN RATING ON RECIPE.RECIPE_ID = RATING.RECIPE_ID";
    executeAndDisplayQuery($query);
}

function executeQuery2() {
    global $conn;
    $query = "SELECT AVG(TASTE_RATING) AS average_taste_rating
              FROM RATING";
    executeAndDisplayQuery($query);
}

function executeQuery3() {
    global $conn;
    $query = "SELECT R.RECIPE_ID, R.RECIPE_NAME, RA.TASTE_RATING
              FROM RECIPE R
              JOIN RATING RA ON R.RECIPE_ID = RA.RECIPE_ID
              WHERE RA.TASTE_RATING > (
                  SELECT AVG(TASTE_RATING)
                  FROM RATING
              )";
    executeAndDisplayQuery($query);
}

function executeQuery4() {
    global $conn;
    $query = "SELECT USER_ID, COUNT(RECIPE_ID) AS rated_recipes_count
              FROM RATING
              GROUP BY USER_ID
              HAVING COUNT(RECIPE_ID) > 0";
    executeAndDisplayQuery($query);
}

function executeQuery5() {
    global $conn;
    $query = "SELECT R.RECIPE_ID, R.RECIPE_NAME, R.DURATION, RA.DIFFICULTY_RATING, RA.TASTE_RATING
              FROM RECIPE R
              LEFT OUTER JOIN RATING RA ON R.RECIPE_ID = RA.RECIPE_ID";
    executeAndDisplayQuery($query);
}

function executeAndDisplayQuery($query) {
    global $conn;
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo "<table class='table'>";
        
        // Print header row
        echo "<tr class='tr'>";
        $headerPrinted = false;
        while ($row = $result->fetch_assoc()) {
            if (!$headerPrinted) {
                foreach ($row as $key => $value) {
                    echo "<th class='th'>" . htmlspecialchars($key) . "</th>";
                }
                echo "</tr><tr class='tr'>";
                $headerPrinted = true;
            }

            // Print data rows
            foreach ($row as $value) {
                echo "<td class='td'>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data found for the query.";
    }
}

?>
</body>
</html>
