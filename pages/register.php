
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/image/icons/2.svg" type="image/x-icon">
</head>
<body class="">
<div class="w-full mt-[50px] mr-[50px]">
    <div class="flex">
        <div class="flex-1 hidden lg:block h-[100%] min-w-[40%]">
       <img src="../assets/image/items-one/Artboard4.png" alt="">
        </div>
        <div class="flex-1 mr-[50px] md:ml-[50px] ml-8">

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
        // Database connection settings
        include("../db/config.php");

        // Function to sanitize and validate input
        function sanitize_input($input) {
            return htmlspecialchars(trim($input));
        }

        // Retrieve form data
        $username = sanitize_input($_POST['username']);
        $fullname = sanitize_input($_POST['fullname']);
        $telephoneno = sanitize_input($_POST['telephoneno']);
        $email = sanitize_input($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

        // Check if username or email already exists
        $stmt_check = $conn->prepare("SELECT user_id FROM users WHERE username = ? OR email = ?");
        $stmt_check->bind_param("ss", $username, $email);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            echo "<script>alert('Username or email already exists. Please choose a different one.');</script>";
        } else {
            // Insert new user
            $stmt_insert = $conn->prepare("INSERT INTO users (username, fullname, telephoneno, email, password) VALUES (?, ?, ?, ?, ?)");
            $stmt_insert->bind_param("sssss", $username, $fullname, $telephoneno, $email, $password);

            if ($stmt_insert->execute()) {
                echo "<script>alert('User registered successfully!');</script>";
                
                // Get the user_id of the newly registered user
                $user_id = $stmt_insert->insert_id;

                // Update naira balance table
                $initial_balance = 0.00; // Initial balance for new user
                $update_stmt_naira = $conn->prepare("INSERT INTO naira (user_id, Username, Naira_Balance) VALUES (?, ?, ?)");
                $update_stmt_naira->bind_param("isd", $user_id, $username, $initial_balance);
                $update_stmt_naira->execute();

                // Update pepe balance table
                $update_stmt_pepe = $conn->prepare("INSERT INTO pepe (user_id, Username, Pepe_Balance) VALUES (?, ?, ?)");
                $update_stmt_pepe->bind_param("isd", $user_id, $username, $initial_balance);
                $update_stmt_pepe->execute();

                // Update piwallet balance table
                $update_stmt_piwallet = $conn->prepare("INSERT INTO piwallet (user_id, Username, Pi_Balance) VALUES (?, ?, ?)");
                $update_stmt_piwallet->bind_param("isd", $user_id, $username, $initial_balance);
                $update_stmt_piwallet->execute();

                // Update usdt balance table
                $update_stmt_usdt = $conn->prepare("INSERT INTO usdt (user_id, Username, USDT_Balance) VALUES (?, ?, ?)");
                $update_stmt_usdt->bind_param("isd", $user_id, $username, $initial_balance);
                $update_stmt_usdt->execute();

                // Update xrp balance table
                $update_stmt_xrp = $conn->prepare("INSERT INTO xrp (user_id, Username, Xrp_Balance) VALUES (?, ?, ?)");
                $update_stmt_xrp->bind_param("isd", $user_id, $username, $initial_balance);
                $update_stmt_xrp->execute();
            } else {
                echo "Error: " . $stmt_insert->error;
            }
        }

        $stmt_check->close();
        $conn->close();
    }
?>

       

<img alt="" loading="lazy" width="100.55" height="25.69" decoding="async" data-nimg="1" style="color:transparent; width: 30px" src="../assets/image/icons/2.svg" class="mb-4">
<div class="flex justify-between items-center"> <!-- Added flex, justify-between, and items-center classes -->
    <a href="index.php" class="float-left"> <!-- Added class attribute to the anchor tag -->
        <img alt="" loading="lazy" width="57" height="27" decoding="async" data-nimg="1"
             style="color: transparent; width: 30px;" src="../assets/image/icons/back-svgrepo-com.svg">
    </a>

    <h1 class="text-[30px] font-bold mb-6">Register</h1>
</div>



 <form action="" method="post">
    <div class="mb-4">
        <label for="fullname" class="block text-gray-700 text-sm font-bold mb-2">Full Name</label>
        <input type="text" id="fullname" name="fullname" class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">UserName</label>
        <input type="text" id="username" name="username" class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="telephoneno" class="block text-gray-700 text-sm font-bold mb-2">Telephone No.</label>
        <input type="text" id="telephoneno" name="telephoneno" class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
        <input type="text" id="email" name="email" class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
        <input type="password" id="password" name="password" class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>

    <button type="submit" name="register" class="bg-blue-500 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">Register</button>
</form>
        </div>
    </div>

</div>


</body>
</html>