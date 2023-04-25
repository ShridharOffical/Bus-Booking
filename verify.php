<?php

session_start();
function Redirect($url, $permanent = false) { //Redirects to given page
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
    }
    // Retrieve the entered OTP
    $entered_otp = $_POST['otp'];
    $generatedOTP = $_SESSION['generatedOTP'];
  
    // Compare the entered OTP with the one generated earlier
    if ($entered_otp == $generatedOTP) {
        echo "OTP matched!";
        Redirect("admin_pages/ex.php");
    } else {
        echo $entered_otp;
        echo $_SESSION['generatedOTP'];
        echo "OTP not matched!";
    }

?>
