<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="feedbackform.css">
</head>

<body>

    
     <div class="feedbackform_container">
        <h2>FEEDBACK</h2>
        <form id="feedback_form" action="" method="POST">
        <label>Full name :</label> <br>
        <input type="text" name="fullname" placeholder="Enter the full name" > <br>

        <label>E-mail :</label> <br>
        <input type="text" name="email" placeholder="Enter the E-mail"> <br>

        <label>Phone number:</label> <br>
        <input type="tel" name="phonenumber" placeholder="Enter the Phone Number"> <br>

        <label>Message:</label> <br>
        <textarea cols="100" rows="3" name="message" placeholder="Enter the message" value="message" required></textarea><br>

        <button type="submit" class="submitbtn1">Submit</button><br>

        </form>

    </div>

    <?php

//Handles form submissions for customer feedbacks.
$conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $message = $_POST['message'];

    $sql = "INSERT INTO feedback_form_table (Full_Name, `E-mail`,Phone_number, Message)
            VALUES ('$name', '$email','$phonenumber','$message')";

if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>alert('Thank you for your feedback.'); window.location.href='feedbackForm.php';</script>";
    exit();
} else {
    echo "<script type='text/javascript'>alert('Sorry, Please try again.'); window.location.href='feedbackForm.php';</script>";
}

}

mysqli_close($conn);
?>



</body>
</html>