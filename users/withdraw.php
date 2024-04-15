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
    <h1 class="text-2xl font-bold mb-4">Withdrawal Form</h1>
        
        <form class="max-w-md mx-auto" action="withdrawal_process.php" method="POST">
            <div class="mb-4">
                <label for="withdrawalMethod" class="block text-sm font-bold mb-2">Withdrawal Method</label>
                <select id="withdrawalMethod" name="withdrawal_method" class="w-full px-4 py-2 border rounded-md">
                    <option value="naira">Naira</option>
                    <option value="usdt">USDT</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="withdrawalAmount" class="block text-sm font-bold mb-2">Withdrawal Amount</label>
                <input type="text" id="withdrawalAmount" name="withdrawal_amount" class="w-full px-4 py-2 border rounded-md" placeholder="Enter withdrawal amount">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Withdraw</button>
        </form>
</div>
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
