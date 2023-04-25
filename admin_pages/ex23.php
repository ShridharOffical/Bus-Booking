<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
</head>
<body>
    <?php
    // Get session variables for email and OTP
    session_start();
    $email = $_SESSION["email"];
    $otp = $_SESSION["otp"];
    $otp_time = $_SESSION["otp_time"];

    // Initialize variables
    $user_otp = "";
    $message = "";
    $status = "";

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get OTP from form input
        $user_otp = $_POST["otp"];

        // Check if OTP is correct and within time limit
        if ($user_otp == $otp && time() - $otp_time < 300) { // 300 seconds = 5 minutes
            // Fire query in database to show results for the matching email in a table format
            // ...

            $status = "success";
            $message = "OTP verified successfully!";
        } else {
            $status = "error";
            $message = "Invalid OTP or time limit exceeded. Please try again.";
        }
    }

    // Close database connection

    ?>

    <h1>Verify OTP</h1>
    <?php if ($status == "error"): ?>
        <div style="color: red;"><?php echo $message; ?></div>
    <?php elseif ($status == "success"): ?>
        <div style="color: green;"><?php echo $message; ?></div>
    <?php endif; ?>
    <?php if (time() - $otp_time >= 300): // 300 seconds = 5 minutes ?>
        <div style="color: red;">Time limit exceeded. Please generate a new OTP.</div>
    <?php else: ?>
       
    <?php endif; ?>
</body>
</html>
