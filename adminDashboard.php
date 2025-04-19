<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Portal</title>
    <link rel="stylesheet" href="dashboardpageCss.css">
</head>

<script>
    function logoutMessage() {
        alert("Logout was successful."); 
        document.location = 'main.html'; 
    }
    </script>    

<body>
    <header>
        <div class="navigationBar">
            <span class="textSpan">FitZone Fitness Center</span>
            <a href="#home">Home</a>
            <a href="#user_registrations">User Registrations</a>
            <a href="#class_registration">Class Registrations</a>
            <a href="#membership_registration">Membership Registrations</a>
            <a href="#customer_feedback">Customer Feedback</a>
            <a href="#customer_inquiries">Customer Inquiries</a>
            <button class="button" onclick="logoutMessage()">Log Out</button>

            
        </div>
    </header>

    <section class="background_container" id="home">
        <div class="background_text">
            <h1>Welcome to </h1>
            <h1>FitZone Fitness </h1>
            <h1>Admin Dashboard</h1>
        </div>
    </section>

<?php
//Display a customized welcome message to a staff who has logged in.
session_start(); 

if (isset($_SESSION['name']) && $_SESSION['role'] == 'Admin') {
    echo "<h1> Welcome Back, Admin " . $_SESSION['name'] . "!</h1>";

} else {
    header("Location: loginForm.php"); 
    exit();
}
?>

<section class="table1" id="user_registrations">

<h1>User Registrations.</h1>
<table> 
    <thead> 
        <tr> 
            <th>User ID</th> 
            <th>Name</th> 
            <th>E-mail</th>
            <th>User Role</th> 
        </tr> 
    </thead> 
    <tbody> 
        <?php
        // Displays the customer user registration details
        $conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "SELECT user_id,Name, `E-mail`, User_role FROM usertable";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['E-mail'] . "</td>";
                echo "<td>" . $row['User_role'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }

        mysqli_close($conn);
        ?>
    </tbody> 
</table> 
</section>


<section class="table1" id="class_registration">

<h1>Class Registrations.</h1>
<table> 
    <thead> 
        <tr> 
            <th>Full Name</th> 
            <th>Class Registration ID</th> 
            <th>E-mail</th>
            <th>Membership Plan</th> 
            <th>Class</th> 
            <th>Date</th>
            <th>Time</th>
        </tr> 
    </thead> 
    <tbody> 
        <?php
        // Displays the customer class registration details
        $conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "SELECT Full_Name,Class_register_id, `E-mail`, Membership_plan, Class, Date, Time FROM class_register_table";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['Full_Name'] . "</td>";
                echo "<td>" . $row['Class_register_id'] . "</td>";
                echo "<td>" . $row['E-mail'] . "</td>";
                echo "<td>" . $row['Membership_plan'] . "</td>";
                echo "<td>" . $row['Class'] . "</td>";
                echo "<td>" . $row['Date'] . "</td>";
                echo "<td>" . $row['Time'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }

        mysqli_close($conn);
        ?>
    </tbody> 
</table> 
</section>



<section class="table1" id="membership_registration">

<h1>Membership Registrations.</h1>
<table> 
    <thead> 
        <tr> 
            <th>Full Name</th> 
            <th>Membership ID</th> 
            <th>E-mail</th> 
            <th>Membership_plan</th> 
        </tr> 
    </thead> 
    <tbody> 
        <?php
        // Displays the membership registration details
        $conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "SELECT Full_Name,Membership_id, `E-mail`,Membership_plan FROM membership_registration_table";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['Full_Name'] . "</td>";
                echo "<td>" . $row['Membership_id'] . "</td>";
                echo "<td>" . $row['E-mail'] . "</td>";
                echo "<td>" . $row['Membership_plan'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }

        mysqli_close($conn);
        ?>
    </tbody> 
</table> 
</section>



<section class="table1" id="customer_feedback">

<h1>Customer Feedbacks.</h1>
<table> 
<thead> 
    <tr> 
        <th>Full Name</th> 
        <th>Feedback ID</th> 
        <th>E-mail</th> 
        <th>Phone_number</th> 
        <th>Message</th> 
        <th>Send Reply message</th>
    </tr> 
</thead> 
<tbody> 
    <?php
    // Displays the customer feedback details
    $conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql = "SELECT Full_Name,feedback_id, `E-mail`,Phone_number, Message FROM feedback_form_table";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Full_Name'] . "</td>";
            echo "<td>" . $row['feedback_id'] . "</td>";
            echo "<td>" . $row['E-mail'] . "</td>";
            echo "<td>" . $row['Phone_number'] . "</td>";
            echo "<td>" . $row['Message'] . "</td>";
            echo '<td><button class="registerBtn" onclick="document.location=\'feedback_inquiries_respond.php\'">Send Message</button></td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No records found</td></tr>";
    }

    mysqli_close($conn);
    ?>
</tbody> 
</table> 
</section>



<section class="table1" id="customer_inquiries">

<h1>Customer Inquiries.</h1>
<table> 
    <thead> 
        <tr> 
            <th>Full Name</th> 
            <th>Contact ID</th> 
            <th>E-mail</th>  
            <th>Message</th> 
            <th>Send Reply message</th>
        </tr> 
    </thead> 
    <tbody> 
        <?php
        // Displays the customer inquiry details
        $conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "SELECT Full_Name,Contact_id, `E-mail`, Message FROM contact_us_table";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['Full_Name'] . "</td>";
                echo "<td>" . $row['Contact_id'] . "</td>";   
                echo "<td>" . $row['E-mail'] . "</td>";
                echo "<td>" . $row['Message'] . "</td>";
                echo '<td><button class="registerBtn" onclick="document.location=\'feedback_inquiries_respond.php\'">Send Message</button></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }

        mysqli_close($conn);
        ?>
    </tbody> 
</table> 
</section>




</body>
</html>