<?php

session_start();
function Redirect($url, $permanent = false)
{ //Redirects to given page
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}
// Retrieve the entered OTP
$entered_otp = $_POST['otp'];
$generatedOTP = $_SESSION['generatedOTP'];

// Compare the entered OTP with the one generated earlier
if ($entered_otp == $generatedOTP) {
    ?>
    <script>
        alert("Your OTP is matched ");
        window.location.href = "admin_pages/ex.php";
    </script>

    <?php

} else {
    echo $entered_otp;
    ?>
    <script>
        alert("OTP not matched!");
        window.location.href = "GetOtp.html";
    </script>

    <?php
    
}

?>