<?php
// Store the user inputs in variables and hash the password
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to db
require 'database.php';

// Set up and run the query
$stmt = $conn->prepare("SELECT id, password FROM user WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user) {
    // Verificar la contraseña
    if (password_verify($password, $user['password'])) {
        // Contraseña válida, inicia sesión, redirige, etc.
        // Ejemplo: iniciar sesión y redirigir a la página deseada
        session_start();
        $_SESSION['id'] = $user['id'];
        header('Location: ../index2.php');
        exit();
    } else {
        // Contraseña inválida
        $_SESSION['error_message'] = 'Invalid Login. Your password is incorrect';
        header('Location: ../index3.php');
    }
} else {
    // Usuario no encontrado
    $_SESSION['error_message'] = 'Invalid Login. User not found';
    header('Location: ../index3.php');
}

// Close the database connection
$conn = null;
?>



