
<?php 

require 'login.php';

$tables = mysqli_query($conn, "SHOW TABLES");

$total_earnings = 0; //^ will store the total earnings

//* Custom function to find a character in a stream_set_blocking
function isPresent($str,$ch)
{
    for($i=0;$i< strlen($str);$i++)
    {
        if($str[$i]==$ch)
        {
            return true;
        }
    }

    return false;
}



while ($table = mysqli_fetch_object($tables)) {
    $table_name = $table->{"Tables_in_learn"};

    $results = mysqli_query($conn, "SELECT * FROM `$table_name` WHERE IsTaken=1");

    if(isPresent($table_name,'b')){
        $temp = mysqli_num_rows($results) * 750;
        $total_earnings+=$temp;
    }
    elseif(isPresent($table_name,'m'))
    {
        $temp = mysqli_num_rows($results) * 450;
        $total_earnings+=$temp;
    }
    else
    {
        $temp = mysqli_num_rows($results) * 2200;
        $total_earnings+=$temp;
    }
}
?>