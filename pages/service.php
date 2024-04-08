<?php
include('../template/header-one.php');
?>

<!-- Main Content -->
<div class="mx-auto p-8 pb-[200px] bg-gray-100">
    <h1 class="text-4xl font-bold mb-6 mt-[60px] mb-[90px]">Our Services</h1>

    <!-- Service Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Service 1 -->
        <div class="bg-white rounded-md p-6 shadow-md">
            <h2 class="text-2xl font-bold mb-4">Over The Counter (OTC) Crypto Exchange</h2>
            <p class="text-gray-700 leading-relaxed">
                BoomMint offers a seamless Over The Counter (OTC) crypto exchange platform trusted by brokerage executives, financial analysts, and fund managers for secure transactions.
            </p>
        </div>

        <!-- Service 2 -->
        <div class="bg-white rounded-md p-6 shadow-md mt-8 md:mt-0">
            <h2 class="text-2xl font-bold mb-4">Buy And Sell 500+ Cryptocurrencies</h2>
            <p class="text-gray-700 leading-relaxed">
                Explore a wide range of cryptocurrency options with BoomMint. Buy and sell over 500 cryptocurrencies, ensuring profile diversification and a secure trading experience.
            </p>
        </div>

        <!-- Service 3 -->
        <div class="bg-white rounded-md p-6 shadow-md mt-8 lg:mt-0">
            <h2 class="text-2xl font-bold mb-4">Excellent Customer Support</h2>
            <p class="text-gray-700 leading-relaxed">
                BoomMint is dedicated to providing excellent customer support. Our representatives respond to inquiries promptly, aiming to fix any issues within 24 hours.
            </p>
        </div>
    </div>
</div>

<!---button-->
<a href="pikyc.php" class="pichat-link">
  <div class="w-16 h-16 float-right fixed bottom-10 animate-bounce bg-yellow-500 rounded-[20px] mr-8 pichat">
    <!-- Chat icon -->
    <img src="../assets/image/items-one/16193.png" alt="" srcset="">
    <!-- Indicator for "is-loaded" state -->
    <div class="absolute inset-0 flex items-center justify-center" x-show="isLoaded" x-transition:enter="transition-all ease-in-out duration-500" x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100">
      <div class="w-2 h-2 bg-green-500 rounded-full animate-ping"></div>
    </div>
    <span class="bottom-0 right-0 mb-2 mr-2 text-yellow-500 font-bold shadow-lg">Verify KYC</span>
  </div>
</a>
<?php
include("../template/footer.php")
?>