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
    <title>Sign Up - BookWorm Library</title>
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
        <!-- Sign In Section -->
        <div class="text-center mt-[-20px]">
            <p class="mb-[50px]">Already have Account? Sign In now.</p>
            <a href="signin.php" class="inline-block border-2 border-white text-white font-medium py-3 px-[90px] rounded-full hover:bg-white hover:text-blue-500 transition duration-300">SIGN IN</a>
        </div>
    </div>
    
    <!-- Right Side - Sign Up Form -->
    <div class="w-full md:w-1/2 flex-col space-y-4 flex justify-center items-center  p-8 md:p-16 mt-[80px]">
        <div class=" justify-center items-center">
             <img src="images/image.svg" alt="BookWorm Icon" class="h-[90px] w-[100px]">
            <h1 class="text-[32px] sm:text-[40px] md:text-[50px]">Sign Up</h1>
        </div>
        
        <p class="text-gray-600">Please provide your information to sign up.</p>
        
        <?php if(isset($successMessage)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                <span class="block sm:inline"><?php echo $successMessage; ?></span>
            </div>
        <?php endif; ?>
        
        <!-- Sign Up Form -->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4">
           <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <input type="text" name="firstName" placeholder="First Name" value="<?php echo $firstName; ?>" 
               class="block w-full px-4 py-4 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php if(isset($errors["firstName"])): ?>
            <p class="error-text"><?php echo $errors["firstName"]; ?></p>
        <?php endif; ?>
    </div>
    <div>
        <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $lastName; ?>" 
               class="block w-full px-4 py-4 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php if(isset($errors["lastName"])): ?>
            <p class="error-text"><?php echo $errors["lastName"]; ?></p>
        <?php endif; ?>
    </div>
</div>

<!-- Second Row - Contact No & Email -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex justify-center items-center">
    <div>
        <input type="tel" name="contactNo" placeholder="Contact No" value="<?php echo $contactNo; ?>" 
               class="block w-full px-4 py-4 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php if(isset($errors["contactNo"])): ?>
            <p class="error-text"><?php echo $errors["contactNo"]; ?></p>
        <?php endif; ?>
    </div>
    <div>
        <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" 
               class="block w-full px-4 py-4 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php if(isset($errors["email"])): ?>
            <p class="error-text"><?php echo $errors["email"]; ?></p>
        <?php endif; ?>
    </div>
</div>

<!-- Third Row - Username & Password -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" 
               class="block w-full px-4 py-4 border  border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php if(isset($errors["username"])): ?>
            <p class="error-text"><?php echo $errors["username"]; ?></p>
        <?php endif; ?>
    </div>
    <div>
        <input type="password" name="password" placeholder="Password" 
               class="block w-full px-4 py-4 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php if(isset($errors["password"])): ?>
            <p class="error-text"><?php echo $errors["password"]; ?></p>
        <?php endif; ?>
    </div>
</div>
            <!-- Sign Up Button -->
             <div >
                <button type="submit" class="font-bold bg-[#4475F2]  text-white py-3 px-[120px] mt-8  rounded-full">SIGN UP</button>
            </div>
            </div>
        </form>
    </div>
</body>
</html>