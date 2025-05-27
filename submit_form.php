<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // MySQL connection details
    $servername = "localhost";
    $username = "root";  // Default MySQL username
    $password = "";      // Default MySQL password (empty for local server)
    $dbname = "wordpress_db_custom";  // The name of your database

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    echo "connection established......";

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare an SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO wp_posts (post_title, post_content, post_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $message, $date);

    // Set the date for the post (current timestamp)
    $date = date("Y-m-d H:i:s");

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    echo "No data submitted!";
}
?>
