<?php
// MySQL connection details
$servername = "localhost";
$username = "root";  // Default MySQL username
$password = "";      // Default MySQL password (empty for local server)
$dbname = "wordpress_db_custom";  // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE wp_posts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_title VARCHAR(255) NOT NULL,
    post_content TEXT NOT NULL,
    post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Table wp_posts created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close connection
$conn->close();
?>
