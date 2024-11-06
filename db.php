<?php
// db.php
$host = 'localhost';
$dbname = 'bedrijf_agenda';
$username = 'root'; // Standaard XAMPP gebruikersnaam
$password = ''; // Standaard XAMPP wachtwoord

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Databaseverbinding mislukt: " . $e->getMessage();
    exit;
}
?>
