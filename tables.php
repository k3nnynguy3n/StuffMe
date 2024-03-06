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
<?php
    include('establish_connection.php'); 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    mysqli_select_db($conn, "mj-lebia");

    if(isset($_GET['action'])) {
        $action = $_GET['action'];

        switch($action) {
            case 'users':
                $result = $conn->query("SELECT * FROM USERS");

                if (!$result) {
                    echo "Error: " . $conn->error;
                }

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead>";
                    echo "<tr class='color'><th class='th'>User_ID</th><th class='th'>First Name</th><th class='th'>Last Name</th><th class='th'>Date of Birth</th><th class='th'>User_Password</th></tr>";
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
                $result = $conn->query("SELECT * FROM RECIPE");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Recipe_ID</th><th class='th'>User_ID</th><th class='th'>Rating_ID</th><th class='th'>Recipe_Name</th><th class='th'>Duration</th><th class='th'>Recipe_Description</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['USER_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RATING_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_NAME']) . "</td><td class='td'>" . htmlspecialchars($row['DURATION']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_DESCRIPTION']) . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in RECIPE table";
                }
                break;

            case 'rating':
                $result = $conn->query("SELECT * FROM RATING");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Rating_ID</th><th class='th'>User_ID</th><th class='th'>Recipe_ID</th><th class='th'>Difficulty_Rating</th><th class='th'>Taste_Rating</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['RATING_ID']) . "</td><td class='td'>" . htmlspecialchars($row['USER_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['DIFFICULTY_RATING']) . "</td><td class='td'>" . htmlspecialchars($row['TASTE_RATING']) . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in RATING table";
                }
                break;

            case 'comments':
                $result = $conn->query("SELECT * FROM COMMENTS");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Comment_ID</th><th class='th'>User_ID</th><th class='th'>Recipe_ID</th><th class='th'>Comment_Date</th><th class='th'>Comment_Text</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['COMMENT_ID']) . "</td><td class='td'>" . htmlspecialchars($row['USER_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['COMMENT_DATE']) . "</td><td class='td'>" . htmlspecialchars($row['COMMENT_TEXT']) . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in COMMENTS table";
                }
                break;

            case 'equipment':
                $result = $conn->query("SELECT * FROM EQUIPMENT");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'>><th class='th'>Equipment_Name</th><th class='th'>Equipment_Quantity</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['EQUIPMENT_NAME']) . "</td><td class='td'>" . htmlspecialchars($row['EQUIPMENT_QUANTITY']) . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in EQUIPMENT table";
                }
                break;

            case 'ingredient':
                $result = $conn->query("SELECT * FROM INGREDIENT");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Ingredient_Name</th><th class='th'>Ingredient_Quantity</th>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['INGREDIENT_NAME']) . "</td><td class='td'>" . htmlspecialchars($row['INGREDIENT_QUANTITY']);
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in INGREDIENT table";
                }
                break;

            case 'photo':
                $result = $conn->query("SELECT * FROM PHOTO");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Photo_ID</th><th class='th'>User_ID</th><th class='th'>Recipe_ID</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['PHOTO_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['PHOTO_CAPTION']) . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in PHOTO table";
                }
                break;

            case 'video':
                $result = $conn->query("SELECT * FROM VIDEO");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Video_ID</th><th class='th'>Recipe_ID</th><th class='th'>Video_Name</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['VIDEO_ID']) . "</td><td class='td'>" . htmlspecialchars($row['RECIPE_ID']) . "</td><td class='td'>" . htmlspecialchars($row['VIDEO_NAME']);
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No data found in VIDEO table";
                }
                break;

            case 'supplies':
                $result = $conn->query("SELECT * FROM SUPPLIES");

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr class='color'><th class='th'>Recipe_ID</th><th class='th'>Ingredient_Name</th><th class='th'>Equipment_Name</th></tr></thead><tbody>";
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

