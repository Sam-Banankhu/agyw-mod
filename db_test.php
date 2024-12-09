<?php
// Database configuration
$host = '127.0.0.1';
$username = 'root';
$password = ''; // Replace with your database password
$database = 'agywlh';

// Create a new MySQLi connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Function to fetch user_type_id based on type_name
function getUserTypeId($typeName, $conn) {
    $sql = "SELECT user_type_id FROM user_types WHERE type_name = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param('s', $typeName);
    $stmt->execute();
    $stmt->bind_result($userTypeId);
    $stmt->fetch();
    $stmt->close();

    if ($userTypeId) {
        return $userTypeId;
    } else {
        die("User type not found for type_name: $typeName");
    }
}

// Function to add a new user
function addUser($firstname, $lastname, $email, $password, $userTypeName, $conn) {
    // Hash the password using sha1
    $hashedPassword = sha1($password);

    // Fetch the user_type_id
    $userTypeId = getUserTypeId($userTypeName, $conn);

    // SQL query to insert the new user
    $sql = "INSERT INTO users (firstname, lastname, email, user_type_id, password, is_active) 
            VALUES (?, ?, ?, ?, ?, 1)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param('sssis', $firstname, $lastname, $email, $userTypeId, $hashedPassword);

    // Execute the query
    if ($stmt->execute()) {
        echo "User added successfully.";
    } else {
        echo "Error adding user: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Example usage
$firstname = 'Samson';
$lastname = 'Mhango';
$email = 'smhango@lighthouse.org.mw';
$password = 'Primis@2022'; 
$userTypeName = 'Admin'; // User type as a string

// Add the user
addUser($firstname, $lastname, $email, $password, $userTypeName, $conn);

// Close the database connection
$conn->close();
?>
