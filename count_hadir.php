<?php
$servername = "mysql-1c680404-kad-kahwin-nadiah.j.aivencloud.com:26442";
$username = "avnadmin";
$password = "AVNS_tPe5EFnjEw1LpB_-559";
$database = "kad_kahwin";

$connection = mysqli_connect($servername, $username, $password);

if (!$connection) {
    echo json_encode(['attend' => false, 'error' => 'Database connection failed']);
    exit;
}

mysqli_select_db($connection, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'increment') {
    $update_query = "UPDATE `kehadiran` SET `jumlah_kehadiran` = `jumlah_kehadiran` + 1 WHERE `id` = 1";

    if (mysqli_query($connection, $update_query)) {
        echo json_encode(['attend' => true]);
    } else {
        echo json_encode(['attend' => false, 'error' => mysqli_error($connection)]);
    }
}

mysqli_close($connection);
?>
