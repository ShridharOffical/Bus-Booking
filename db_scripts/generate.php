<?php
    require_once "login.php";
    session_start();
    
    $route = $_POST['Route'];
    $date = $_POST['trip-start'];

    $_SESSION['Road'] = $route;
    $_SESSION['Date'] = $date;
    
    $table_name = $route.$date;
    $table_name = str_replace('-','',$table_name);
        $_SESSION["table"]  = $table_name;
        $_SESSION["Name"] = $_POST["name"];
        $_SESSION["Email"] = $_POST["email"];
        $_SESSION["Age"] =  $_POST["age"];
        $_SESSION["Gender"] = $_POST["gender"];
        
    function Redirect($url, $permanent = false) { //Redirects to given page
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
        }

    
    //^Recodring user data to be submitted after the transcation is complete
    

    $query = "SHOW TABLES LIKE '$table_name'";
    $res = $conn->query($query); 
    

    if (mysqli_num_rows($res)==0) {
        $Tname = "CREATE TABLE `learn`.`{$table_name}` (`Seat_no` INT NOT NULL , `IsTaken` INT NOT NULL , `Name` TEXT NOT NULL , `Age` INT NOT NULL , `Email` TEXT NOT NULL , `Gender` TEXT NOT NULL,`Route` TEXT NOT NULL, `Date` DATE ,`Status` TEXT NOT NULL) ENGINE = InnoDB; ";

        $conn->query($Tname);
        echo $conn->error;
        Redirect('Populate_seat.php', false);
    }

  
       Redirect('../seatBook.php', false);
    
    
    
    
?>
