<?php
include('../template/header-one.php');
?>
<!-- Main Content -->
<div class="container-xl mx-auto p-8 bg-gray-100 pb-[100px]">
    <h1 class="text-4xl font-bold mb-6 mt-[60px]">About Us</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Left Column -->
        <div>
            <img src="../assets/image/icons/2.svg" alt="Company Image" class="w-full h-auto rounded-md mb-4" style="width: 40px">
            <p class="text-gray-700 leading-relaxed">
                BoomMint is a leading cryptocurrency exchange platform dedicated to providing seamless and secure transactions for users worldwide. Our mission is to simplify the process of buying and selling various cryptocurrencies, making it accessible to everyone.
            </p>
        </div>

        <!-- Right Column -->
        <div>
            <h2 class="text-2xl font-bold mb-4">Our Mission</h2>
            <p class="text-gray-700 leading-relaxed">
                At BoomMint, we are committed to fostering the adoption of cryptocurrencies by offering a user-friendly platform with transparent pricing and excellent customer support. We believe in empowering individuals to take control of their financial future through the world of digital assets.
            </p>

            <h2 class="text-2xl font-bold mt-8 mb-4">Why Choose BoomMint?</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li>Secure and transparent transactions</li>
                <li>Wide range of supported cryptocurrencies</li>
                <li>24/7 customer support</li>
                <li>Fast and reliable platform</li>
            </ul>
        </div>
    </div>
</div>

<!---button-->
<a href="./pages/pikyc.php" class="pichat-link">
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
include('../template/footer.php');
?>