<?php
session_start();

// Change these values to match your MySQL database configuration
include("../db/config.php");
// Function to sanitize user inputs
function sanitize_input($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize username and password inputs
    $username = sanitize_input($_POST["username"]);
    $password = sanitize_input($_POST["password"]);

    // Query to check if the username and password match
    $query = "SELECT id FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Check if query was successful and if there is a match
    if (mysqli_num_rows($result) == 1) {
        // Authentication successful
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        header("Location: dashboard.php"); // Redirect to dashboard or any other page after successful login
    } else {
        // Authentication failed
        $error_message = "Invalid username or password.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/image/icons/2.svg" type="image/x-icon">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

<div class="max-w-md w-full p-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold text-center mb-6">Admin Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="mb-4">
            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
            <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
        </div>
        <?php
        if (isset($error_message)) {
            echo '<div class="text-red-500 mt-4">' . $error_message . '</div>';
        }
        ?>
    </form>
</div>

</body>
</html>
