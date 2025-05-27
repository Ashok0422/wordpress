<?php
// MySQL connection details
$servername = "localhost";
$username = "root";  // Default MySQL username
$password = "";      // Default MySQL password (empty for local server)
$dbname = "wordpress_db_custom";  // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to fetch all posts
$sql = "SELECT id, post_title, post_content, post_date FROM wp_posts";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<h2>Posts</h2>";
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h3>" . $row["post_title"] . "</h3>";
        echo "<p>" . $row["post_content"] . "</p>";
        echo "<small>Posted on: " . $row["post_date"] . "</small>";
        echo "</div><hr>";
    }
} else {
    echo "No posts found";
}

// Close connection
$conn->close();
?>
