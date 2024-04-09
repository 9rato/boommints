
<?php
include('template/header.php');

// Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Retrieve the input value from the form
//     $amount = isset($_POST["amount"]) ? floatval($_POST["amount"]) : 0;

//     // Assuming the price per coin is fixed at N50,000
//     $pricePerCoin = 500;

//     // Calculate the total amount
//     $totalAmount = $amount * $pricePerCoin;
// }

?>

<style>
    /*mobile view*/
    @media screen and (max-width: 320px) {
    /* Styles for screens smaller than 320px (e.g., mobile devices) */
    .text-custom1{
        font-size: 30px;
        margin-top: 20px;
    }
    .text-custom2{
        font-size:20px;
    }
    .contianer-custom{
        width: 150px;
        height: 48px;
    }
    .text-custom3{
        font-size: 23px;
    }
    .contianer-custom1{
        margin-top: 10px;
        margin-bottom: 10px;
        width: 220px;
        height: 48px;
    }
    .text-custom4{
        font-size: 23px;
    }
}

@media screen and (max-width: 414px) {
    /* Styles for screens smaller than 320px (e.g., mobile devices) */
    .text-custom1{
        font-size: 30px;
        margin-top: 20px;
    }
    .text-custom2{
        font-size:20px;
    }
    .contianer-custom{
        width: 150px;
        height: 48px;
    }
    .text-custom3{
        font-size: 23px;
    }
    .contianer-custom1{
        margin-top: 10px;
        margin-bottom: 10px;
        width: 220px;
        height: 48px;
    }
    .text-custom4{
        font-size: 23px;
    }
}

@media screen and (max-width: 1024px) {
    /* Styles for screens smaller than 320px (e.g., mobile devices) */
    .img-custom{
        height: 600px;
    }

}

@media screen and (max-width: 688px) {
    /* Styles for screens smaller than 320px (e.g., mobile devices) */
    .contianer-custom1{
        margin-bottom: 10px;
    }

}

</style>

<script>
  // Function to calculate total amount
  function calculateTotal() {
    // Retrieve the amount input value
    var amountInput = document.getElementById('amount').value;
    
    // Assuming the price per coin is fixed at N50,000
    var pricePerCoin = 500;

    // Calculate the total amount
    var totalAmount = parseFloat(amountInput) * pricePerCoin;

    // Display the total amount
    var totalElement = document.getElementById('totalAmount');
    totalElement.textContent = 'N' + totalAmount.toFixed(2); // Format total amount
  }
</script>
<!--slideer-->
<div class="flex bg-[#030828] mt-[63px]">
    <div class="flex-1 ml-8">
        <!-- Content for the first column -->
        <h1 class="text-left font-semibold text-[100px] text-white text-custom1">Sell PI COIN</h1>
        <h1 class="font-bold text-[50px] text-white mb-4 text-custom2">Embrace the Future <br>of Currency.</h1>
        <div class="round-[50px] w-[550px] h-[110px] bg-[#ffce29] rounded-r-[50px] contianer-custom"> 
            <h1 class="font-semibold text-[70px] text-white ml-4 text-custom3">Verify KYC</h1>
        </div>
        <div class="round-[50px] w-[654px] h-[110px] bg-[#ffce29] rounded-r-[50px] md:mb-8 mt-8 contianer-custom1"> 
            <h1 class="font-semibold text-[70px] text-white ml-4 text-custom4">Unlimited Faucet</h1>
        </div>
       
    </div>
    <div class="flex-1 hidden md:block">
        <!-- The 'hidden md:block' will hide the image on screens smaller than md (medium) -->
        <img src="assets/image/items-one/slider.png" alt="Slider Image" class="w-custom h-custom img-custom">
    </div>
</div>

<!--end of slider-->
<!--transaction proof-->
<div class="container-xl bg-[#ffce29] shadow-lg p-2">
    <h1 class="text-2xl font-bold mb-2 pl-8 text-[#030828]">Transactions</h1>
    <div class="marquee">
        <div id="transactionList" class="text-2xl font-bold mb-2 pl-8 text-white"></div>
    </div>
</div>

