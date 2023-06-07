<?php
$conn = new mysqli('localhost', 'root', '', 'learn');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
$tablesQuery = "SHOW TABLES";
$tablesResult = $conn->query($tablesQuery);

$tables = array();
while ($row = $tablesResult->fetch_array()) {
    $tables[] = $row[0];
}
?>
<?php
$currentDate = date('Y-m-d');
$filterTables = array();

foreach ($tables as $table) {
    $tableName = substr($table, 4, 8);
    $tableDate = date_create_from_format('mdY', $tableName)->format('Y-m-d');

    if ($tableDate >= $currentDate) {
        $filterTables[] = $table;
    }
}
?>
<?php
foreach ($filterTables as $table) {
    $query = "UPDATE $table SET status = 'Expired' WHERE status != 'Cancelled' AND status != 'Expired'";
    $conn->query($query);
}
?>
