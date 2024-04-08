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

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coin Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Select a Coin</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded-md cursor-pointer hover:shadow-md transition duration-300 coin-card" data-coin="coin1">
                <img src="../images/naira.png" alt="Coin 1" class="w-20 h-20 mx-auto mb-4">
                <p class="text-center font-semibold">Deposit Naira</p>
            </div>
            <div class="bg-white p-4 rounded-md cursor-pointer hover:shadow-md transition duration-300 coin-card" data-coin="coin2">
                <img src="../images/16193.png" alt="Coin 2" class="w-20 h-20 mx-auto mb-4">
                <p class="text-center font-semibold">Pi Coin</p>
            </div>
            <div class="bg-white p-4 rounded-md cursor-pointer hover:shadow-md transition duration-300 coin-card" data-coin="coin3">
                <img src="../images/v91_170.png" alt="Coin 3" class="w-20 h-20 mx-auto mb-4">
                <p class="text-center font-semibold">USDT</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
            <div class="bg-white p-4 rounded-md cursor-pointer hover:shadow-md transition duration-300 coin-card" data-coin="coin4">
                <img src="../images/pepe.png" alt="Coin 4" class="w-20 h-20 mx-auto mb-4">
                <p class="text-center font-semibold">Pepe Coin</p>
            </div>
            <div class="bg-white p-4 rounded-md cursor-pointer hover:shadow-md transition duration-300 coin-card" data-coin="coin5">
                <img src="../images/XRP.png" alt="Coin 5" class="w-20 h-20 mx-auto mb-4">
                <p class="text-center font-semibold">XRP Coin</p>
            </div>
        </div>
    </div>

    <!-- Coin Details Modals -->
    <div id="coinDetailsModalCoin1" class="coin-details-modal fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden">
        <div class="coin-details-modal-content absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-md shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Bank Details</h2>
            <p>Bank Name: OPay</p>
            <p>Account Name: Ajose Moshood</p>
            <p>Account Number: 8146883083</p>
            <button class="close-modal-btn mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Close</button>
        </div>
    </div>
    <!-- Coin Details Modals -->
    <div id="coinDetailsModalCoin2" class="coin-details-modal fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden">
        <div class="coin-details-modal-content absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-md shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Pi Coin Details</h2>
            <p>Wallet Address: GDJTEQ4V7NZNUR4XJ56VMOMTSBZH5LG55LPMD3OJY4N5YB2XYUD4NFUZ</p>
            <p>Note tag: Ajose Boommint</p>
            <button class="close-modal-btn mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Close</button>
        </div>
    </div>
        <!-- Coin Details Modals -->
    <div id="coinDetailsModalCoin3" class="coin-details-modal fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden">
        <div class="coin-details-modal-content absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-md shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Pi Coin Details</h2>
            <p>Wallet Address: OPay</p>
            <p>Account Name: Ajose Moshood</p>
            <p>Account Number: 8146883083</p>
            <button class="close-modal-btn mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Close</button>
        </div>
    </div>
    <!-- Similar modals for Coin 2, Coin 3, Coin 4, and Coin 5 -->

    <script>
        // JavaScript to handle modal functionality for each coin
        const coinCards = document.querySelectorAll('.coin-card');
        coinCards.forEach(coinCard => {
            coinCard.addEventListener('click', () => {
                const coinName = coinCard.getAttribute('data-coin');
                const modalId = `#coinDetailsModal${coinName.charAt(0).toUpperCase() + coinName.slice(1)}`;
                document.querySelector(modalId).classList.remove('hidden');
            });
        });

        const closeModalBtns = document.querySelectorAll('.close-modal-btn');
        closeModalBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                btn.closest('.coin-details-modal').classList.add('hidden');
            });
        });
    </script>
</body>
</html>





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
