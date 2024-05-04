<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="shortcut icon" href="../assets/image/icons/2.svg" type="image/x-icon">
  <title>Home</title>
</head>
<style>
    /* Additional custom styles */
    .fixed-header {
      transition: background-color 0.3s ease;
    }
  </style>
<body class="">
  <!-- Header -->
  <header id="header" class="fixed top-0 left-0 w-full bg-gray-900 text-white p-4 z-10">
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
      <nav class="hidden lg:flex space-x-4">
        <a href="../index.php" class="text-white hover:text-gray-400">Home</a>
        <a href="about.php" class="text-white hover:text-gray-400">About Us</a>
        <a href="service.php" class="text-white hover:text-gray-400">Services</a>
        <a href="pikyc.php" class="text-white hover:text-gray-400">Verify Our Pi KYC</a>
        <a href="contact.php" class="text-white hover:text-gray-400">Contact</a>
        <a href="comingsoon.php" class="text-white hover:text-gray-400">Become a Vendor</a>
        <a href="joinus.php" class="text-white hover:text-gray-400">Join Us on Social Link</a>
      </nav>

      <!-- Register and Login (hidden by default on small screens) -->
      <div class="hidden lg:flex space-x-4">
        <!-- <a href="register.php" class="text-white hover:text-gray-400">Register</a>
        <button class="text-white hover:text-gray-400 rounded-lg bg-[#ffce29] w-[50px] h-[25px] border-color: transparent;">
        <a href="login.php" class="text-white hover:text-gray-400 no-underline">Login</a>
        </button> -->
        <a href="https://wa.me/+2348146883083" target="_blank" rel="noopener noreferrer" class="flex items-center bg-green-500 text-white font-bold py-2 px-4 rounded">
        <svg class="w-12 h-12 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.6 6.31999C16.8669 5.58141 15.9943 4.99596 15.033 4.59767C14.0716 4.19938 13.0406 3.99622 12 3.99999C10.6089 4.00135 9.24248 4.36819 8.03771 5.06377C6.83294 5.75935 5.83208 6.75926 5.13534 7.96335C4.4386 9.16745 4.07046 10.5335 4.06776 11.9246C4.06507 13.3158 4.42793 14.6832 5.12 15.89L4 20L8.2 18.9C9.35975 19.5452 10.6629 19.8891 11.99 19.9C14.0997 19.9001 16.124 19.0668 17.6222 17.5816C19.1205 16.0965 19.9715 14.0796 19.99 11.97C19.983 10.9173 19.7682 9.87634 19.3581 8.9068C18.948 7.93725 18.3505 7.05819 17.6 6.31999ZM12 18.53C10.8177 18.5308 9.65701 18.213 8.64 17.61L8.4 17.46L5.91 18.12L6.57 15.69L6.41 15.44C5.55925 14.0667 5.24174 12.429 5.51762 10.8372C5.7935 9.24545 6.64361 7.81015 7.9069 6.80322C9.1702 5.79628 10.7589 5.28765 12.3721 5.37368C13.9853 5.4597 15.511 6.13441 16.66 7.26999C17.916 8.49818 18.635 10.1735 18.66 11.93C18.6442 13.6859 17.9355 15.3645 16.6882 16.6006C15.441 17.8366 13.756 18.5301 12 18.53ZM15.61 13.59C15.41 13.49 14.44 13.01 14.26 12.95C14.08 12.89 13.94 12.85 13.81 13.05C13.6144 13.3181 13.404 13.5751 13.18 13.82C13.07 13.96 12.95 13.97 12.75 13.82C11.6097 13.3694 10.6597 12.5394 10.06 11.47C9.85 11.12 10.26 11.14 10.64 10.39C10.6681 10.3359 10.6827 10.2759 10.6827 10.215C10.6827 10.1541 10.6681 10.0941 10.64 10.04C10.64 9.93999 10.19 8.95999 10.03 8.56999C9.87 8.17999 9.71 8.23999 9.58 8.22999H9.19C9.08895 8.23154 8.9894 8.25465 8.898 8.29776C8.8066 8.34087 8.72546 8.403 8.66 8.47999C8.43562 8.69817 8.26061 8.96191 8.14676 9.25343C8.03291 9.54495 7.98287 9.85749 8 10.17C8.0627 10.9181 8.34443 11.6311 8.81 12.22C9.6622 13.4958 10.8301 14.5293 12.2 15.22C12.9185 15.6394 13.7535 15.8148 14.58 15.72C14.8552 15.6654 15.1159 15.5535 15.345 15.3915C15.5742 15.2296 15.7667 15.0212 15.91 14.78C16.0428 14.4856 16.0846 14.1583 16.03 13.84C15.94 13.74 15.81 13.69 15.61 13.59Z" fill="white"/>
        </svg>
        <p>Chat on WhatsApp</p>
        </a>
      </div>
    </div>
  </header>

  <!-- Mobile Menu (visible on small screens) -->
  <div id="mobile-menu" class="lg:hidden hidden bg-gray-800 text-white p-4">
    <a href="../index.php" class="block py-2">Home</a>
    <a href="about.php" class="block py-2">About Us</a>
    <a href="service.php" class="block py-2">Services</a>
    <a href="pikyc.php" class="block py-2">Verify Our Pi KYC</a>
    <a href="contact.php" class="block py-2">Contact</a>
    <a href="comingsoon.php" class="block py-2">Become a Vendor</a>
    <a href="joinus.php" class="block py-2">Join Us on Social Link</a>
    <a href="https://wa.me/+2348146883083" target="_blank" rel="noopener noreferrer" class="flex items-center bg-green-500 text-white font-bold py-2 px-4 rounded">
        <svg class="w-12 h-12 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.6 6.31999C16.8669 5.58141 15.9943 4.99596 15.033 4.59767C14.0716 4.19938 13.0406 3.99622 12 3.99999C10.6089 4.00135 9.24248 4.36819 8.03771 5.06377C6.83294 5.75935 5.83208 6.75926 5.13534 7.96335C4.4386 9.16745 4.07046 10.5335 4.06776 11.9246C4.06507 13.3158 4.42793 14.6832 5.12 15.89L4 20L8.2 18.9C9.35975 19.5452 10.6629 19.8891 11.99 19.9C14.0997 19.9001 16.124 19.0668 17.6222 17.5816C19.1205 16.0965 19.9715 14.0796 19.99 11.97C19.983 10.9173 19.7682 9.87634 19.3581 8.9068C18.948 7.93725 18.3505 7.05819 17.6 6.31999ZM12 18.53C10.8177 18.5308 9.65701 18.213 8.64 17.61L8.4 17.46L5.91 18.12L6.57 15.69L6.41 15.44C5.55925 14.0667 5.24174 12.429 5.51762 10.8372C5.7935 9.24545 6.64361 7.81015 7.9069 6.80322C9.1702 5.79628 10.7589 5.28765 12.3721 5.37368C13.9853 5.4597 15.511 6.13441 16.66 7.26999C17.916 8.49818 18.635 10.1735 18.66 11.93C18.6442 13.6859 17.9355 15.3645 16.6882 16.6006C15.441 17.8366 13.756 18.5301 12 18.53ZM15.61 13.59C15.41 13.49 14.44 13.01 14.26 12.95C14.08 12.89 13.94 12.85 13.81 13.05C13.6144 13.3181 13.404 13.5751 13.18 13.82C13.07 13.96 12.95 13.97 12.75 13.82C11.6097 13.3694 10.6597 12.5394 10.06 11.47C9.85 11.12 10.26 11.14 10.64 10.39C10.6681 10.3359 10.6827 10.2759 10.6827 10.215C10.6827 10.1541 10.6681 10.0941 10.64 10.04C10.64 9.93999 10.19 8.95999 10.03 8.56999C9.87 8.17999 9.71 8.23999 9.58 8.22999H9.19C9.08895 8.23154 8.9894 8.25465 8.898 8.29776C8.8066 8.34087 8.72546 8.403 8.66 8.47999C8.43562 8.69817 8.26061 8.96191 8.14676 9.25343C8.03291 9.54495 7.98287 9.85749 8 10.17C8.0627 10.9181 8.34443 11.6311 8.81 12.22C9.6622 13.4958 10.8301 14.5293 12.2 15.22C12.9185 15.6394 13.7535 15.8148 14.58 15.72C14.8552 15.6654 15.1159 15.5535 15.345 15.3915C15.5742 15.2296 15.7667 15.0212 15.91 14.78C16.0428 14.4856 16.0846 14.1583 16.03 13.84C15.94 13.74 15.81 13.69 15.61 13.59Z" fill="white"/>
        </svg>
        <p>Chat on WhatsApp</p>
    </a>
    <!-- <a href="register.php" class="block py-2">Register</a>
    <a href="login.php" class="block py-2">Login</a> -->
  </div>

  <!-- Your content goes here -->

  <script>
    window.addEventListener('scroll', function() {
      var header = document.getElementById('header');
      if (window.scrollY > 0) {
        header.classList.add('bg-[#030828]');
      } else {
        header.classList.remove('bg-[#030828]');
      }
    });
    
    document.addEventListener('DOMContentLoaded', function () {
      // Toggle mobile menu visibility
      document.getElementById('mobile-menu-button').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
      });
    });
  </script>