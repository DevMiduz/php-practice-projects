<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP & MariaDB</title>
</head>
<body>
    <h1>PHP & MariaDB Integration</h1>

    <?php
    require_once 'database.php'; // Include the database connection file

    echo "<p>Connected to MariaDB successfully!</p>";

    // Create a simple table if it doesn't exist
    $sql_create_table = "CREATE TABLE IF NOT EXISTS messages (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        message VARCHAR(255) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    if ($conn->query($sql_create_table) === TRUE) {
        echo "<p>Table 'messages' created successfully (or already exists).</p>";
    } else {
        echo "<p>Error creating table: " . $conn->error . "</p>";
    }

    // Insert a new record
    $new_message = "Hello from PHP! The time is " . date("H:i:s");
    $sql_insert = "INSERT INTO messages (message) VALUES ('$new_message')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "<p>New record added successfully!</p>";
    } else {
        echo "<p>Error inserting record: " . $conn->error . "</p>";
    }

    echo "<h2>Current Messages:</h2>";
    // Select and display all records
    $sql_select = "SELECT id, message, reg_date FROM messages ORDER BY id DESC";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>ID:</strong> " . $row["id"] . " - <strong>Message:</strong> " . $row["message"] . " - <strong>Date:</strong> " . $row["reg_date"] . "</p>";
        }
    } else {
        echo "<p>No messages found.</p>";
    }

    // Close the connection
    $conn->close();
    ?>

</body>
</html>