<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>

<body>
    <div class="Register">
        <form action="" method="post">
            <h1>Register</h1>

            <p>Username</p>
            <input type="text" name="user">
            <p>Email</p>
            <input type="text" name="email"><br><br>
            <input type="submit" name="submit" value="Register">
        </form>
    </div>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "users");

    if (isset($_POST['submit'])) {
        $uname = $_POST['user'];
        $email = $_POST['email'];

        $query = "INSERT INTO register (Username, Email) VALUES ('$uname', '$email')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script> alert('User Updated Successfully');</script>";
            header('location: login.php');
        }
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $newUsername = $_POST['newUsername'];
        $newEmail = $_POST['newEmail'];

        $update_query = "UPDATE register SET Username = '$newUsername', Email = '$newEmail' WHERE Id = $id";
        $update_result = mysqli_query($conn, $update_query);
        if ($update_result) {
            echo "<script> alert('User Updated Successfully');</script>";
        } else {
            echo "<script> alert('User Update Failed');</script>";
        }
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        $delete_query = "DELETE FROM register WHERE Id = $id";
        $delete_result = mysqli_query($conn, $delete_query);
        if ($delete_result) {
            echo "<script> alert('User Deleted Successfully');</script>";
        } else {
            echo "<script> alert('User Deletion Failed');</script>";
        }
    }

    $select_query = "SELECT * FROM register";

    $select_result = mysqli_query($conn, $select_query);

    if (!$select_result) {
        die("Query failed: " . mysqli_error($conn));
    }

    echo "<h1>User Data</h1>";
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Action</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($select_result)) {
        echo "<tr>";
        echo "<td>" . $row['Id'] . "</td>";
        echo "<td>" . $row['Username'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>
            <form method='post'>
                <input type='hidden' name='id' value='" . $row['Id'] . "'>
                <input type='text' name='newUsername' placeholder='New Username'>
                <input type='text' name='newEmail' placeholder='New Email'>
                <input type='submit' name='update' value='Update'>
                <input type='submit' name='delete' value='Delete'>
            </form>
        </td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</body>
</html>
