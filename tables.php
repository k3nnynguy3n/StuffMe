<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="root.css">
</head>
<body>
    <header>
        <h1>Stuff Me</h1>
    </header>
    <section id="media" class="container">
<?php
    include('establish_connection.php'); // Ensure this path is correct relative to this file's location
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    mysqli_select_db($conn, "mj-lebia");

    if(isset($_GET['action'])) {
        $action = $_GET['action'];

        switch($action) {
            case 'users':
                // Execute SQL query to fetch data from USERS table
                $result = $conn->query("SELECT * FROM USERS");

                if (!$result) {
                    echo "Error: " . $conn->error;
                }

                if ($result->num_rows > 0) {
                    // Generate HTML table
                    echo "<table class='table'>";
                    echo "<thead>";
                    echo "<tr class='color'><th class='th'>User ID</th><th class='th'>User First Name</th><th class='th'>User Last Name</th><th class='th'>Date of Birth</th><th class='th'>User Password</th></tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'>";
                        echo "<td class='td'>" . htmlspecialchars($row['USER_ID']) . "</td>";
                        echo "<td class='td'>" . htmlspecialchars($row['USER_FNAME']) . "</td>";
                        echo "<td class='td'>" . htmlspecialchars($row['USER_LNAME']) . "</td>";
                        echo "<td class='td'>" . htmlspecialchars($row['DOB']) . "</td>";
                        echo "<td class='td'>" . htmlspecialchars($row['USER_PASSWORD']) . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in USERS table";
                }
                break;

            case 'recipe':
                // Execute SQL query to fetch data from RECIPE table
                $result = $conn->query("SELECT * FROM RECIPE");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Recipe ID</th><th class='th'>User ID</th><th class='th'>Rating ID</th><th class='th'>Recipe Name</th><th class='th'>Duration</th><th class='th'>Recipe Description</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['USER_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RATING_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_NAME']) . "</td><td class='td'>" . htmlspecialchars($row['DURATION']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_DESCRIPTION']) . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in RECIPE table";
                }
                break;

            case 'rating':
                // Execute SQL query to fetch data from RATING table
                $result = $conn->query("SELECT * FROM RATING");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Rating ID</th><th class='th'>User ID</th><th class='th'>Recipe ID</th><th class='th'>Difficulty Rating</th><th class='th'>Taste Rating</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['RATING_ID']) . "</td><td class='td'>" . htmlspecialchars($row['USER_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['DIFFICULTY_RATING']) . "</td><td class='td'>" . htmlspecialchars($row['TASTE_RATING']) . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in RATING table";
                }
                break;

            case 'comments':
                // Execute SQL query to fetch data from COMMENTS table
                $result = $conn->query("SELECT * FROM COMMENTS");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Comment ID</th><th class='th'>User ID</th><th class='th'>Recipe ID</th><th class='th'>Comment Date</th><th class='th'>Comment Text</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['COMMENT_ID']) . "</td><td class='td'>" . htmlspecialchars($row['USER_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['COMMENT_DATE']) . "</td><td class='td'>" . htmlspecialchars($row['COMMENT_TEXT']) . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in COMMENTS table";
                }
                break;

            case 'equipment':
                // Execute SQL query to fetch data from EQUIPMENT table
                $result = $conn->query("SELECT * FROM EQUIPMENT");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'>><th class='th'>Equipment Name</th><th class='th'>Equipment Quantity</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['EQUIPMENT_NAME']) . "</td><td class='td'>" . htmlspecialchars($row['EQUIPMENT_QUANTITY']) . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in EQUIPMENT table";
                }
                break;

            case 'ingredient':
                // Execute SQL query to fetch data from INGREDIENT table
                $result = $conn->query("SELECT * FROM INGREDIENT");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Ingredient Name</th><th class='th'>Ingredient Quantity</th>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['INGREDIENT_NAME']) . "</td><td class='td'>" . htmlspecialchars($row['INGREDIENT_QUANTITY']) . "</td><td class='td'>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in INGREDIENT table";
                }
                break;

            case 'photo':
                // Execute SQL query to fetch data from PHOTO table
                $result = $conn->query("SELECT * FROM PHOTO");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Photo ID</th><th class='th'>User ID</th><th class='th'>Recipe ID</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['PHOTO_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['PHOTO_CAPTION']) . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in PHOTO table";
                }
                break;

            case 'video':
                // Execute SQL query to fetch data from VIDEO table
                $result = $conn->query("SELECT * FROM VIDEO");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Video ID</th><th class='th'>Recipe ID</th><th class='th'>Video Name</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['VIDEO_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['VIDEO_NAME']) . "</td><td class='td'>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in VIDEO table";
                }
                break;

            case 'supplies':
                // Execute SQL query to fetch data from SUPPLIES table
                $result = $conn->query("SELECT * FROM SUPPLIES");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Recipe ID</th><th class='th'>Ingredient Name</th><th class='th'>Equipment Name</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['INGREDIENT_NAME']) . "</td><td class='td'>" . htmlspecialchars($row['EQUIPMENT_NAME']) . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in SUPPLIES table";
                }
                break;

            default:
                echo "Invalid action";
        }
    }
?>

