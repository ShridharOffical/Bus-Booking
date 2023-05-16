<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
session_start();
require "db_scripts/login.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloaderttyytytytytytyt
require 'PHPMailer\Exception.php';
require 'PHPMailer\PHPMailer.php';
require 'PHPMailer\SMTP.php';


function Redirect($url, $permanent = false)
{ //Redirects to given page
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

$getemail = $_POST['useremail']; // user entered email
$emailfound = false;
//Checking if the email exists in the db
$tables = mysqli_query($conn, "SHOW TABLES");

while ($table_name = mysqli_fetch_object($tables)) {

    $currentTable = $table_name->{"Tables_in_learn"};
    $query = "SELECT * from $currentTable where Email = '$getemail'";
    $results = mysqli_query($conn, $query);

    if ($results->num_rows>0) {
        $emailfound = true;
        break;
    }
}


if ($emailfound == true) {



    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    // SEND EMAIL PROCESS
    try {
        //Server settings
        //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'busxnoreplay@gmail.com';                     //SMTP username
        $mail->Password   = 'jlpwnvwpukyzjxpm';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('busxnoreplay@gmail.com', 'Contact Form');
        $mail->addAddress($getemail, 'busx');     //Add a recipient




        $random_number = '';
        for ($i = 0; $i < 6; $i++) {
            $random_number .= rand(0, 9);
        }



        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Busx authentication';
        $mail->Body    = 'Your <b>OTP Is : </b>' . '<strong>' . $random_number . '</strong>';

        $_SESSION['generatedOTP'] = $random_number;
        $_SESSION['scriptemail'] = $getemail;

        $mail->send();
?>
        <form method="POST" action="verify.php">
            <label for="otp">Enter OTP:</label>
            <input type="text" id="otp" name="otp" required>
            <!-- <input type="hidden" name="generatedOtp" value=""> -->
            <br>
            <button type="submit" name="submit">Verify OTP</button>
        </form>
<?php
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    Redirect("GetOtp.html", false);
    
}
?>
<script>
</script>