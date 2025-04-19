<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="loginformcss.css">
</head>
<body>

<div class="login_container">

        <h2>SIGN IN</h2>

        <form id="login-form" action="" method="POST">

        <label>Username :</label> <br>
        <input type="text" name="username" placeholder="Enter the username" required > <br>

        <label>Password :</label> <br>
        <input type="password" name="password" placeholder="Enter the password" required> <br>

        <button type="submit" class="submitbtn1">SIGN IN</button><br>

        <h3>Don't have an account?<h3>
        <a class="registerlink" href="registerSignup.php">SIGN UP Now</a>

        </form>



    </div>


    <?php
//Handles customer, admin, and staff logins.
session_start();

$conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT Name, User_role, `E-mail` FROM usertable WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['name'] = $user['Name'];
        $_SESSION['role'] = $user['User_role'];
        $_SESSION['email'] = $user['E-mail'];

        if ($user['User_role'] == 'Customer') {
            header("Location: Customer_dashboard_main.php");
        } elseif ($user['User_role'] == 'Admin') {
            header("Location: adminDashboard.php");
        } elseif ($user['User_role'] == 'Staff') {
            header("Location: staffportal.php");
        }
        exit(); 
    } else {
        echo "<h3 class='error-message'>Invalid username or password.</h3>";
    }
}

mysqli_close($conn);
?>



</body>
</html>