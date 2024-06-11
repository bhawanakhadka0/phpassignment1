<?php
// Include database connection
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subscribe = isset($_POST['subscribe']) ? 1 : 0;
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO subscribers (name, email, subscribe, age, gender, country) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $name, $email, $subscribe, $age, $gender, $country);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Subscriber Information</title>
</head>
<body>
    <header>
        <h1>Subscriber Information</h1>
        <nav>
            <ul>
                <li><a href="index.php">Form</a></li>
                <li><a href="view.php">View Subscribers</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="subscribe">Subscribe to Newsletter:</label>
            <input type="checkbox" id="subscribe" name="subscribe"><br><br>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age"><br><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select><br><br>

            <label for="country">Country:</label>
            <input type="text" id="country" name="country"><br><br>

            <input type="submit" value="Submit">
        </form>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Bhawana Khadka</p>
    </footer>
</body>
</html>
