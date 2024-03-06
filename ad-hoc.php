<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stuff Me</title>
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="root.css">
</head>
<body bgcolor="ffffff"> 
<body?>
<?php
    include('establish_connection.php');
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    mysqli_select_db($conn, "mj-lebia");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputQuery = $_POST["query"];
    }

    $prefix = $_POST["action"];
    switch ($prefix) {
        case 'select':
            $prefix = "SELECT * FROM";
            break;
        case 'insert into':
            $prefix = "INSERT INTO ";
            break;
        case 'update':
            $prefix = "UPDATE ";
            break;
        case 'delete from':
            $prefix = "DELETE FROM ";
            break;
    }

    $inputQuery = $prefix . ' ' . $inputQuery;

    $returnVal = $conn->query($inputQuery);

    if ($returnVal !== false) {
        // Check if the query was a SELECT query
        if ($prefix == "SELECT * FROM") {
            if ($returnVal->num_rows > 0) {
                // Display the results
                echo "<h2>Ad-hoc Query: </h2>";
                echo "<table class='table'>";
                // Fetch the first row to get column names for table headers
                $firstRow = $returnVal->fetch_assoc();
                // Generate table headers
                echo "<thead><tr class='color'>";
                foreach ($firstRow as $column => $value) {
                    echo "<th class='th'>" . htmlspecialchars($column) . "</th>";
                }
                echo "</tr></thead><tbody>";
                // Output the first row
                echo "<tr class='tr'>";
                foreach ($firstRow as $value) {
                    echo "<td class='td'>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
                // Fetching the rest of the data and displaying it in table rows
                while ($row = $returnVal->fetch_assoc()) {
                    echo "<tr class='tr'>";
                    foreach ($row as $value) {
                        echo "<td class='td'>" . htmlspecialchars($value) . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                // No data found
                echo "No data found";
            }
        } else {
            // Display success message for non-SELECT queries
            echo "Query executed successfully.";
        }
    } else {
        // Display error message if query execution fails
        echo "Query Error: " . $conn->error;
    }
?>
</body>
</html>