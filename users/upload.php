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
    <div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Upload Payment Proof</h2>
    <form id="paymentForm" enctype="multipart/form-data" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-4">
            <label for="proofImage" class="block text-gray-700 font-medium mb-2">Payment Proof Image:</label>
            <input type="file" id="proofImage" name="proofImage" accept="image/*" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="amount" class="block text-gray-700 font-medium mb-2">Amount:</label>
            <input type="text" id="amount" name="amount" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="paymentType" class="block text-gray-700 font-medium mb-2">Payment Type:</label>
            <select id="paymentType" name="paymentType" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select Payment Type</option>
                <option value="piCoin">Pi Coin</option>
                <option value="usdtCoin">USDT Coin</option>
                <option value="pepeCoin">Pepe Coin</option>
                <option value="naira">Naira</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="transactionType" class="block text-gray-700 font-medium mb-2">Transaction Type:</label>
            <select id="transactionType" name="transactionType" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Select Transaction Type</option>
                <option value="buy">Buy</option>
                <option value="sell">Sell</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
    </form>
</div>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $proofImagePath = $_FILES["proofImage"]["name"];
        $amount = $_POST["amount"];
        $paymentType = $_POST["paymentType"];
        $transactionType = $_POST["transactionType"];

        // Move uploaded file to a permanent location
        $targetDirectory = "uploads/";
        $targetFilePath = $targetDirectory . basename($proofImagePath);
        move_uploaded_file($_FILES["proofImage"]["tmp_name"], $targetFilePath);

        // Database connection parameters
        $servername = "localhost";
        $username = "boommint_pi"; // Replace with your MySQL username
        $password = "boommint_pi"; // Replace with your MySQL password
        $dbname = "boommint_pi"; // Replace with your MySQL database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement
        $sql = "INSERT INTO payment_records (proof_image_path, amount, payment_type, transaction_type) 
                VALUES ('$targetFilePath', '$amount', '$paymentType', '$transactionType')";

        // Execute SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('<div class=\"container mx-auto p-4 bg-green-200 text-green-800 rounded-md mt-4\">New record inserted successfully</div>');</script>";

        } else {
            echo "<div class='container mx-auto p-4 bg-red-200 text-red-800 rounded-md mt-4'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }

        // Close connection
        $conn->close();
    }
    ?>    
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
