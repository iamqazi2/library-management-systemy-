<?php
include 'db_connection.php'; // Include your DB connection file

$errors = [];
$username = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $errors["username"] = "Username is required";
    } else {
        $username = trim($_POST["username"]);
        
        $conn = get_db_connection();

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            // Redirect if user found
            header("Location: reset-password.php?username=" . urlencode($username));
            exit();
        } else {
            $errors["username"] = "Username not found. Please try again.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - BookWorm Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
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
        <div class="text-center max-w-[256px]">
            <p class="text-[19px]">"Your premier digital library for borrowing and reading books"</p>
        </div>
    </div>
    <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-8 md:p-16 text-center space-y-4">
        <div class="flex flex-col justify-center items-center">
            <img src="images/image.svg" alt="BookWorm Icon" class="h-[90px] w-[100px]">
            <h1 class="text-[32px] sm:text-[40px] md:text-[50px]">Forgot Password</h1>
        </div>
        
        <p class="text-gray-600">Please enter your username.</p>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4 w-full max-w-[400px]">
            <div>
                <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>" class="block w-full max-w-[400px] px-4 py-4 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php if(isset($errors["username"])): ?>
                    <p class="error-text"><?php echo $errors["username"]; ?></p>
                <?php endif; ?>
            </div>
            <div>
                <button type="submit" class="font-bold bg-[#4475F2] text-white py-3 px-[120px] rounded-full">Reset Password</button>
            </div>
        </form>
    </div>
</body>
</html>
