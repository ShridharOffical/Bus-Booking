<?php
      require 'login.php';
      session_start(); 

        $table = (string) $_SESSION['table']; 
        $route = substr($table, 0, 4); // First 4 characters represent the route
        $dateTxt = substr($table, 4); // Characters from index 4 till the end represent the date
        $date = date("y-m-d", strtotime($dateTxt));
        $name = (string) $_SESSION['Name'];
        $email = (string) $_SESSION['Email'];
        $age = (int) $_SESSION['Age'];
        $gender =(string) $_SESSION['Gender'];

        

        $raw_Seats =  $_COOKIE['Seats'];
        
       

        $Selected_seats = array_map('intval',explode(',',$raw_Seats)); //* An int array of selected seats

        for ($i=0; $i < count($Selected_seats); $i++) { 
            $sql = "UPDATE `$table` SET `Name`='$name',`Age`='$age',`Email`='$email',`Gender`='$gender',`Route`='$route' , `Date`='$date', `Status`='Active' WHERE Seat_no = '$Selected_seats[$i]';";

            $conn->query($sql);
        }



        
        
           
?>
