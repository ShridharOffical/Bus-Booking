<?php
    require "../db_scripts/login.php";

    $k = $_POST['id'];
    $sql = mysqli_query($conn,"SELECT * FROM '$k' WHERE Age>0;");

    echo var_dump($sql);
    while ($rows = mysqli_fetch_array($sql)) {
?>  
    <tr>
        <td><?php echo $rows['Name'];?></td>
        <td><?php echo $rows['Email']; ?></td>
        <td><?php echo $rows['Age']; ?></td>
        <td><?php echo $rows['Gender'];?></td>
    </tr>
<?php
    }



?>