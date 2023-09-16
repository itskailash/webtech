<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <form action="" method="post">
        <h1>Register</h1>

        <p>Username</p>
        <input type="text" name="user">

        <p>Email</p>
        <input type="text" name="email"><br><br>

        <input type="submit" name="submit" value="Register">
    </form>

    <?php
// Initialize variables to store user input
$username = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Username
    if (empty($_POST["user"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST["user"]);
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if the email format is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // If both fields are valid proceed with registration
    if (empty($usernameErr) && empty($emailErr)) {
        echo "<p class='success'>Registration successful!</p>";
    
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


</body>
</html>
