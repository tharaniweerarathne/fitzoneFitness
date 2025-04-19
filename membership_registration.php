<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Register Form</title>
    <link rel="stylesheet" href="membership_Registration.css">
</head>
<body>

    
     <div class="membership_container">
        <h2>Membership Registration Form</h2>
        <form id="membership_form" action="" method="POST">

        <label>Full name :</label> 
        <input type="text" name="fullname" placeholder="Enter the full name" required> <br>

        <label>E-mail :</label> 
        <input type="text" name="email" placeholder="Enter the E-mail" required> <br>

        <label>Membership Plan:</label>
        <select name="membership_plan" required>
            <option value="membership Plan">Membership Plan</option>
            <option value="Platinum Membership">Platinum Membership</option>
            <option value="Gold Membership">Gold Membership</option>
            <option value="Silver Membership">Silver Membership</option>
        </select>

        <button type="submit" class="submitbtn1">Submit</button><br>

        </form>

    </div>

    <?php
//Handles form submissions for membership registrations.

$conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $membership_plan = $_POST['membership_plan'];

    $sql = "INSERT INTO membership_registration_table (Full_Name, `E-mail`, Membership_plan)
            VALUES ('$name', '$email', '$membership_plan')";

if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>alert('Membership registration successful'); window.location.href='membership_registration.php';</script>";
    exit();
} else {
    echo "<script type='text/javascript'>alert('Sorry, Please try again.'); window.location.href='membership_registration.php';</script>";
}

}

mysqli_close($conn);
?>


</body>
</html>