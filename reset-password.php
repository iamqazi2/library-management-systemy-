<?php
include 'db_connection.php'; // DB connection file

$errors = [];
$successMessage = "";
$username = isset($_GET['username']) ? trim($_GET['username']) : "";

if (empty($username)) {
    die("Invalid request. Username not specified.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = trim($_POST["new-password"]);
    $confirmPassword = trim($_POST["confirm-password"]);

    if (empty($newPassword)) {
        $errors["new-password"] = "New password is required";
    }

    if (empty($confirmPassword)) {
        $errors["confirm-password"] = "Please confirm your password";
    } elseif ($newPassword !== $confirmPassword) {
        $errors["confirm-password"] = "Passwords do not match";
    }

    if (empty($errors)) {
        try {
            $conn = get_db_connection();

            // ✅ Hash the password before saving
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
            $stmt->bind_param("ss", $hashedPassword, $username);

            if ($stmt->execute()) {
                $successMessage = "Password successfully updated!";
                header("Location: signin.php");
                exit;
            } else {
                $errors["database"] = "Failed to update password. Please try again.";
            }

            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            $errors["database"] = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Reset Password - BookWorm Library</title>
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
    <div class="text-center">
      <p class="text-[19px]">"Your premier digital library<br> for borrowing and reading<br> books"</p>
    </div>
  </div>

  <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-8 md:p-16 text-center space-y-4">
    <div class="flex flex-col justify-center items-center">
      <img src="images/image.svg" alt="BookWorm Icon" class="h-[90px] w-[100px]">
      <h1 class="text-[32px] sm:text-[40px] md:text-[50px]">Reset Password</h1>
    </div>

    <p class="text-gray-600">Set a new password for <strong><?php echo htmlspecialchars($username); ?></strong></p>

    <?php if (!empty($successMessage)): ?>
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
        <span class="block sm:inline"><?php echo $successMessage; ?></span>
      </div>
    <?php endif; ?>

    <?php if (isset($errors["database"])): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
        <span class="block sm:inline"><?php echo $errors["database"]; ?></span>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?username=" . urlencode($username)); ?>" class="space-y-4 w-full max-w-[400px]">
      <div>
        <input type="password" name="new-password" placeholder="New Password"
               class="block w-full max-w-[400px] px-4 py-4 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php if (isset($errors["new-password"])): ?>
          <p class="error-text"><?php echo $errors["new-password"]; ?></p>
        <?php endif; ?>
      </div>

      <div>
        <input type="password" name="confirm-password" placeholder="Confirm Password"
               class="block w-full max-w-[400px] px-4 py-4 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php if (isset($errors["confirm-password"])): ?>
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
