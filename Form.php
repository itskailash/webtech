
<html>
<head>
    <title>Simple Form</title>
</head>
<body>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <input type="submit" value="Submit">
    </form>
    <h4>Form Submission Result</h4>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];

        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
    } else {
        echo "<p>No form data submitted.</p>";
    }
    ?>
</body>
</html>
