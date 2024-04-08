<?php
include('../template/header-one.php');
?>

<div class="container-xl mx-auto p-8 bg-gray-100">
    <h1 class="text-4xl font-bold mb-6 mt-[60px]">Contact Us</h1>

    <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // In a real-world scenario, you would perform additional validation and processing here

    // Send email
    $to = "contact@boommint.com";
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "Content-type: text/html; charset=utf-8\r\n";

    $mailBody = "<p><strong>Name:</strong> $name</p>";
    $mailBody .= "<p><strong>Email:</strong> $email</p>";
    $mailBody .= "<p><strong>Message:</strong> $message</p>";

    // Use mail() function to send the email
    mail($to, $subject, $mailBody, $headers);

    // Display a confirmation message using JavaScript
    echo "<script>";
    echo "document.getElementById('confirmation-message').innerHTML = '<p class=\"mb-4 font-bold\">Thank you, $name! Your message has been received.</p><p>We have sent an email to contact@boommint.com with the details.</p>';";
    echo "</script>";
}
?>



    <!-- Contact Form -->
    <form action="" method="post" class="max-w-md mx-auto">
        <!-- Name Input -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Your Name</label>
            <input type="text" id="name" name="name" class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <!-- Email Input -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Your Email</label>
            <input type="email" id="email" name="email" class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <!-- Message Input -->
        <div class="mb-6">
            <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Your Message</label>
            <textarea id="message" name="message" rows="4" class="w-full border rounded px-3 py-2 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">Send Message</button>
    </form>

    <!-- Confirmation Message Container -->
    <div id="confirmation-message" class="mt-4"></div>
</div>

<!-- JavaScript for displaying confirmation message -->
<script>
    // JavaScript code to dynamically display the confirmation message
    // This script assumes the confirmation message container has the id 'confirmation-message'
    document.addEventListener('DOMContentLoaded', function () {
        <?php
            // Display confirmation message using JavaScript if set by PHP
            if (isset($name)) {
                echo "document.getElementById('confirmation-message').innerHTML = '<p class=\"mb-4 font-bold\">Thank you, $name! Your message has been received.</p><p>We have sent an email to contact@boommint.com with the details.</p>';";
            }
        ?>
    });
</script>

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
include("../template/footer.php")
?>