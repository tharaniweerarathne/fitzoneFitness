<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback / inquiries respond</title>
    <link rel="stylesheet" href="membership_Registration.css">
</head>


<body>

    
     <div class="membership_container">
        <form id="_form" action="" method="POST">

        <label>E-mail :</label> 
        <input type="text" name="email" placeholder="Enter the customer email" required> <br>

        <label>Enter the Customer Message:</label> <br>
        <textarea cols="100" rows="8" name="customer_message" placeholder="Enter the customer message" value="message" required></textarea><br>

        <label>Reply Message:</label> <br>
        <textarea cols="100" rows="8" name="reply_message" placeholder="Enter your reply message" value="message" required></textarea><br>


        <button type="submit" class="submitbtn1">Submit</button><br>

        </form>

    </div>

    <?php
    //Handles form submissions for customer feedback and reply messages.

$conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $customer_feedback = $_POST['customer_message'];
    $reply_message = $_POST['reply_message'];

    $sql = "INSERT INTO reply_message_table (`E-mail`, customer_feedback, reply_message)
    VALUES ('$email', '$customer_feedback', '$reply_message')";

if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>alert('Reply message sent successfully!'); window.location.href='feedback_inquiries_respond.php';</script>";
    exit();
} else {
    echo "<script type='text/javascript'>alert('Sorry, Please try again.'); window.location.href='feedback_inquiries_respond.php';</script>";
}

}

mysqli_close($conn);
?>


</body>
</html>