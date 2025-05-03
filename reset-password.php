<?php
// Initialize variables for form handling
$firstName = $lastName = $contactNo = $email = $username = $password = "";
$errors = [];

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    if (empty($_POST["password"])) {
        $errors["password"] = "Password is required";
    } else {
        $password = $_POST["password"];
        // Add password strength validation if needed
    }
    
    // If no errors, process form (e.g., save to database)
    if (empty($errors)) {
        // Here you would typically connect to a database and process the password reset
        $successMessage = "Password reset request successful!";
        
        // Reset form fields after successful submission
        $password = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - BookWorm Library</title>
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
    <div class="bg-[#4475F2] hidden md:flex w-full md:w-1/2 flex flex-col items-center justify-center text-white p-8 rounded-r-[4rem]">
        <div class="mb-7 mt-[-60px]">
            <img src="images/logo-1.svg" alt="BookWorm Icon" class="h-[270px] w-[270px]">
        </div>
        <div class="text-center">
            <p class="text-[19px]">"Your premier digital library<br> for borrowing and reading<br> books"</p>
        </div>
    </div>
    <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-8 md:p-16  text-center space-y-4">
        <div class="flex flex-col justify-center items-center">
            <img src="images/image.svg" alt="BookWorm Icon" class="h-[90px] w-[100px]">
            <h1 class="text-[32px] sm:text-[40px] md:text-[50px]">Forgot Password</h1>
        </div>
        
        <p class="text-gray-600">Please enter your username.</p>
        
        <?php if(isset($successMessage)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                <span class="block sm:inline"><?php echo $successMessage; ?></span>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4 w-full max-w-[400px]">
             <div>
        <input type="password" name="new-password" placeholder="New Password" 
               class="block w-full max-w-[400px] px-4 py-4 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php if(isset($errors["new-password"])): ?>
            <p class="error-text"><?php echo $errors["new-password"]; ?></p>
        <?php endif; ?>
    </div> <div>
        <input type="password" name="confirm-password" placeholder="Confirm Password" 
               class="block w-full max-w-[400px] px-4 py-4 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php if(isset($errors["confirm-password"])): ?>
            <p class="error-text"><?php echo $errors["confirm-password"]; ?></p>
        <?php endif; ?>
    </div>
            <div>
                <button type="submit" class="font-bold bg-[#4475F2] text-white py-3 px-[120px] rounded-full">Reset Password</button>
            </div>
        </form>
    </div>
</body>
</html>