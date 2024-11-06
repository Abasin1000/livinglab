<?php
// add_appointment.php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO appointments (date, start_time, end_time, location, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$date, $start_time, $end_time, $location, $description]);
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwe Afspraak</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Nieuwe Afspraak Toevoegen</h2>
    <form method="POST">
        <label>Datum:</label><input type="date" name="date" required>
        <label>Starttijd:</label><input type="time" name="start_time" required>
        <label>Eindtijd:</label><input type="time" name="end_time" required>
        <label>Locatie:</label><input type="text" name="location" required>
        <label>Beschrijving:</label><textarea name="description" required></textarea>
        <button type="submit">Toevoegen</button>
    </form>
</body>
</html>
