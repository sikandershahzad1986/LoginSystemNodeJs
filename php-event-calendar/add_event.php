<?php
require 'config.php';

$title = $_POST['title'] ?? '';
$date  = $_POST['date'] ?? '';

if ($title && $date) {
    $stmt = $pdo->prepare('INSERT INTO events (title, event_date) VALUES (?, ?)');
    $stmt->execute([$title, $date]);
}

header('Location: index.php');
exit;
?>
