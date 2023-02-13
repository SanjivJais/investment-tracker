<?php
include('..\connection.php');


$value = $_GET['value'];

if ($value == "signup") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass1'];

    $query = "INSERT INTO users (name, email, pass) VALUES ('$name', '$email', '$pass')";
    if (mysqli_query($conn, $query)) {
        // echo "Signup successfully.";
        header('Location: ..\login.php');
    } else {
        echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
    }

} elseif ($value == "login") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    if ($pass == $user["pass"]) {
        // The login is successful
        // Set the session variables
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];

        // Redirect to the home page
        header("Location: ..\index.php");
    } else {

        // The password is incorrect
        // Display an error message
        echo "Invalid username or password";
    }
}

elseif($value == "logout")
{
    session_start();
    session_destroy();
    header('Location: ..\login.php');
}


?>