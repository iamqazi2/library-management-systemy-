<?php
// Initialize variables for form handling
$firstName = $lastName = $contactNo = $email = $username = $password = "";
$errors = [];

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    if (empty($_POST["firstName"])) {
        $errors["firstName"] = "First name is required";
    } else {
        $firstName = htmlspecialchars($_POST["firstName"]);
    }
    
    if (empty($_POST["lastName"])) {
        $errors["lastName"] = "Last name is required";
    } else {
        $lastName = htmlspecialchars($_POST["lastName"]);
    }
    
    if (empty($_POST["contactNo"])) {
        $errors["contactNo"] = "Contact number is required";
    } else {
        $contactNo = htmlspecialchars($_POST["contactNo"]);
    }
    
    if (empty($_POST["email"])) {
        $errors["email"] = "Email is required";
    } else {
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email format";
        }
    }
    
    if (empty($_POST["username"])) {
        $errors["username"] = "Username is required";
    } else {
        $username = htmlspecialchars($_POST["username"]);
    }
    
    if (empty($_POST["password"])) {
        $errors["password"] = "Password is required";
    } else {
        $password = $_POST["password"];
        // Add password strength validation if needed
    }
    
    // If no errors, process form (e.g., save to database)
    if (empty($errors)) {
        // Here you would typically connect to a database and insert the user
        // For demonstration, we'll just show a success message
        $successMessage = "Registration successful!";
        
        // Reset form fields after successful submission
        $firstName = $lastName = $contactNo = $email = $username = $password = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - BookWorm Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .blue-bg {
            background-color: #4475F2;
        }
        .input-field {
            @apply w-full px-4 py-3 border border-gray-300 rounded-full text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400;
        }
        .btn-primary {
            @apply w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-4 rounded-full transition duration-300;
        }
        .error-text {
            @apply text-red-500 text-xs mt-1 ml-4;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col md:flex-row">
    <!-- Right Side - Sign Up Form -->
    <div class="w-full md:w-1/2  p-8 md:p-16 flex-col space-y-4 flex justify-center items-center ">
        <img src="images/image.svg" alt="BookWorm Icon" class="h-[90px] w-[100px] ">
        <div class="flex justify-center items-center ">
            <h1 class="text-[50px]  mr-3">Welcome Back !!</h1>
        </div>
        
        <p class="text-gray-600 ">Please enter your credentials to log in</p>
        
        <?php if(isset($successMessage)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                <span class="block sm:inline"><?php echo $successMessage; ?></span>
            </div>
        <?php endif; ?>
        
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4">
        <div class="grid grid-cols-1 gap-4 ">
    <div>
        <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" 
               class="block w-full max-w-[400px] px-4 py-4 border  border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php if(isset($errors["username"])): ?>
            <p class="error-text"><?php echo $errors["username"]; ?></p>
        <?php endif; ?>
    </div>
    <div>
        <input type="password" name="password" placeholder="Password" 
               class="block w-full max-w-[400px] px-4 py-4 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php if(isset($errors["password"])): ?>
            <p class="error-text"><?php echo $errors["password"]; ?></p>
        <?php endif; ?>
    </div>
</div>
        <div class=" ">
                <button type="submit" class="font-bold bg-[#4475F2] text-white py-3 px-[120px] rounded-full">SIGN IN</button>
            </div>
        </form>
    </div>
     <div class="bg-[#4475F2] w-full md:w-1/2 flex flex-col items-center justify-center text-white p-8 rounded-l-[4rem]">
        <div class="mb-7 mt-[-60px]">
        <img src="images/logo-1.svg" alt="BookWorm Icon" class="h-[270px] w-[270px]">
        </div>
        <!-- Sign In Section -->
        <div class="text-center mt-[-20px]">
            <p class="mb-[50px]">New to our platform? Sign Up now.</p>
            <a href="signup.php" class="inline-block border-2 border-white text-white font-medium py-3 px-[90px] rounded-full hover:bg-white hover:text-blue-500 transition duration-300">SIGN UP</a>
        </div>
    </div>
</body>
</html>