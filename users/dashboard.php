<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

include('../db/config.php');

// Establish database connection
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "boommint_pi"; // Change this to your database username
$password = "boommint_pi"; // Change this to your database password
$database = "boommint_pi"; // Change this to your database name

$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Define an array to store balances
$balances = array();

// Prepare and execute the SQL queries to select balances
$tables = array(
    'naira' => 'Naira_Balance',
    'usdt' => 'USDT_Balance',
    'piwallet' => 'Pi_Balance',
    'pepe' => 'Pepe_Balance',
    'xrp' => 'XRP_Balance'
);

foreach ($tables as $table => $column) {
    $sql = "SELECT $column FROM $table WHERE user_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->bind_result($balance);
    $stmt->fetch();
    $stmt->close();
    
    // Store balance in the array
    $balances[$table] = $balance;
}

// Close database connection
$connection->close();
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
      width: 260px;
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
        <div class="flex-1 flex flex-col ml-8">
            <div class="container mx-auto mt-8">
                       <!-- Component Start -->
                <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 w-full max-w-6xl mt-8">
                      <!-- Tile 1 -->
                      <div class="flex items-center p-4 bg-blue-100 rounded card-box">
                        <div class="flex flex-shrink-0 items-center justify-center bg-blue-300 h-16 w-16 rounded">
                          <svg class="w-6 h-6 fill-current text-blue-700"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                          </svg>
                        </div>
                        <div class="flex-grow flex flex-col ml-4">
                          <span class="text-xl font-bold">₦<?php echo $balances['naira']; ?></span>
                          <div class="flex items-center justify-between">
                            <span class="text-gray-500">Amount in Naira</span>
                            <span class="text-blue-500 text-sm font-semibold ml-2">+12.6%</span>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Tile 2 -->
                      <div class="flex items-center p-4 bg-blue-100 rounded card-box">
                        <div class="flex flex-shrink-0 items-center justify-center bg-red-300 h-16 w-16 rounded">
                          <svg class="w-6 h-6 fill-current text-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                          </svg>
                        </div>
                        <div class="flex-grow flex flex-col ml-4">
                          <span class="text-xl font-bold">$<?php echo $balances['usdt'];?></span>
                          <div class="flex items-center justify-between">
                            <span class="text-gray-500">Amount in USDT</span>
                            <span class="text-red-500 text-sm font-semibold ml-2">-8.1%</span>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Tile 3 -->
                      <div class="flex items-center p-4 bg-blue-100 rounded card-box">
                        <div class="flex flex-shrink-0 items-center justify-center bg-green-300 h-16 w-16 rounded">
                          <svg class="w-6 h-6 fill-current text-green-700"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                          </svg>
                        </div>
                        <div class="flex-grow flex flex-col ml-4">
                          <span class="text-xl font-bold"><?php echo $balances['piwallet'];?></span>
                          <div class="flex items-center justify-between">
                            <span class="text-gray-500">Amount in Pi Coin</span>
                            <span class="text-green-500 text-sm font-semibold ml-2">+28.4%</span>
                          </div>
                        </div>
                      </div>
                      
                    <!-- Tile 4 -->
                    <div class="flex items-center p-4 bg-blue-100 rounded card-box">
                      <div class="flex flex-shrink-0 items-center justify-center bg-yellow-300 h-16 w-16 rounded">
                        <svg class="w-6 h-6 fill-current text-yellow-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                      </div>
                      <div class="flex-grow flex flex-col ml-4">
                        <span class="text-xl font-bold"><?php echo $balances['pepe'];?></span>
                        <div class="flex items-center justify-between">
                          <span class="text-gray-500">Pepe</span>
                          <span class="text-yellow-500 text-sm font-semibold ml-2">Limited Time</span>
                        </div>
                      </div>
                    </div>
                    <!-- Tile 5 -->
                    <div class="flex items-center p-4 bg-blue-100 rounded card-box">
                      <div class="flex flex-shrink-0 items-center justify-center bg-yellow-300 h-16 w-16 rounded">
                        <svg class="w-6 h-6 fill-current text-yellow-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                      </div>
                      <div class="flex-grow flex flex-col ml-4">
                        <span class="text-xl font-bold"><?php echo $balances['xrp'];?></span>
                        <div class="flex items-center justify-between">
                          <span class="text-gray-500">xrp</span>
                          <span class="text-yellow-500 text-sm font-semibold ml-2">Limited Time</span>
                        </div>
                      </div>
                    </div>
                  
                </div>
<!-- Component End  -->
            <!-- Component - one  -->
                  <div class="container mx-auto py-8">
          <h1 class="text-3xl font-bold mb-4">Payment History</h1>
          <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-md overflow-hidden">
              <thead class="bg-gray-200">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Type</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Naira</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">USDT</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">PI Coin</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">Withdraw</td>
                  <td class="px-6 py-4 whitespace-nowrap">₦5,000</td>
                  <td class="px-6 py-4 whitespace-nowrap">50 USDT</td>
                  <td class="px-6 py-4 whitespace-nowrap">1000 PI</td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">Deposit</td>
                  <td class="px-6 py-4 whitespace-nowrap">₦2,500</td>
                  <td class="px-6 py-4 whitespace-nowrap">25 USDT</td>
                  <td class="px-6 py-4 whitespace-nowrap">500 PI</td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">Sell</td>
                  <td class="px-6 py-4 whitespace-nowrap">₦3,000</td>
                  <td class="px-6 py-4 whitespace-nowrap">30 USDT</td>
                  <td class="px-6 py-4 whitespace-nowrap">600 PI</td>
                </tr>
                <!-- Add more rows as needed -->
              </tbody>
            </table>
          </div>
          <div class="flex justify-between mt-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Previous</button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Next</button>
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
