<?php
require './inc/database.php';

// Fetching values from the form
$name = $_POST['name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

// Validate inputs
$ok = true;

if (empty($name) || empty($last_name) || empty($username) || empty($password) || ($password != $confirm)) {
    echo '<p>Invalid input. Please fill all fields correctly.</p>';
    $ok = false;
}

// If validation passes, proceed with inserting into the database
if ($ok) {
    // Hash de la contraseña
    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user (name, last_name, username, password) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $last_name, $username, $password]);

    echo '<section class="success-row">';
    echo '<div>';
    echo '<h3>Admin Saved</h3>';
    echo '</div>';
    echo '</section>';

    // Redirect to signin.php after successful registration
    header("Location: signin.php");
    exit();
}

// Close the database connection
$conn = null;
?>
