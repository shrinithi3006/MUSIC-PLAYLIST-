<?php
$loginError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("127.0.0.1:3307", "root", "", "music_app");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Only get the hashed password from DB for the given username
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        if (password_verify($password, $hashedPassword)) {
            // Login success
            session_start();
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit();
        } else {
            $loginError = "Invalid username or password!";
        }
    } else {
        $loginError = "Invalid username or password!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - BeatVibe</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-700 via-pink-600 to-yellow-500 text-white min-h-screen flex items-center justify-center font-sans">

  <div class="bg-black/40 backdrop-blur-md p-8 rounded-xl shadow-lg w-full max-w-md">
    <h2 class="text-3xl font-bold text-center mb-6 text-yellow-300">🎵 Welcome to BeatVibe</h2>

    <?php if (!empty($loginError)) echo "<p class='text-red-400 text-sm text-center mb-4'>$loginError</p>"; ?>

    <form method="POST" class="space-y-6">
      <!-- Username Input -->
      <div>
        <label for="username" class="block text-sm mb-1">Username</label>
        <input type="text" id="username" name="username" required
               class="w-full px-4 py-2 rounded bg-white/20 text-white focus:outline-none focus:ring-2 focus:ring-yellow-300"
               minlength="4" pattern="[a-zA-Z0-9]+" title="Only letters and numbers. At least 4 characters." />
      </div>

      <!-- Password Input -->
      <div>
        <label for="password" class="block text-sm mb-1">Password</label>
        <input type="password" id="password" name="password" required
               class="w-full px-4 py-2 rounded bg-white/20 text-white focus:outline-none focus:ring-2 focus:ring-yellow-300"
               minlength="8" title="At least 8 characters, with one letter and one number." />
      </div>

      <!-- Login Button -->
      <button type="submit"
              class="w-full bg-yellow-300 text-black py-2 rounded font-semibold hover:bg-yellow-200 transition">
        Login
      </button>
    </form>

    <p class="text-center text-sm mt-4">Don't have an account? 
      <a href="signup.html" class="text-yellow-300 hover:underline">Create one</a>
    </p>
  </div>

</body>
</html>
