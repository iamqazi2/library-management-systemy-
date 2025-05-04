<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db_connection.php';

$email = $password = "";
$errors = [];
$successMessage = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    if (empty($_POST["email"])) {
        $errors["email"] = "Email is required";
    } else {
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email format";
        }
    }

    // Validate password
    if (empty($_POST["password"])) {
        $errors["password"] = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    // If no errors, proceed to check credentials
    if (empty($errors)) {
        try {
            $conn = get_db_connection();
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            
            if (!$stmt) {
                $errors["general"] = "Database error: " . $conn->error;
            } else {
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result && $result->num_rows === 1) {
                    $user = $result->fetch_assoc();

                    // Check password against hash
                    if (password_verify($password, $user['password'])) {
                        // Login successful
                        $_SESSION["user_id"] = $user["user_id"];
                        $_SESSION["username"] = $user["username"];
                        $_SESSION["email"] = $user["email"];

                        // Redirect based on role
                        if (strpos($email, 'admin@') === 0) {
                            header("Location: dashboard.php"); // Admin
                        } elseif (strpos($email, 'moderator@gmail') !== false) {
                            header("Location: moderator.php"); // Moderator
                        } else {
                            header("Location: user.php"); // Regular user
                        }
                        exit();
                    } else {
                        $errors["password"] = "Incorrect password";
                    }
                } else {
                    $errors["email"] = "Email not found";
                }

                $stmt->close();
            }

            $conn->close();
        } catch (Exception $e) {
            $errors["general"] = "An error occurred: " . $e->getMessage();
        }
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
        .error-text {
            color: #e53e3e;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            margin-left: 1rem;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col md:flex-row">
    <!-- Right Side - Sign In Form -->
    <div class="w-full md:w-1/2 p-8 md:p-16 flex-col space-y-4 flex justify-center items-center">
        <img src="images/image.svg" alt="BookWorm Icon" class="h-[90px] w-[100px]">
        <h1 class="text-[50px]">Welcome Back !!</h1>
        <p class="text-gray-600">Please enter your credentials to log in</p>

        <?php if(!empty($successMessage)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <?php if(isset($errors["general"])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <?php echo $errors["general"]; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4">
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <input type="text" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" 
                        class="block w-full max-w-[400px] px-4 py-4 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php if(isset($errors["email"])): ?>
                        <p class="error-text"><?php echo $errors["email"]; ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password"
                        class="block w-full max-w-[400px] px-4 py-4 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php if(isset($errors["password"])): ?>
                        <p class="error-text"><?php echo $errors["password"]; ?></p>
                    <?php endif; ?>
                </div>
                <a href="forgot-password.php">Forgot password?</a>
            </div>
            <div>
                <button type="submit" class="font-bold bg-[#4475F2] text-white py-3 px-[120px] rounded-full">SIGN IN</button>
            </div>
        </form>
    </div>

    <!-- Left Side - Welcome Section -->
    <div class="bg-[#4475F2] w-full md:w-1/2 flex flex-col items-center justify-center text-white p-8 rounded-l-[4rem]">
        <div class="mb-7 mt-[-60px]">
            <img src="images/logo-1.svg" alt="BookWorm Icon" class="h-[270px] w-[270px]">
        </div>
        <div class="text-center mt-[-20px]">
            <p class="mb-[50px]">New to our platform? Sign Up now.</p>
            <a href="signup.php" class="inline-block border-2 border-white text-white font-medium py-3 px-[90px] rounded-full hover:bg-white hover:text-blue-500 transition duration-300">SIGN UP</a>
        </div>
    </div>
</body>
</html>
