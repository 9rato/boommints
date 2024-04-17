<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}
include('../db/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-XXXXX" crossorigin="anonymous"> <!-- Replace XXXXX with the actual integrity value -->
    <title>User Dashboard</title>
</head>
<style>
/*mobile view*/
@media screen and (max-width: 320px) {
    /* Styles for screens smaller than 320px (e.g., mobile devices) */
    .card-box{
        margin-left: 0px;
    }
  }
</style>
<body class="bg-gray-100 items-center justify-center bg-gray-300">
          <?php
            include("header.php");
            ?>
    <div class="flex h-screen md:ml-[0px] lg:ml-[0px]">
    <?php
    include('slidermenu.php');
    ?>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col ml-8 card-box">
            <div class="container mx-auto mt-[100px] mb-[150px]">
    <!--component-->
    <?php
include('./db/config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['name']) && isset($_POST['amount'])) {
    if ($_SESSION['user_id'] && $_POST['amount'] > 0) {
        $user_id = $_SESSION['user_id'];
        $bank_name = $_POST['bank_name']; // Changed from 'usdt_address' to 'name'
        $account_number = $_POST['account_number']; 
        $account_name = $_POST['account_name']; 
        $amount = $_POST['amount'];
        $withdrawal_method = "USDT"; // Assuming withdrawal method is USDT
        
        // Fetch user's current balance
        $check_balance_sql = "SELECT USDT_Balance FROM usdt WHERE user_id = '$user_id'";
        $result = $conn->query($check_balance_sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $usdt_balance = $row['USDT_Balance'];
            
            if ($amount <= $usdt_balance) {
                // Begin transaction
                $conn->begin_transaction();
                
                // Insert withdrawal details into withdrawal_history table
                $insert_sql = "INSERT INTO withdrawal_history (user_id, withdrawal_method, amount, wallet_address, created_at) 
                               VALUES ('$user_id', '$withdrawal_method', $amount, '$usdt_address', CURRENT_TIMESTAMP)";
                $conn->query($insert_sql);
                
                // Deduct withdrawn amount from user balance
                $update_balance_sql = "UPDATE usdt SET USDT_Balance = USDT_Balance - $amount WHERE user_id = '$user_id'";
                $conn->query($update_balance_sql);
                
                // Commit transaction
                $conn->commit();
                
                // Example of response after successful withdrawal
                echo "<script>alert('Withdrawal successful!');</script>";
            } else {
                echo "<script>alert('Insufficient balance for withdrawal');</script>";
            }
        } else {
            echo "<script>alert('Error fetching user balance');</script>";
        }
    } else {
        echo "<script>alert('Invalid request or amount must be greater than 0');</script>";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="max-w-md mx-auto">
    <!-- Usdt Wallet Address Input -->
    <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Bank Name</label>
        <input type="text" id="bank_name" name="bank_name" class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
 <!-- Usdt Wallet Address Input -->
 <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Account</label>
        <input type="text" id="account" name="account" class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
 <!-- Usdt Wallet Address Input -->
 <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Account Name</label>
        <input type="text" id="account_name" name="account_name" class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>

    <!-- Amount Input -->
    <div class="mb-4">
        <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
        <input type="number" id="amount" name="amount" step="any" class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">Withdraw</button>
</form>

<!-- Confirmation Message Container -->
<div id="confirmation-message" class="mt-4"></div>


        
       
</div>
<!--end of component-->


  <?php 
  include('footer.php');
  ?>
        </div>
        <script src="assets/js/tailwind.config.js"></script>
        <script>
            // JavaScript for toggling the side menu
            const sideMenu = document.getElementById('sideMenu');
            const toggleMenuBtn = document.getElementById('toggleMenu');

            toggleMenuBtn.addEventListener('click', () => {
                sideMenu.classList.toggle('hidden');
            });
        </script>
    </div>
</body>
</html>
