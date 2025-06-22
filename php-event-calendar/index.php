<?php
require 'config.php';

// Handle new event submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $date  = $_POST['date'] ?? '';
    if ($title && $date) {
        $stmt = $pdo->prepare('INSERT INTO events (title, event_date) VALUES (?, ?)');
        $stmt->execute([$title, $date]);
        header('Location: index.php');
        exit;
    }
}

// Fetch events
$events = $pdo->query('SELECT * FROM events ORDER BY event_date')->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Event Calendar</title>
</head>
<body>
    <h1>Event Calendar</h1>
    <h2>Add Event</h2>
    <form method="post">
        <label>Title: <input type="text" name="title" required></label><br>
        <label>Date: <input type="date" name="date" required></label><br>
        <button type="submit">Add</button>
    </form>

    <h2>Upcoming Events</h2>
    <ul>
        <?php foreach ($events as $event): ?>
            <li><?= htmlspecialchars($event['event_date']) ?> - <?= htmlspecialchars($event['title']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