<style>
    /* Custom styles */
    .transaction-item {
        padding: 3px 0;
    }

    .marquee {
        width: 100%;
        overflow: hidden;
        white-space: nowrap;
    }

    .marquee div {
        display: inline-block;
        animation: marquee 1000s linear infinite; /* Increased duration to slow down */
    }

    @keyframes marquee {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
    
    
</style>

<script>
    let transactions = [];
    let currentTransactionIndex = 0;

    // Function to generate a random phone number
    function generatePhoneNumber() {
        return Math.floor(Math.random() * 10000000000).toString().padStart(10, '0');
    }

    // Function to generate a random amount
    function generateAmount() {
        return (Math.random() * 1000).toFixed(2);
    }

    // Function to generate a single transaction
    function generateSingleTransaction() {
        const phoneNumber = generatePhoneNumber();
        const amount = generateAmount();
        return `
        <div class="transaction-item">
          <p class="pl-8"><strong>Phone Number:</strong> ${phoneNumber} <strong>Amount:</strong> $${amount} <strong>Type:</strong> ${Math.random() > 0.5 ? 'Buy' : 'Sell'} <strong>Date:</strong> ${new Date().toLocaleString()}</p>
        </div>
      `;
    }

    // Function to generate transactions
    function generateTransactions() {
        transactions = [];
        for (let i = 0; i < 100; i++) {
            transactions.push(generateSingleTransaction());
        }
        const transactionList = document.getElementById('transactionList');
        transactionList.innerHTML = transactions.join('');
    }

    // Generate initial transactions
    generateTransactions();

    // Increment index and generate transactions every minute
    setInterval(function() {
        currentTransactionIndex++;
        generateTransactions();
    }, 60000);
</script>
<!--end of transaction proof-->

<!------------------------------------------------------->
  
<div class="flex flex-col-reverse md:flex-row md:grid md:grid-cols-2 gap-4 mx-2 sm:mx-4 md:mx-8 max-w-screen-xl mt-4 md:mt-8">
    <div class="md:ml-2">
        <div class="bg-gray-100 p-4 md:p-8">
            <h4 class="text-sm text-center font-bold md:mt-10 mb-4 text-violet-950">Also, support and join our social links for more updates</h4>
            <div class="flex flex-col md:flex-row items-center md:gap-4 md:ml-2 ml-8">
    <a href="https://t.me/your-telegram-channel" target="_blank" rel="noopener noreferrer" class="flex items-center bg-black text-white font-bold py-2 px-4 rounded md:mb-0 mb-2">
        <img src="./assets/image/items/twitter-154-svgrepo-com.svg" class="w-12 h-12 mr-2" alt="" srcset="">
        <p>Join us on Twitter</p>
    </a>
    <a href="https://wa.me/your-whatsapp-number" target="_blank" rel="noopener noreferrer" class="flex items-center bg-green-500 text-white font-bold py-2 px-4 rounded">
        <svg class="w-12 h-12 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.6 6.31999C16.8669 5.58141 15.9943 4.99596 15.033 4.59767C14.0716 4.19938 13.0406 3.99622 12 3.99999C10.6089 4.00135 9.24248 4.36819 8.03771 5.06377C6.83294 5.75935 5.83208 6.75926 5.13534 7.96335C4.4386 9.16745 4.07046 10.5335 4.06776 11.9246C4.06507 13.3158 4.42793 14.6832 5.12 15.89L4 20L8.2 18.9C9.35975 19.5452 10.6629 19.8891 11.99 19.9C14.0997 19.9001 16.124 19.0668 17.6222 17.5816C19.1205 16.0965 19.9715 14.0796 19.99 11.97C19.983 10.9173 19.7682 9.87634 19.3581 8.9068C18.948 7.93725 18.3505 7.05819 17.6 6.31999ZM12 18.53C10.8177 18.5308 9.65701 18.213 8.64 17.61L8.4 17.46L5.91 18.12L6.57 15.69L6.41 15.44C5.55925 14.0667 5.24174 12.429 5.51762 10.8372C5.7935 9.24545 6.64361 7.81015 7.9069 6.80322C9.1702 5.79628 10.7589 5.28765 12.3721 5.37368C13.9853 5.4597 15.511 6.13441 16.66 7.26999C17.916 8.49818 18.635 10.1735 18.66 11.93C18.6442 13.6859 17.9355 15.3645 16.6882 16.6006C15.441 17.8366 13.756 18.5301 12 18.53ZM15.61 13.59C15.41 13.49 14.44 13.01 14.26 12.95C14.08 12.89 13.94 12.85 13.81 13.05C13.6144 13.3181 13.404 13.5751 13.18 13.82C13.07 13.96 12.95 13.97 12.75 13.82C11.6097 13.3694 10.6597 12.5394 10.06 11.47C9.85 11.12 10.26 11.14 10.64 10.39C10.6681 10.3359 10.6827 10.2759 10.6827 10.215C10.6827 10.1541 10.6681 10.0941 10.64 10.04C10.64 9.93999 10.19 8.95999 10.03 8.56999C9.87 8.17999 9.71 8.23999 9.58 8.22999H9.19C9.08895 8.23154 8.9894 8.25465 8.898 8.29776C8.8066 8.34087 8.72546 8.403 8.66 8.47999C8.43562 8.69817 8.26061 8.96191 8.14676 9.25343C8.03291 9.54495 7.98287 9.85749 8 10.17C8.0627 10.9181 8.34443 11.6311 8.81 12.22C9.6622 13.4958 10.8301 14.5293 12.2 15.22C12.9185 15.6394 13.7535 15.8148 14.58 15.72C14.8552 15.6654 15.1159 15.5535 15.345 15.3915C15.5742 15.2296 15.7667 15.0212 15.91 14.78C16.0428 14.4856 16.0846 14.1583 16.03 13.84C15.94 13.74 15.81 13.69 15.61 13.59Z" fill="white"/>
        </svg>
        <p>Chat on WhatsApp</p>
    </a>
</div>

        </div>
    </div>
   <div class="md:mr-8 ">
  <!-- Inline image -->
  <img class="w-14 h-14 rounded-full mx-auto mb-4" src="assets/image/items-one/16193.png" alt="Profile Image">

  <!-- Form -->
  <div class="mb-4">
    <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">AMOUNTS</label>
    <input type="text" id="amount" name="amount" class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline" oninput="calculateTotal()">
    
    <label for="price" class="block text-gray-700 text-sm font-bold mb-2 text-center">PRICE</label>
    <label for="price" id="totalAmount" class="block text-sm font-bold mb-2 text-center text-violet-950" style="font-size: xxx-large;">N0.00</label>
  </div>
  <!--<button type="button" class="bg-blue-500 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="calculateTotal()">Calculate</button>-->
</div>
</div>




<!------------------------------------------------------->
<!-------------------------------------------------------->

<div class="grid gap-4 text-center mb-8 mt-[40px]">
        <p class="text-violet-950 font-bold relative">
        What We Do
        <span class="block mx-auto mt-1 w-16 h-1 bg-yellow-500"></span>
        </p>
        <h2 class="text-2xl font-bold">Our <strong class="text-violet-950">Services</strong></h2>
        <p class="text-gray-600 mb-4">Boommint is a legitimate next-generation platform that is rapidly expanding and assisting users to buy and sell cryptocurrency in world. <br> The moment you complete a transaction with Boommint, you can view the cryptocurrency balance updated in your wallet instantly.</p>
    </div>
<!-------------------------------------------------------->
<!--section one-->
<div class="grid md:grid-cols-2 grid-cols-1 gap-4 mx-8 max-w-screen-xl ml-16 mr-16">
    <div class="mt-10">
        <img src="assets/image/items-one/blogs.png" alt="" class="rounded hover:rounded-r-full w-custom h-custom">
    </div>
    <div class="ml-8">
    <h2 class="text-2xl font-bold md:mt-10 mb-8 text-violet-950">Over The Counter (OTC) Crypto Exchange Platform</h2>
        <p class="text-gray-600 font-sans md:text-lg mt-8 text-sm">Boommint is the most popular OTC crypto exchange in the world that brokerage executives, financial analysts and fund managers trust for seamless transactions.</p>
    </div>
</div>


<!--end section one-->
<!-------------------------------------------------------->
<!--section two-->
<div class="flex flex-col-reverse md:flex-row md:grid md:grid-cols-2 gap-4 mx-8 max-w-screen-xl ml-16 mr-16">
    <div class="md:ml-8">
        <h2 class="text-2xl font-bold md:mt-10 mb-8 text-violet-950">Buy And Sell 500+ Cryptocurrencies</h2>
        <p class="text-gray-600 font-sans md:text-lg mt-8 text-sm">Profile diversification is the key strategy when it comes to investing in the crypto market. With us, you can easily exchange or sell Bitcoin in the world for other assets, such as traditional cash or Altcoins. Start trading more than 500 cryptocurrencies.</p>
    </div>
    <div class="md:mr-8">
        <img src="assets/image/items-one/coin.png" alt="" class="rounded hover:rounded-l-full w-custom h-custom">
    </div>
</div>

<!--end section two-->
<!-------------------------------------------------------->
<!--section three-->
<div class="grid md:grid-cols-2 grid-cols-1 gap-4 mx-8 max-w-screen-xl ml-16 mr-16">
    <div class="mt-10">
        <img src="assets/image/items-one/support.png" alt="" class="rounded hover:rounded-r-full w-custom h-custom">
    </div>
    <div class="ml-8">
    <h2 class="text-2xl font-bold md:mt-10 mb-8 text-violet-950">Excellent Customer Support</h2>
        <p class="text-gray-600 font-sans md:text-lg mt-8 text-sm">Boommint establishes its presence by deploying customer service strategies that allow our representatives to respond to inquiries in just a few minutes. The goal is to fix any problems consumers have within 24 hours. Other cryptocurrency exchanges, on the other hand, usually answer within 3-5 business days.</p>
    </div>
</div>

<!--end section three-->
<!-------------------------------------------------------->
<!--section four-->
<div class="section4 mt-[60px] mr-16 ml-16 mb-12">
    <div class="grid gap-4 text-center mb-8">
        <p class="text-violet-950 font-bold relative">
        What We Do
        <span class="block mx-auto mt-1 w-16 h-1 bg-yellow-500"></span>
        </p>
        <h2 class="text-2xl font-bold">Access To <strong class="text-violet-950">600+ Cryptocurrencies</strong></h2>
        <p class="text-gray-600 mb-4">Trade with confidence on the fastest and most secure crypto exchange platform.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white bg-opacity-100 rounded-md p-4 text-center drop-shadow-2xl">
            <img src="assets/image/items/smartphone.svg" alt="Smartphone icon" class="size-40 mx-auto mb-4">
            <h4 class="text-lg font-bold mb-2">Transparent Pricing</h4>
            <p>We provide a safe exchange for your crypto trades at the lowest commission rate. With us, there are no hidden charges involved. Get the best exchange rates at Crypto Desk.</p>
        </div>

        <div class="bg-white bg-opacity-100 rounded-md p-4 text-center drop-shadow-2xl">
            <img src="assets/image/items/shield.svg" alt="Shield icon" class="size-40 mx-auto mb-4">
            <h4 class="text-lg font-bold mb-2">Reliable Platform</h4>
            <p>Approximately, 60% of cryptocurrency traders have faced scams while trading via unreliable platforms. However, with Crypto Desk, accomplish 100% scam-free transactions.</p>
        </div>

        <div class="bg-white bg-opacity-100 rounded-md p-4 text-center drop-shadow-2xl">
            <img src="assets/image/items/clock.svg" alt="Clock icon" class="size-40 mx-auto mb-4">
            <h4 class="text-lg font-bold mb-2">Fast And Secure Transactions</h4>
            <p>We provide a safe protocol for your crypto exchange and complete your transactions in just a few minutes. This is what makes us the best cryptocurrency exchange.</p>
        </div>
    </div>
</div>

<!--end of section four-->
<!-------------------------------------------------------->
<!-------------------------------------------------------->
<!-- Testimony card container -->
<div class="overflow-x-auto">
  <div class="md:flex justify-start mx-8 block" id="testimony-container">
    <!-- First Testimony Card -->
    <div class="max-w-xs mx-2 my-4 bg-yellow-300 shadow-lg rounded-lg overflow-hidden testimony-card">
      <div class="px-4 py-2">
        <p class="text-gray-800 text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div class="px-4 py-2">
        <p class="text-gray-600 text-sm italic">- John Doe</p>
      </div>
    </div>

    <!-- Second Testimony Card -->
    <div class="max-w-xs mx-2 my-4 bg-yellow-300 shadow-lg rounded-lg overflow-hidden testimony-card">
      <div class="px-4 py-2">
        <p class="text-gray-800 text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div class="px-4 py-2">
        <p class="text-gray-600 text-sm italic">- John Doe</p>
      </div>
    </div>

    <!-- Third Testimony Card -->
    <div class="max-w-xs mx-2 my-4 bg-yellow-300 shadow-lg rounded-lg overflow-hidden testimony-card">
      <div class="px-4 py-2">
        <p class="text-gray-800 text-base">Boommint made trading Pi Coin a breeze! Their platform is user-friendly, and I was able to buy and sell Pi Coin effortlessly. I highly recommend Boommint to anyone interested in Pi Coin trading.</p>
      </div>
      <div class="px-4 py-2">
        <p class="text-gray-600 text-sm italic">- Sophia Rodriguez</p>
      </div>
    </div>

    <!-- Fourth Testimony Card -->
    <div class="max-w-xs mx-2 my-4 bg-yellow-300 shadow-lg rounded-lg overflow-hidden testimony-card">
      <div class="px-4 py-2">
        <p class="text-gray-800 text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div class="px-4 py-2">
        <p class="text-gray-600 text-sm italic">- John Doe</p>
      </div>
    </div>
  </div>
</div>

<!--end of testimony card-->

<!---button-->
<a href="./pages/pikyc.php" class="pichat-link">
  <div class="w-16 h-16 float-right fixed bottom-10 animate-bounce bg-yellow-500 rounded-[20px] mr-8 pichat">
    <!-- Chat icon -->
    <img src="assets/image/items-one/16193.png" alt="" srcset="">
    <!-- Indicator for "is-loaded" state -->
    <div class="absolute inset-0 flex items-center justify-center" x-show="isLoaded" x-transition:enter="transition-all ease-in-out duration-500" x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100">
      <div class="w-2 h-2 bg-green-500 rounded-full animate-ping"></div>
    </div>
    <span class="bottom-0 right-0 mb-2 mr-2 text-yellow-500 font-bold shadow-lg">Verify KYC</span>
  </div>
</a>
<?php
include('template/footer.php');
?>