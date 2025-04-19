<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up form</title>
    <link rel="stylesheet" href="registersignUp.css">

</head>
<body>
    

<div class="register_container">

        <h2>SIGN UP</h2>

        <div class="createAccount_container">
        <h3>Create a new account</h3>
        </div> 

        <form id="signup-form" action="" method="POST">

        <label>Name :</label> <br>
        <input type="text" name="name" placeholder="Enter your full name" required> <br>

        <label>E-mail :</label> <br>
        <input type="text" name="email" placeholder="Enter your E-mail" required > <br>

        <label>Username :</label> <br>
        <input type="text" name="username" placeholder="Enter the username" required > <br>

        <label>Password :</label> <br>
        <input type="password" name="password" placeholder="Enter the password" required> <br>


        <br>

        <button type="submit" class="submitbtn1">SIGN UP</button><br>

        <h3>Already have an account?<h3>
        <a class="registerlink" href="loginForm.php">SIGN IN Now</a>

        </form>



    </div>


    <?php
//Handles form submissions for signup registrations.
$conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usertable (Name, `E-mail`, Username, Password, User_role)
            VALUES ('$name', '$email', '$username', '$password', 'Customer')";

if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>alert('You are registered successfully!'); window.location.href='loginForm.php';</script>";
    exit();
} else {
    echo "<script type='text/javascript'>alert('Sorry, Please try again.'); window.location.href='loginForm.php';</script>";
}

}

mysqli_close($conn);
?>





</body>
</html>