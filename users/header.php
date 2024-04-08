<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/main.css">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>User Dashboard</title>
</head>
<body class="">
<header class="bg-indigo-900 text-white p-4">
    <div class="container mx-auto flex items-center justify-between">
      <!-- Logo -->
      <div class="text-2xl font-bold">
        <a href="#" class="text-white">Boommint</a>
      </div>

      <!-- Mobile Menu Button -->
      <div class="block lg:hidden">
        <button id="mobile-menu-button" class="text-white focus:outline-none">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
        </button>
      </div>

      <!-- Menu (hidden by default on small screens) -->
      <nav class="hidden lg:flex space-x-4 items-center">
        <a href="../index.php" class="text-white hover:text-gray-400">Verify Pi KYC</a>
      </nav>

      <!-- Register and Login (hidden by default on small screens) -->
      <div class="hidden lg:flex space-x-4">
        <button class="text-white hover:text-gray-400 rounded-lg bg-[#ffce29] w-[50px] h-[25px] border-color: transparent;">
        <a href="pages/login.php" class="text-white hover:text-gray-400 no-underline">logout</a>
        </button>


      </div>
    </div>
  </header>

  <!-- Mobile Menu (visible on small screens) -->
  <div id="mobile-menu" class="lg:hidden hidden bg-gray-800 text-white p-4">
    <a href="../index.php" class="block py-2">Home</a>
    <a href="pages/about.php" class="block py-2">Verify Pi KYC</a>
    <button class="text-white hover:text-gray-400 rounded-lg bg-[#ffce29] w-[50px] h-[25px] border-color: transparent;">
    <a href="pages/about.php" class="block py-2">logout</a>
    </button>
  </div>

  <!-- Your content goes here -->

  <!-- Include the JavaScript script -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Toggle mobile menu visibility
      document.getElementById('mobile-menu-button').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
      });
    });
  </script>