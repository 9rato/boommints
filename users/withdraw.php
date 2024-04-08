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
        
        <form class="max-w-md mx-auto" id="withdrawalForm">
            <div class="mb-4">
                <label for="withdrawalMethod" class="block text-sm font-bold mb-2">Withdrawal Method</label>
                <select id="withdrawalMethod" name="withdrawalMethod" class="w-full px-4 py-2 border rounded-md">
                    <option value="naira">Naira</option>
                    <option value="usdt">USDT</option>
                </select>
            </div>

            <div class="mb-4" id="accountNumberContainer">
                <label for="accountNumber" class="block text-sm font-bold mb-2">Account Number</label>
                <input type="text" id="accountNumber" name="accountNumber" class="w-full px-4 py-2 border rounded-md" placeholder="Enter your account number">
            </div>

            <div class="mb-4" id="accountNameContainer">
                <label for="accountName" class="block text-sm font-bold mb-2">Account Name</label>
                <input type="text" id="accountName" name="accountName" class="w-full px-4 py-2 border rounded-md" placeholder="Enter your account name">
            </div>

            <div class="mb-4" id="bankNameContainer">
                <label for="bankName" class="block text-sm font-bold mb-2">Bank Name</label>
                <input type="text" id="bankName" name="bankName" class="w-full px-4 py-2 border rounded-md" placeholder="Enter your bank name">
            </div>

            <div class="mb-4 hidden" id="walletAddressContainer">
                <label for="walletAddress" class="block text-sm font-bold mb-2">Wallet Address</label>
                <input type="text" id="walletAddress" name="walletAddress" class="w-full px-4 py-2 border rounded-md" placeholder="Enter your wallet address">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Withdraw</button>
        </form>
    </div>

    <script>
        const withdrawalMethodSelect = document.getElementById('withdrawalMethod');
        const accountNumberContainer = document.getElementById('accountNumberContainer');
        const accountNameContainer = document.getElementById('accountNameContainer');
        const bankNameContainer = document.getElementById('bankNameContainer');
        const walletAddressContainer = document.getElementById('walletAddressContainer');

        withdrawalMethodSelect.addEventListener('change', function() {
            if (this.value === 'usdt') {
                accountNumberContainer.classList.add('hidden');
                accountNameContainer.classList.add('hidden');
                bankNameContainer.classList.add('hidden');
                walletAddressContainer.classList.remove('hidden');
            } else {
                accountNumberContainer.classList.remove('hidden');
                accountNameContainer.classList.remove('hidden');
                bankNameContainer.classList.remove('hidden');
                walletAddressContainer.classList.add('hidden');
            }
        });
    </script>
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
