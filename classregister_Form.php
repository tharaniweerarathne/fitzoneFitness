<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Register Form</title>
    <link rel="stylesheet" href="classRegister_form.css">
</head>
<body>

    
     <div class="classregister_container">
        <h2>Class Registration Form</h2>
        <form id="classregister_form" action="" method="POST">

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

        <br>

        <label>Class:</label>
        <select name="class" required>
            <option value="Class Type">Class Type</option>
            <option value="Cardio Training">Cardio Training</option>
            <option value="Strength Training">Strength Training</option>
            <option value="Yoga">Yoga</option>
            <option value="Personal Trainer">Personal Trainer</option>

        </select>

        <br>

        <label>Date:</label>
        <input type="date" name="classdate"><br>

        <label>Select a time:</label>
        <input type="time" name="time">

        <button type="submit" class="submitbtn1">Submit</button><br>

        </form>

    </div>

    <?php

//Handles form submissions for class registrations.
$conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $membership_plan = $_POST['membership_plan'];
    $class = $_POST['class'];
    $classdate = $_POST['classdate'];
    $time = $_POST['time'];

    $sql = "INSERT INTO class_register_table (Full_Name, `E-mail`, Membership_plan, Class, Date , Time)
                VALUES ('$name', '$email', '$membership_plan', '$class', '$classdate', '$time')";

if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>alert('Class registration successful'); window.location.href='classregister_Form.php';</script>";
    exit();
} else {
    echo "<script type='text/javascript'>alert('Sorry, Please try again.'); window.location.href='classregister_Form.php';</script>";
}

}

mysqli_close($conn);
?>


</body>
</html>