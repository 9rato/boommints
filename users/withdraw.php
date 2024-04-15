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
            <div class="container mx-auto mt-8">
    <!--component-->
    <div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Withdrawal Form</h1>
    
    <form class="max-w-md mx-auto" action="withdrawal_process.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
        
        <div class="mb-4">
            <label for="withdrawalMethod" class="block text-sm font-bold mb-2">Withdrawal Method</label>
            <select id="withdrawalMethod" name="withdrawal_method" class="w-full px-4 py-2 border rounded-md">
                <option value="naira">Naira</option>
                <option value="usdt">USDT</option>
            </select>
        </div>

        <div class="mb-4" id="accountNumberContainer">
            <label for="accountNumber" class="block text-sm font-bold mb-2">Account Number</label>
            <input type="text" id="accountNumber" name="account_number" class="w-full px-4 py-2 border rounded-md" placeholder="Enter your account number">
        </div>

        <div class="mb-4" id="accountNameContainer">
            <label for="accountName" class="block text-sm font-bold mb-2">Account Name</label>
            <input type="text" id="accountName" name="account_name" class="w-full px-4 py-2 border rounded-md" placeholder="Enter your account name">
        </div>

        <div class="mb-4" id="bankNameContainer">
            <label for="bankName" class="block text-sm font-bold mb-2">Bank Name</label>
            <input type="text" id="bankName" name="bank_name" class="w-full px-4 py-2 border rounded-md" placeholder="Enter your bank name">
        </div>

        <div class="mb-4 hidden" id="walletAddressContainer">
            <label for="walletAddress" class="block text-sm font-bold mb-2">Wallet Address</label>
            <input type="text" id="walletAddress" name="wallet_address" class="w-full px-4 py-2 border rounded-md" placeholder="Enter your wallet address">
        </div>

        <div class="mb-4" id="accountAmountContainer">
            <label for="accountAmount" class="block text-sm font-bold mb-2">Amount</label>
            <input type="text" id="accountAmount" name="withdrawal_amount" class="w-full px-4 py-2 border rounded-md" placeholder="Enter withdrawal amount">
        </div>

        <div class="mb-4 hidden" id="walletAddressAmountContainer">
            <label for="walletAmount" class="block text-sm font-bold mb-2">Amount</label>
            <input type="text" id="walletAmount" name="wallet_amount" class="w-full px-4 py-2 border rounded-md" placeholder="Enter your wallet address">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Withdraw</button>
    </form>

    <?php
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../pages/login.php");
        exit();
    }

    include('../db/config.php');

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize withdrawal amount
        $withdrawalAmount = filter_input(INPUT_POST, 'withdrawal_amount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        // Check if withdrawal amount is valid
        if (!$withdrawalAmount || $withdrawalAmount <= 0) {
            echo "<p class='text-red-500'>Invalid withdrawal amount.</p>";
            exit();
        }

        // Get withdrawal method (Naira or USDT)
        $withdrawalMethod = $_POST['withdrawal_method'];

        // Check if user has sufficient balance
        $balanceField = ($withdrawalMethod == 'naira') ? 'Naira_Balance' : 'USDT_Balance';
        $tableName = ($withdrawalMethod == 'naira') ? 'naira' : 'usdt';

        $query = "SELECT $balanceField FROM $tableName WHERE user_id = ?";
        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param("s", $_SESSION['user_id']);
            $stmt->execute();
            $stmt->bind_result($balance);
            $stmt->fetch();
            $stmt->close();

            if ($balance < $withdrawalAmount) {
                // Insufficient balance
                echo "<p class='text-red-500'>Insufficient balance.</p>";
            } else {
                // Sufficient balance, proceed with withdrawal
                $newBalance = $balance - $withdrawalAmount;
                $updateQuery = "UPDATE $tableName SET $balanceField = ? WHERE user_id = ?";
                if ($updateStmt = $mysqli->prepare($updateQuery)) {
                    $updateStmt->bind_param("ds", $newBalance, $_SESSION['user_id']);
                    $updateStmt->execute();
                    $updateStmt->close();

                    // Withdrawal successful
                    echo "<p class='text-green-500'>Withdrawal successful. Your new balance is $newBalance $withdrawalMethod.</p>";

                    // Insert withdrawal record into history
                    $insertQuery = "INSERT INTO withdrawal_history (user_id, withdrawal_method, amount) VALUES (?, ?, ?)";
                    if ($insertStmt = $mysqli->prepare($insertQuery)) {
                        $insertStmt->bind_param("ssd", $_SESSION['user_id'], $withdrawalMethod, $withdrawalAmount);
                        $insertStmt->execute();
                        $insertStmt->close();
                    }
                } else {
                    // Error updating balance
                    echo "<p class='text-red-500'>Error processing withdrawal.</p>";
                }
            }
        } else {
            // Error with database query
            echo "<p class='text-red-500'>Error processing withdrawal.</p>";
        }
    }
    ?>

    <script>
        const withdrawalMethodSelect = document.getElementById('withdrawalMethod');
        const accountNumberContainer = document.getElementById('accountNumberContainer');
        const accountAmountContainer = document.getElementById('accountAmountContainer');
        const accountNameContainer = document.getElementById('accountNameContainer');
        const bankNameContainer = document.getElementById('bankNameContainer');
        const walletAddressContainer = document.getElementById('walletAddressContainer');
        const walletAddressAmountContainer = document.getElementById('walletAddressAmountContainer');

        withdrawalMethodSelect.addEventListener('change', function() {
            if (this.value === 'usdt') {
                accountNumberContainer.classList.add('hidden');
                accountNameContainer.classList.add('hidden');
                bankNameContainer.classList.add('hidden');
                accountAmountContainer.classList.add('hidden'); // Hide the account amount field
                walletAddressContainer.classList.remove('hidden');
                walletAddressAmountContainer.classList.remove('hidden');
            } else {
                accountNumberContainer.classList.remove('hidden');
                accountNameContainer.classList.remove('hidden');
                bankNameContainer.classList.remove('hidden');
                accountAmountContainer.classList.remove('hidden'); // Show the account amount field
                walletAddressContainer.classList.add('hidden');
                walletAddressAmountContainer.classList.add('hidden');
            }
        });
    </script>
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
