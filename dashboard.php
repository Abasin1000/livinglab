<?php
// dashboard.php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
require 'db.php';

$appointments = $conn->query("SELECT * FROM appointments ORDER BY date, start_time")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Agenda Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Welkom, <?php echo $_SESSION['user']; ?></h2>
    <a href="add_appointment.php">Nieuwe afspraak toevoegen</a>
    <table>
        <tr>
            <th>Datum</th>
            <th>Starttijd</th>
            <th>Eindtijd</th>
            <th>Locatie</th>
            <th>Beschrijving</th>
        </tr>
        <?php foreach ($appointments as $appointment): ?>
            <tr>
                <td><?= $appointment['date'] ?></td>
                <td><?= $appointment['start_time'] ?></td>
                <td><?= $appointment['end_time'] ?></td>
                <td><?= $appointment['location'] ?></td>
                <td><?= $appointment['description'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
