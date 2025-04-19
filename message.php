<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="message.css">
</head>
<body>

    
     <div class="message_container">
        <h2>SEND US A MESSAGE</h2>
        <form id="message-form" action="" method="POST">
        <label>Full name :</label> <br>
        
        <input type="text" name="fullname" placeholder="Enter the full name" > <br>

        <label>E-mail :</label> <br>
        <input type="text" name="email" placeholder="Enter the E-mail"> <br>

        <label>Message:</label> <br>
        <textarea cols="100" rows="8" name="message" placeholder="Enter the message" value="message" required></textarea><br>

        <button type="submit" class="submitbtn1">Submit</button><br>

        </form>

    </div>

    <?php

//Handles form submissions for customer inquiries.
$conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact_us_table (Full_Name, `E-mail`, Message)
            VALUES ('$name', '$email', '$message')";

if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>alert('Thank you for contacting us.'); window.location.href='message.php';</script>";
    exit();
} else {
    echo "<script type='text/javascript'>alert('Sorry, Please try again.'); window.location.href='message.php';</script>";
}

}

mysqli_close($conn);
?>

</body>
</html>