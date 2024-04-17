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
    <div class="flex flex-col items-center md:flex-row md:justify-center  mb-[200px] mt-[60px]">
  <!-- Naira Card -->
  <div class="max-w-sm rounded overflow-hidden shadow-lg mx-2 mb-4 md:mb-0">
    <img class="w-full h-32 object-cover" src="../images/naira.png" alt="Naira">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">Withdraw in Naira</div>
      <p class="text-gray-700 text-base">
       Minimum: N5000
      </p>
    </div>
    <div class="px-6 py-4">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Pay with Naira
      </button>
    </div>
  </div>

  <!-- USDT Card -->
  <div class="max-w-sm rounded overflow-hidden shadow-lg mx-2 mb-4 md:mb-0">
    <img class="w-full h-32 object-cover" src="../assets/image/crypto/USDT.png" alt="USDT">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">Withdraw in USDT</div>
      <p class="text-gray-700 text-base">
      Minimum: 10USDT
      </p>
    </div>
    <div class="px-6 py-4">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Pay with USDT
      </button>
    </div>
  </div>
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
