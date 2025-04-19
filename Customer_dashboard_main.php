<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone Fitness Center</title>
    <link rel="stylesheet" href="customer_dashboardcss.css">
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
            <a href="Customer_dashboard_main.php">Home</a>
            <a href="blog_customer.html">Blog</a>
            <a href="classes_customer.html">Join Classes</a>
            <a href="membership_customer.html">Join Membership</a>
            <a href="feedbackForm.php">Your Feedback</a>
            <a href="#contactus">Contact Us</a>
            <button class="button" onclick="logoutMessage()">Log Out</button>

            
        </div>
    </header>

    <section class="main1">
        
        
        <div class="background-image">
            <br><br>
            <h2>Welcome to the FitZone Fitness</h2>
            <h2>Center!</h2>
                <h2>Customer Dashboard!</h2><br><br>


<?php
//Display a customized welcome message to a customer who has logged in.

session_start();

if (isset($_SESSION['name']) && $_SESSION['role'] == 'Customer') {
    echo "<h1> Welcome Customer, " . $_SESSION['name'] . "!</h1>";
} else {
    header("Location: loginForm.php"); 
    exit();
}
?>


        <div class="link-container">
            <a href="#class_registration">My class schedules</a><br>
            <a href="#membership_registration">Membership Registrations</a><br>
            <a href="#messages">Messages from the Feedback and Inquiries</a><br><br><br>
        </div>

   </div>
        
    </section>


<section class="table1" id="class_registration">

<h1>My class schedules.</h1>
<table> 
    <thead> 
        <tr> 
            <th>Name</th>
            <th>Class Register ID</th> 
            <th>Class</th> 
            <th>Membership Plan</th> 
            <th>Date</th>
            <th>Time</th>
        </tr> 
    </thead> 
    <tbody> 
        <?php

        //To display registerd class details

        $conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
  
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        
   
        $sql = "SELECT * FROM class_register_table WHERE `E-mail` = '$email'";
        $result = $conn->query($sql);

        if ($result && mysqli_num_rows($result) > 0) {
 
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['Full_Name'] . "</td>";
                echo "<td>" . $row['Class_register_id'] . "</td>";
                echo "<td>" . $row['Class'] . "</td>";
                echo "<td>" . $row['Membership_plan'] . "</td>";
                echo "<td>" . $row['Date'] . "</td>";
                echo "<td>" . $row['Time'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
    }

        mysqli_close($conn);
        ?>
    </tbody> 
</table> 
</section>

<section class="table1" id="membership_registration">

<h1>Membership Registrations</h1>
<table> 
    <thead> 
        <tr> 
            <th>Name</th>
            <th>Membership ID</th>  
            <th>Membership Plan</th> 
        </tr> 
    </thead> 
    <tbody> 
        <?php
        //To display membership registration details

        $conn = mysqli_connect("localhost", "root", "", "fitzonefitness");


        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        
        $sql = "SELECT * FROM membership_registration_table WHERE `E-mail` = '$email'";
        $result = $conn->query($sql);

        if ($result && mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['Full_Name'] . "</td>";
                echo "<td>" . $row['Membership_id'] . "</td>";
                echo "<td>" . $row['Membership_plan'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No records found</td></tr>";
        }
    }

        mysqli_close($conn);
        ?>
    </tbody> 
</table> 
</section>


<section class="table1" id="messages">

<h1>Messages from the Feedback and Inquiries.</h1>
<table> 
    <thead> 
        <tr> 
            <th>Your feedback / Message</th>
            <th>Message</th> 
        </tr> 
    </thead> 
    <tbody> 
        
        <?php
        //To display customer feedback along with admin replies
        $conn = mysqli_connect("localhost", "root", "", "fitzonefitness");

        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        
        $sql = "SELECT * FROM reply_message_table WHERE `E-mail` = '$email'";
        $result = $conn->query($sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['customer_feedback'] . "</td>";
                echo "<td>" . $row['reply_message'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No records found</td></tr>";
        }
    }

        mysqli_close($conn);
        ?>
    </tbody> 
</table> 
</section>






    <footer id="contactus">
    <div class="footer_line">

    </div>

    <div class="footer">

        <div class="footer-details">
            <h2>FitZone Fitness Center</h2>
            <p>FitZone Fitness Center offers a wide range of dynamic workout programs,
             a modern, motivating environment, and top-notch support to help you achieve your fitness goals. Join us today!</p>
        </div>

        <div class="footerContact">
            <p><i class="footer_address"></i><img src="locationicon.jpg" alt="location1"> Main Street Road, Kurunegala</p>
            <p><i class="footer_email"></i><img src="emailicon.jpg" alt="email1"> fitzone@gmail.com</p>
            <p><i class="footer_phone"></i><img src="phoneicon.jpg" alt="phone"> +94 778 345 236</p>

            <div class="socialmedia">
                <a href="#"><img src="twittericon.png" alt="Twitter"></a>
                <a href="#"><img src="instragramicon.jpg" alt="Instragram"></a>
                <a href="#"><img src="facebookicon.webp" alt="Facebook"></a>

            </div>

            <div class="feedbackformBtn">
            <button onclick="document.location='message.php'">Need Help ?</button>
        </div>

        </div>
    </div>

    <div class="footer_Bottom">
    <p>&copy; FitZone Fitness Center. All rights reserved.</p>
    </div>
    </footer>

</body>
</html>