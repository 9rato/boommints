<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        // Database connection settings
        include('../db/config.php');

        // Function to sanitize input
        function sanitize_input($input) {
            return htmlspecialchars(trim($input));
        }

        // Retrieve form data
        $email = sanitize_input($_POST['email']);
        $password = $_POST['password'];

        // Prepare and execute SQL statement
        $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['user_id'] = $row['user_id'];
                header("Location: ../users/dashboard.php");
                exit();
            } else {
                echo "<script>alert('Invalid email or password.');</script>";
            }
        } else {
            echo "<script>alert('Invalid email or password.');</script>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/image/icons/2.svg" type="image/x-icon">
</head>
<body class="">

<div class="flex w-[100vw] h-[100vh]  lg:h-[130vh]  overflow-y-scroll overflow-x-hidden scrollbar-hide justify-between">
    <div class="lg:hidden">

    </div>
    <div class=" hidden lg:block h-[100%] min-w-[40%]" style="min-width:40%;background:url(../assets/image/items-one/Artboard6.png);background-position:center center;background-size:cover;background-repeat:no-repeat">
</div>
<div class="w-full">
    <div class="lg:hidden flex justify-center bg-white p-5 mb-6">
        <img alt="" loading="lazy" width="100.55" height="25.69" decoding="async" data-nimg="1" style="color:transparent" src="../assets/image/icons/BOOMMINT.svg">
    </div>
    <div class="h-[100vh] w-[100%] grid place-items-center ">
    <div class="h-[100%] w-[100%] lg:w-[90%] flex lg:items-center justify-center">
        <div class="w-full px-4 lg:px-0 lg:w-[60%]">
            <div class="flex gap-x-4 cursor-pointer">
                <a href="index.php">
                    <img alt="" loading="lazy" width="57" height="27" decoding="async" data-nimg="1"
                         style="color:transparent" src="../assets/image/icons/back-mp3-music-svgrepo-com.svg">
                </a>
                <p class="text-[24px] md:text-start text-center md:w-[100%] w-[50%] font-bold leading-[32px] ">Login</p>
            </div>
            <form action="" method="post">
                <div class="mt-6 bg-white rounded-[18px] px-4 lg:px-[46px] py-[24.5px]">
                    <div class="w-full flex flex-col gap-y-3">
                        <div class="w-full lg:w-[100%]">
                            <div class="flex justify-between my-2">
                                <p class="text-[14px] font-medium text-black">Email Address</p>
                            </div>
                            <div class="w-full h-[53px] relative border-[1px] rounded-[12px] p-2.5 shadow-[rgba(0,0,0,0.17)] flex justify-between items-center">
                                <img alt="" loading="lazy" width="20" height="20" decoding="async" data-nimg="1"
                                     style="color:transparent" src="../assets/image/icons/email-svgrepo-com.svg">
                                <input type="text" style="width:100%" class="undefined  h-[40px] ml-2.5 border-none outline-none placeholder:text-[#00000047] placeholder:font-medium placeholder:text-[12px]" placeholder="Enter your email address" name="email">
                            </div>
                        </div>
                        <div class="w-full lg:w-[100%]">
                            <div class="flex justify-between my-2">
                                <p class="text-[14px] font-medium text-black">Password</p>
                            </div>
                            <div class="w-full h-[53px] relative border-[1px] rounded-[12px] p-2.5 shadow-[rgba(0,0,0,0.17)] flex justify-between items-center">
                                <img alt="" loading="lazy" width="20" height="20" decoding="async" data-nimg="1"
                                     style="color:transparent" src="../assets/image/icons/padlock-outlined-svgrepo-com.svg">
                                <input type="password" style="width:80%" class="undefined  h-[40px] ml-2.5 border-none outline-none placeholder:text-[#00000047] placeholder:font-medium placeholder:text-[12px]" placeholder="Enter your password" name="password">
                                <img alt="" loading="lazy" width="20" height="20" decoding="async" data-nimg="1"
                                     style="color:transparent" src="../assets/image/icons/eye-off-svgrepo-com.svg">
                            </div>
                        </div>
                        <div class="flex justify-end md:my-4 my-2 text-bluetext font-bold md:text-[14px] text-[12px]">
                            <a href="resetpassword.php">Forgot Password?</a>
                        </div>
                        <button type="submit" name="login" class="flex items-center justify-center gap-1 p-2 font-[500] text-center text-[13px] rounded-lg bg-black text-white font-black h-[50px] leading-[120%] tracking-[0.28px] text-[14px] p-2.5">Continue</button>
                    </div>
                </div>
            </form>
            <p class="text-[14px] mt-6 leading-[15px] text-center">Don't have an account?
                <a class="text-bluetext font-bold leading-[15px]" href="register.php">Sign Up</a></p>
        </div>
    </div>
</div>
    </div>
</div>
</div>

</body>
</html>