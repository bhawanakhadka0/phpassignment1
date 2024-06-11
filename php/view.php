<?php
// Include database connection
include 'connection.php';

// Fetch subscribers from the database
$sql = "SELECT id, name, email, subscribe, age, gender, country FROM subscribers";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>View Subscribers</title>
</head>
<body>
    <header>
        <h1>Subscribers</h1>
        <nav>
            <ul>
                <li><a href="index.php">Form</a></li>
                <li><a href="view.php">View Subscribers</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subscribed</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Country</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"]. "</td>
                            <td>" . htmlspecialchars($row["name"]). "</td>
                            <td>" . htmlspecialchars($row["email"]). "</td>
                            <td>" . ($row["subscribe"] ? 'Yes' : 'No') . "</td>
                            <td>" . htmlspecialchars($row["age"]). "</td>
                            <td>" . htmlspecialchars($row["gender"]). "</td>
                            <td>" . htmlspecialchars($row["country"]). "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No subscribers found</td></tr>";
            }
            ?>
        </table>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Bhawana Khadka</p>
    </footer>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
