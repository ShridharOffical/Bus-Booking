$

<?php
if (isset($_GET['submit'])) {
    // Retrieve the entered OTP
    $entered_otp = $_GET['otp'];
  
    // Compare the entered OTP with the one generated earlier
    if ($entered_otp == $random_number) {
        echo "OTP matched!";
    } else {
        echo "OTP not matched!";
    }
}
?>
